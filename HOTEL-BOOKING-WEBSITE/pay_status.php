<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "HOTEL BOOKING WEBSITE - BOOKING STATUS" ?></title>
    <?php require('include/links.php') ?>
</head>
<style>
    .box:hover {
        transform: scale(1.03);
        transition: all 0.3s;
        border-color: var(--teal_hover) !important;
    }

    .swiper-container {
        width: 100% !important;
        /* or specific value like 600px */
        height: 100% !important;
        /* Set the desired height */
        object-fit: cover;
    }
</style>

<body class="bg-light">

    <?php require('include/header.php') ?>

    <!-- PAYMENT DETAILS -->

    <div class="container">
        <div class="row">

            <!-- PAYMENT title -->
            <div class="col-12 my-5 mb-3 px-4">
                <h2 class="fw-bold">PAYMENT STATUS</h2>
            </div>
            <?php


            // Check if user is logged in
            if (!(isset($_SESSION['login']) && $_SESSION['login'] == true)) {
                header('Location: index.php');
                exit;
            }

            if (isset($_GET['order'])) {
                $razorpay_order_id = filter_var($_GET['order'], FILTER_SANITIZE_STRING);

                if (!empty($razorpay_order_id)) {


                    // Query booking status
                    $booking_q = "SELECT bo.*, bd.* FROM `booking_details` bo 
                            INNER JOIN `booked_status` bd ON bo.booking_id = bd.booking_id
                            WHERE bo.order_id=? AND bo.user_id=? AND bo.booking_status!=?";
                    $booking_res = select($booking_q, [$razorpay_order_id, $_SESSION['uId'], 'pending'], 'sis');

                    // Check if booking exists
                    if (!$booking_res || mysqli_num_rows($booking_res) == 0) {
                        die('<div class="alert alert-danger">No matching booking found.</div>');
                    }

                    // Fetch booking result
                    $booking_fetch = mysqli_fetch_assoc($booking_res);

                    // Ensure $booking_fetch is not null
                    if (!$booking_fetch || !isset($booking_fetch['trans_status'])) {
                        die('<div class="alert alert-danger">Unable to fetch booking status. Please try again later.</div>');
                    }

                    // Display payment status
                    if ($booking_fetch['trans_status'] == 'confirmed') {
                        echo <<<data
                                <div class='col-12 px-4'>
                                  <div class="alert alert-success fw-bold" role="alert">
                                        <i class="bi bi-check"></i>
                                        Payment done! Booking successful!
                                        <br><br>
                                        <a href='booking.php' class='text-decoration-none text-primary'>GO TO BOOKINGS</a>
                                    </div>
                                </div>
                            data;
                    } else {
                        echo <<<data
                                    <div class='col-12 px-4'>
                                        <div class="alert alert-danger fw-bold" role="alert">

                                            <i class='bi bi-x-circle'></i>
                                            Payment failed! Booking not completed!
                                            <br><br>
                                            <a href='booking.php'>GO TO BOOKINGS</a>
                                        </div>
                                    </div>
                                data;
                    }
                }
            }
            ?>

            <!-- footer -->
            <br>
            <?php require('include/footer.php') ?>
</body>

</html>