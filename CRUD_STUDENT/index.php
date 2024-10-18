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
                <h2 class="text-white">Student records</h2>
            </a>
        </div>
    </div>

    <!-- form  -->

    <div class="rounded border-top p-3 custom-form bg-info my-4">
        <form class=" px-5 shadow-white" action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label text-white mb-2 fw-bold">Roll NO</label>
                <input type="number" name="rollno" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold text-white">Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold text-white">Class</label>
                <input type="text" class="form-control" name="class">
            </div>
            <div class="mb-3">
            <label class="form-label fw-bold text-white">Student Image </label>
                <input type="file" class="form-control" name="image">
            </div>
            <button type="submit" name="submit" class="btn btn-success fw-bold shadow" value="">Submit</button>
            <button type="clear" name"clear" class="btn btn-warning fw-bold text-danger shadow" value="upload file">Clear</button>
        </form>
    </div>

    <!-- insertion of the data   -->
    <!-- insert code without any checks  -->
    <!-- insert code with validation -->
    <?php

    $rn = $_POST['rollno'];
    $sn = $_POST['name'];
    $sc = $_POST['class'];
    $filename = $_FILES["image"]["name"];
    $temfilename = $_FILES["image"]["tmp_name"];
    $folder = "student/" . $filename;
    move_uploaded_file($temfilename, $folder);


    if (($rn != "") && ($sn != "") && ($sc != "") && ($folder != "")) {
        $query = "INSERT INTO STUDENT VALUES('$rn', '$sn ', '$sc','$folder')";
        $data = mysqli_query($con, $query);

        if ($data) {
            echo "Data inserted successfully in DB";
        }
    } else {
        echo "all fields required";
    }

    ?>
    <!-- script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>