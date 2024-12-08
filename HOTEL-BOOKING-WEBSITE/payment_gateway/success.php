<?php
require('razorpay/Razorpay.php'); // Include Razorpay PHP SDK
require('./config.php'); 

use Razorpay\Api\Api;

$api = new Api(API_KEY, API_SECRET);

// Retrieve POST parameters from Razorpay response
$razorpayPaymentId = $_POST['razorpay_payment_id'];
$razorpayOrderId = $_POST['razorpay_order_id'];
$razorpaySignature = $_POST['razorpay_signature'];

try {
    // Verify payment signature
    $attributes = [
        'razorpay_order_id' => $razorpayOrderId,
        'razorpay_payment_id' => $razorpayPaymentId,
        'razorpay_signature' => $razorpaySignature
    ];

    $api->utility->verifyPaymentSignature($attributes);

    // Payment is verified
    echo "Payment successful. Payment ID: " . $razorpayPaymentId;
} catch (\Exception $e) {
    // Payment verification failed
    echo "Payment verification failed: " . $e->getMessage();
}
?>
