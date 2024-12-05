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
        DASHBOARD SECTION !!!! 
    </div>
    <?php require('inc/scripts.php') ?>
</body>

</html>