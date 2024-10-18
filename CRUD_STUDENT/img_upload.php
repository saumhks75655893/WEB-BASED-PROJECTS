<?php
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>

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

<body>

    <div class="container p-4 m-4 border text-center bg-warning w-50 custom-form">
        <form action="" method="POST" class="form " enctype="multipart/form-data">
            <input type="file" name="image" value=""/>
            <input type="submit" name="submit" value="upload file" class="btn btn-sm outline-dark text-white  fw-bold bg-dark">
            <button type="clear" class="btn btn-sm fw-bold bg-danger ms-5 ">clear</button>
        </form>
    </div>



    <!-- script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

<?php
// print_r($_FILES["image"]);    //-> Tell about the information of file uploaded. 
$filename = $_FILES["image"]["name"]; 
$temfilename = $_FILES["image"]["tmp_name"]; 
$folder = "student/".$filename; 
move_uploaded_file($temfilename,$folder); 
echo "<img src='$folder' height='200' width='200' />"
?>