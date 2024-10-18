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
    <title>Update Operation </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<style>
    .custom-form {
        width: 45%;
        position: relative;
        top: 50%;
        left: 50%;
        transform: translate(-50%);
    }
</style>

<body class="bg-light">

    <!-- header -->
    <div class="container py-4 my-2  bg-warning rounded ">
        <div>
            <a href="index.php" class="d-flex align-items-center text-decoration-none text-white">
                <i class="bi bi-database-add fs-2 me-3"></i>
                <h2 class="text-white">Update Student records</h2>
            </a>
        </div>
    </div>

    <!-- form  -->

    <div class="rounded border-top p-3 custom-form bg-info my-4">
        <form class=" px-5 shadow-white" action="" method="GET">
            <div class="mb-3">
                <label class="form-label text-white mb-2 fw-bold">Roll NO</label>
                <input type="number" name="roll" class="form-control" value="<?php echo $_GET['rn'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold text-white">Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $_GET['sn'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold text-white">Class</label>
                <input type="text" class="form-control" name="class" value="<?php echo $_GET['sc'] ?>">
            </div>
            <button type=" submit" name="submit" class="btn btn-warning fw-bold shadow" style="position: relative; left:44%" value="Update">Update</button>
        </form>
    </div>

    <!-- update the existing content of the table -->

    <?php

    if ($_GET['submit']) {
        $rn = $_GET['rollno'];
        $sn = $_GET['name'];
        $sc = $_GET['class'];

        $query = "UPDATE STUDENT SET NAME='$sn', CLASS='$sc' where ROLLNO='$rn'";
        $data = mysqli_query($con, $query);

        if ($data) {
            echo "<font color=green>Record updated successfully.<a href='display.php'>Check Updated List Here</a>";
        } else {
            echo "<font color=red>Record not updated.<a href='display.php'>Check List Here</a>";
        }
    } else {
        echo  "<font color=blue>Note: Click on update button to update the records";
    }

    ?>




    <!-- script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>