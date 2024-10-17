<?php
require('connection.php')
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HK PRODUCT STORE</title>
    <!-- CSS CONNECTION -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body class="bg-light">

    <!-- nav bar  -->
    <div class="container  bg-dark rounded-3 text-white w-100 my-4 px-4 py-3">
        <div class="d-flex align-items-center justify-content-between">
            <h2>
                <a href="index.php" class="text-decoration-none text-white ">
                    <i class="bi bi-diagram-3-fill fs-1 me-3"></i>Hk Product Store
                </a>
            </h2>
            <button type="button" class="btn btn-success fw-bold rounded-5 p-3 d-flex fs-5 align-items-center"
                data-bs-toggle="modal" data-bs-target="#addProduct">
                <i class="bi bi-plus-circle me-2 fs-3"></i>Add Product
            </button>
        </div>
    </div>

    <!-- modal to add products -->

    <div class="modal fade" id="addProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">

            <!-- form -->
            <form action="crud.php" method="POST" enctype="multipart/form-data">

                <div class="modal-content">
                    <div class="modal-header">
                        <!-- heading -->
                        <h1 class="modal-title fs-4 fw-bold" id="staticBackdropLabel">
                            Add Product
                        </h1>
                    </div>
                    <!-- model body -->
                    <div class="modal-body">
                        <!-- name -->
                        <div class="input-group mb-3">
                            <span class="input-group-text">Name</span>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <!-- price -->
                        <div class="input-group mb-3">
                            <span class="input-group-text">Price</span>
                            <input type="number" class="form-control" min="1" name="price" required>
                        </div>
                    </div>
                    <!-- description -->
                    <div class="input-group px-3 mb-3">
                        <span class="input-group-text">Description</span>
                        <textarea class="form-control" name="desc" aria-label="With textarea"></textarea>
                    </div>
                    <!-- image -->
                    <div class="input-group mb-3 px-3">
                        <label class="input-group-text">Image</label>
                        <input type="file" class="form-control" name="image" accept=".jpg,.jpeg, .png, .svg" required>
                    </div>

                    <!-- modeal footer / button section  -->
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-outline-secondary fw-bold" data-bs-dismiss="modal">Cancel
                        </button>
                        <button type="submit" class="btn btn-success fw-bold px-4" name="addProduct">Add</button>
                    </div>

                </div>
            </form>


        </div>
    </div>




    <!-- SCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>