<!-- for connection with database -->
<?php
require('connection.php');
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn CRUD Operation </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<style>
    .custom-form {
        position: relative;
        top: 50%;
        left: 50%;
        transform: translate(-50%);
    }
</style>

<body class="bg-light">

    <div class="container py-4 my-2  bg-dark rounded ">
        <div>
            <a href="index.php" class="d-flex align-items-center text-decoration-none text-white">
                <i class="bi bi-database-add fs-2 me-3"></i>
                <h2 class="text-white">Student records</h2>
            </a>
        </div>
    </div>
    <!-- form  -->

    <form class="bg-secondary my-4 rounded shadow border-top p-5 custom-form" style="width: 50%;" action="" method="GET">
        <div class="mb-3">
            <label class="form-label text-white mb-2 fw-bold">Roll NO</label>
            <input type="number" name="roll" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold text-white">Name</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold text-white">Class</label>
            <input type="text" class="form-control" name="class">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        <button type="clear" name"clear" class="btn btn-primary">Clear</button>
    </form>


    <!-- insertion of the data   -->
    <!-- insert code without any checks  -->
    <!-- insert code with validation -->
    <?php

    if ($_GET['submit']) {
        $rn = $_GET['roll'];
        $sn = $_GET['name'];
        $sc = $_GET['class'];

        if ($rn != ""  &&  $sn != ""  &&  $sc != "") {
            // echo $sc; 
            $query = "INSERT INTO STUDENT VALUES('$rn', '$sn ', '$sc')";
            $data = mysqli_query($con, $query);

            if ($data) {
                echo "Data inserted successfully in DB";
            }
        } else {
            echo "All fields requierd";
        }
    }

    ?>
    <!-- script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>