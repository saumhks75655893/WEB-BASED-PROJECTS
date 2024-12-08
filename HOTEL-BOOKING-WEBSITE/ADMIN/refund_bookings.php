<?php
require('inc/essentials.php');
require('inc/db_config.php');
error_reporting(0);
adminLogin();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Refund Bookings</title>
    <?php require('inc/links.php') ?>
</head>

<body class="bg-light">

    <?php
    require('inc/header.php');
    ?>
    <!-- Heading for users tab -->
    <div class="col-lg-10 p-4 ms-auto">
        <h3 class="mb-4">Refund Bookings </h3>
        <!--General users sections  -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">
                <div class="d-flex mb-4 justify-content-center align-items-center">
                    <h5 class="ms-auto fw-bold" style="padding-left:50%">Search By Name : </h5>
                    <input type="text" oninput="get_bookings(this.value)" class="form-control shadow-none w-25 ms-auto"
                        placeholder="Type To Search">
                </div>

                <div class="table-responsive">
                    <table class="table table-hover border text-center bg-secondary"">
                        <thead>
                            <tr class=" bg-dark text-light">
                        <th scope="col">#</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Room Details</th>
                        <th scope="col">Refund Amount</th>
                        <th scope="col">Action</th>
                        </tr>
                        </thead>

                        <tbody id="table-data" class="text-center align-items-center justify-content-center">

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>






    <!-- for the click and stick for that time till the cursor is not changing it's place -->
    <?php require('inc/scripts.php') ?>
    <script src="Script/refund_bookings.js"></script>
</body>

</html>