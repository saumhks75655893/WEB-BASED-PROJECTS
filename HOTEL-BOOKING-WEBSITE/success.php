<?php
require('./ADMIN/inc/db_config.php');
require('./ADMIN/inc/essentials.php');
require('./payment_gateway/razorpay/Razorpay.php'); // Include Razorpay PHP SDK
require('./payment_gateway/config.php');
require('./PHPMailer/mailer/Exception.php');
require('./PHPMailer/mailer/PHPMailer.php');
require('./PHPMailer/mailer/SMTP.php');

session_start();
unset($_SESSION['room']);

function regenerate_session($uid)
{
    $user_q = select("SELECT * FROM `user_cred` WHERE `id`=? LIMIT 1", [$uid], 'i');
    $user_fetch = mysqli_fetch_assoc($user_q);

    $_SESSION['uId'] = $user_fetch['id'];
    $_SESSION['uName'] = $user_fetch['name'];
    $_SESSION['uPic'] = $user_fetch['profile'];
    $_SESSION['uPhone'] = $user_fetch['phonenum'];

}
use Razorpay\Api\Api;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Initialize Razorpay API
$api = new Api(API_KEY, API_SECRET);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $razorpayPaymentId = $_POST['razorpay_payment_id'] ?? null;
    $razorpayOrderId = $_POST['order_id'] ?? null;
    $razorpaySignature = $_POST['razorpay_signature'] ?? null;

    try {
        if (!$razorpayOrderId || !$razorpayPaymentId || !$razorpaySignature) {
            throw new Exception("Incomplete payment details received.");
        }

        // Verify Razorpay payment
        $attributes = [
            'razorpay_order_id' => $razorpayOrderId,
            'razorpay_payment_id' => $razorpayPaymentId,
            'razorpay_signature' => $razorpaySignature
        ];
        $api->utility->verifyPaymentSignature($attributes);

        // Validate order_id in the database
        $query = "SELECT * FROM `booking_details` WHERE `order_id` = ?";
        $result = select($query, [$razorpayOrderId], 's');
        $bookingDetails = $result->fetch_assoc();


        if (!$bookingDetails) {
            throw new Exception("Invalid order ID. Please contact support.");
        }

        if (!(isset($_SESSION['login']) && $_SESSION['login'] == true)) {
            regenerate_session($bookingDetails['user_id']);
        }


        // Update booking status to confirmed
        $updateQuery = "UPDATE `booking_details` 
                        SET `booking_status`='booked', 
                            `trans_id`=?, 
                            `trans_amt`=?, 
                            `trans_status`='confirmed'  
                        WHERE `booking_id`=?";
        update($updateQuery, [
            $razorpayPaymentId,
            $_SESSION['room']['payment'],
            $bookingDetails['booking_id']
        ], 'ssi');

        // Fetch booking and user details
        $userEmail = $_POST['email'];
        $userName = $_POST['name'];
        $roomName = $_POST['room_name'];
        $checkin = $bookingDetails['check_in'];
        $checkout = $bookingDetails['check_out'];

        // Send email confirmation
        $mail = new PHPMailer(true);

        try {
            // Email server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'himanshukumar79918618@gmail.com';
            $mail->Password = 'irgqxvhuobylwxmt';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Recipients
            $mail->setFrom('himanshukumar79918618@gmail.com', 'BOOKING CONFIRMATION');
            $mail->addAddress($userEmail, $userName);

            $mail->isHTML(true);
            $mail->Subject = 'Booking Confirmation - The King Hotel';
            $mail->Body = "
                <h1>Booking Confirmation</h1>
                <p>Dear $userName,</p>
                <p>Thank you for booking with The King Hotel. Here are your booking details:</p>
                <ul>
                    <li><strong>Booking ID:</strong> {$bookingDetails['booking_id']}</li>
                    <li><strong>Room No:</strong> {10}</li>
                    <li><strong>Transaction ID:</strong> {$razorpayPaymentId}</li>
                    <li><strong>Room Name:</strong> $roomName</li>
                    <li><strong>Check-in Date:</strong> $checkin</li>
                    <li><strong>Check-out Date:</strong> $checkout</li>
                </ul>
                <p>We look forward to hosting you!</p>
                <p>Regards,<br>The King Hotel Team</p>
            ";

            // Send email
            $mail->send();
            echo "<h1>Payment Successful!</h1>";
            echo "<p>Your booking has been confirmed. A confirmation email has been sent to $userEmail.</p>";
            header('Location: pay_status.php?order=' . urlencode($_POST['razorpay_order_id']));
        } catch (Exception $e) {
            echo "Payment Successful, but email could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

    } catch (Exception $e) {
        // Update booking status as failed in case of error
        if (!empty($razorpayOrderId)) {
            $failQuery = "UPDATE `booking_details` 
                          SET `booking_status`='failed', 
                              `trans_status`='failed' 
                          WHERE `order_id`=?";
            update($failQuery, [$razorpayOrderId], 's');
        }

        // Display error message
        echo "<h1>Payment Failed!</h1>";
        echo "<p>Error: " . $e->getMessage() . "</p>";
    }
} else {
    echo "<h1>Invalid Request</h1>";
    exit;
}

// redirect('index.php');
?>