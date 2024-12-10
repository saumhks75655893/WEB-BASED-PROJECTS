<?php
require('inc/essentials.php');
require('inc/db_config.php');

adminLogin();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Dashboard</title>
    <?php require('inc/links.php') ?>
</head>

<body class="bg-light">

    <?php
    require('inc/header.php');
    ?>
    <div class="col-lg-10 p-4 ms-auto">
        <?php

        // Fetch Data for Dashboard
// 1. Total Rooms, Booked Rooms, Remaining Rooms
        $totalRooms = $conn->query("SELECT COUNT(*) as total FROM room_images")->fetch_assoc()['total'];
        $bookedRooms = $conn->query("SELECT COUNT(*) as booked FROM booked_status WHERE room_no IS NOT NULL")->fetch_assoc()['booked'];
        $remainingRooms = $totalRooms - $bookedRooms;

        // 2. Total Users
        $totalUsers = $conn->query("SELECT COUNT(*) as users FROM user_cred")->fetch_assoc()['users'];

        // 3. Room-wise Booking Data for Chart
        $roomData = $conn->query("SELECT room_name, COUNT(*) as count FROM booked_status GROUP BY room_name");
        $roomNames = [];
        $roomCounts = [];
        while ($row = $roomData->fetch_assoc()) {
            $roomNames[] = $row['room_name'];
            $roomCounts[] = $row['count'];
        }
        ?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Hotel Booking Dashboard</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    margin: 20px;
                }

                .dashboard {
                    display: flex;
                    justify-content: space-around;
                    margin-bottom: 30px;
                }

                .card {
                    background: #f8f9fa;
                    padding: 20px;
                    border-radius: 10px;
                    text-align: center;
                    width: 30%;
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                }

                .card h2 {
                    font-size: 2em;
                    margin: 10px 0;
                }
            </style>
        </head>

        <body>
            <h1>Hotel Booking Dashboard</h1>
            <div class="dashboard">
                <div class="card">
                    <h3>Total Rooms</h3>
                    <h2><?php echo $totalRooms; ?></h2>
                </div>
                <div class="card">
                    <h3>Booked Rooms</h3>
                    <h2><?php echo $bookedRooms; ?></h2>
                </div>
                <div class="card">
                    <h3>Remaining Rooms</h3>
                    <h2><?php echo $remainingRooms; ?></h2>
                </div>
                <div class="card">
                    <h3>Total Users</h3>
                    <h2><?php echo $totalUsers; ?></h2>
                </div>
            </div>

            <canvas id="roomChart" width="400" height="200"></canvas>

            <script>
                // Room-wise Booking Data
                const roomNames = <?php echo json_encode($roomNames); ?>;
                const roomCounts = <?php echo json_encode($roomCounts); ?>;

                // Chart.js Configuration
                const ctx = document.getElementById('roomChart').getContext('2d');
                const roomChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: roomNames,
                        datasets: [{
                            label: 'Number of Bookings',
                            data: roomCounts,
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: { position: 'top' }
                        }
                    }
                });
            </script>
        </body>

        </html>

    </div>
    <?php require('inc/scripts.php') ?>
</body>

</html>