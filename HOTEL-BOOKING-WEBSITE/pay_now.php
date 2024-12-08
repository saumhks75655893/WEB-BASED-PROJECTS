<?php
require('./ADMIN/inc/db_config.php');
require('./ADMIN/inc/essentials.php');

require('./payment_gateway/razorpay/Razorpay.php'); // Include Razorpay PHP SDK
require('./payment_gateway/config.php');


date_default_timezone_set("Asia/Kolkata");

session_start();

if (!(isset($_SESSION['login']) && $_SESSION['login'] == true)) {
    redirect('index.php');
}


use Razorpay\Api\Api;
$api = new Api(API_KEY, API_SECRET);

if(isset($_POST['pay_now'])){
    $name = $_POST['name'];
    $phone = $_POST['phonenum'];
    $email = $_POST['email'];
    $address = $_POST['address']; 
    $total_pay = $_SESSION['room']['payment'];
    $cust_id = $_SESSION['uId']; 
    $room_name = $_SESSION['room']['name'];
    $room_price = $_SESSION['room']['price']; 
    $frm_data = filteration($_POST); 
}else{
    exit; 
}

// payment option 

$orderData = [
    'receipt' => 'ORD_' . random_int(11111, 999999),
    'amount' => $total_pay * 100, // Amount in paise (e.g., 50000 = Rs 500)
    'currency' => 'INR',
    'payment_capture' => 1,
];

// Create order
$order = $api->order->create($orderData);

// Pass this Order ID to your frontend
$orderId = $order['id'];
// echo $orderId;


// query to insert value in the database named : booking_details

$query1 = "INSERT INTO `booking_details` (`user_id`, `room_id`, `check_in`, `check_out`, `order_id`) VALUES(?,?,?,?,?)";
insert($query1, [$cust_id,$_SESSION['room']['id'],$frm_data['checkin'],$frm_data['checkout'],$orderId],'issss');

$booking_id = mysqli_insert_id($conn); 


$query2 = "INSERT INTO `booked_status` (`booking_id`, `room_name`, `price`, `total_pay`,`user_name`, `phone_num`, `address`) VALUES (?,?,?,?,?,?,?)"; 
insert($query2,[$booking_id,$room_name,$room_price,$total_pay,$name,$phone,$address],'issssss'); 
?>

<!-- Frontend Razorpay Checkout Form -->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Razorpay Payment</title>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<style>
    *{
        padding: 0; 
        margin: 0;
        background-color: #84a98c;
    }
    h1{
        text-align: center;
        font-family: 'Times New Roman', Times, serif;
    }
    h2{
        text-align: left;
    }
    .razorpay-payment-button {
        display: none;
    }
</style>

<body>
    <h1>The KING HOTEL</h1>
    <h2>Processing....</h2>

    <!-- Razorpay Payment Button -->
    <form action="success.php?" method="POST">
        <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="rzp_test_FEklNRBohQFvGr"
            data-amount=$total_pay data-currency="INR" data-order_id="<?php echo $orderId; ?>" data-buttontext="PAY"
            data-name="THE KING HOTEL" data-description="The Payment for the room booking!"
            data-image="IMAGES/hotel_image/thekinghotel.png" data-prefill.name=<?php echo $name . "<br>"; ?>
            data-prefill.email=<?php echo $email . "<br>"; ?> data-prefill.contact=<?php echo $phonenum . "<br>"; ?>
            data-theme.color="#03045e">
            </script>
        <input type="hidden" name="order_id" value="<?php echo $orderId; ?>">
        <input type="hidden" name="name" value="<?php echo $name;?>">
        <input type="hidden" name="email" value="<?php echo $email; ?>">
        <input type="hidden" name="room_name" value="<?php echo $room_name ?>">

   
    </form>

    <script>document.querySelector(".razorpay-payment-button").click();</script>
</body>

</html>