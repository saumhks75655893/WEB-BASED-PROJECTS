<?php
require('razorpay/Razorpay.php'); // Include Razorpay PHP SDK
require('./config.php'); 
use Razorpay\Api\Api;

$api = new Api(API_KEY, API_SECRET);

$orderData = [
    'receipt'         => 'ORD_'.random_int(11111,999999),
    'amount'          => 50000, // Amount in paise (e.g., 50000 = Rs 500)
    'currency'        => 'INR',
    'payment_capture' => 1     
];

// Create order
$order = $api->order->create($orderData);

// Pass this Order ID to your frontend
$orderId = $order['id'];
echo $orderId; 

?>

<!-- Frontend Razorpay Checkout Form -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Razorpay Payment</title>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body>
    <h1>Razorpay Payment Integration</h1>

    <!-- Razorpay Payment Button -->
    <form action="success.php" method="POST">
        <script
            src="https://checkout.razorpay.com/v1/checkout.js"
            data-key="rzp_test_FEklNRBohQFvGr"  
            data-amount="50000"    
            data-currency="INR"
            data-order_id="<?php echo $orderId; ?>" 
            data-buttontext="Pay with Razorpay"
            data-name="Your Company Name"
            data-description="Test Transaction"
            data-image="https://yourlogo.com/logo.png" 
            data-prefill.name="John Doe"
            data-prefill.email="john.doe@example.com"
            data-theme.color="#F37254">
        </script>
        <input type="hidden" name="order_id" value="<?php echo $orderId; ?>">
    </form>
</body>
</html>
