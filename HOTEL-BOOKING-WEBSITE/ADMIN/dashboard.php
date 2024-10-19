<?php
require('inc/essentials.php');
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
    <div class="container-fluid bg-dark p-3 d-flex align-items-center justify-content-between text-light">
        <h3 class="mb-0">Admin Panel</h3>
        <a href="logout.php" class="btn btn-light btn-sm ">LogOut</a>
    </div>



    <?php require('inc/scripts.php') ?>
</body>
</html>