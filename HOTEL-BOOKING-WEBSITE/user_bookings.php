<?php
require('./Admin/inc/essentials.php');
require('./Admin/inc/db_config.php');
session_start();
$user_id = isset($_GET['id']) ? (int)$_GET['id'] : 1;
// Fetch bookings dynamically
$sql = "SELECT 
            u.name AS user_name, 
            u.id AS user_id, 
            b.phone_num, 
            b.address, 
            bd.booking_id, 
            bd.booking_status, 
            bd.order_id, 
            bd.trans_id, 
            bd.trans_status, 
            bd.datentime, 
            b.room_name, 
            b.price, 
            b.total_pay, 
            b.room_no
        FROM user_cred u
        INNER JOIN booking_details bd ON u.id = bd.user_id
        INNER JOIN  booked_status b ON bd.booking_id = b.booking_id where user_id=$user_id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $bookings = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $bookings = [];
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Bookings</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .table-container {
            max-width: 1000px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>

<div class="table-responsive">
    <h1>User Bookings</h1>
    <table class="table table-hover  border text-center bg-secondary" style="min-width: 1500px;">
        <thead>
            <tr>
                <th>User Name</th>
                <th>User ID</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>Booking ID</th>
                <th>Booking Status</th>
                <th>Order ID</th>
                <th>Transaction ID</th>
                <th>Transaction Status</th>
                <th>Date and Time</th>
                <th>Room Name</th>
                <th>Price</th>
                <th>Total Pay</th>
                <th>Room No</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bookings as $booking): ?>
                <tr>
                    <td><?php echo htmlspecialchars($booking['user_name']); ?></td>
                    <td><?php echo htmlspecialchars($booking['user_id']); ?></td>
                    <td><?php echo htmlspecialchars($booking['phone_num']); ?></td>
                    <td><?php echo htmlspecialchars($booking['address']); ?></td>
                    <td><?php echo htmlspecialchars($booking['booking_id']); ?></td>
                    <td><?php echo htmlspecialchars($booking['booking_status']); ?></td>
                    <td><?php echo htmlspecialchars($booking['order_id']); ?></td>
                    <td><?php echo htmlspecialchars($booking['trans_id']); ?></td>
                    <td><?php echo htmlspecialchars($booking['trans_status']); ?></td>
                    <td><?php echo htmlspecialchars($booking['datentime']); ?></td>
                    <td><?php echo htmlspecialchars($booking['room_name']); ?></td>
                    <td><?php echo htmlspecialchars($booking['price']); ?></td>
                    <td><?php echo htmlspecialchars($booking['total_pay']); ?></td>
                    <td><?php echo htmlspecialchars($booking['room_no']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </tablem>
</div>

</body>
</html>
