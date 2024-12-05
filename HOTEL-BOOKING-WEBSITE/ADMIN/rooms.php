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
    <title>Admin Panel - Rooms</title>
    <?php require('inc/links.php') ?>
</head>

<body class="bg-light">

    <?php
    require('inc/header.php');
    ?>
    <!-- Heading for rooms tab -->
    <div class="col-lg-10 p-4 ms-auto">
        <h3 class="mb-4">ROOMS </h3>
        <!--General setting sections  -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">

                <div class="text-end mb-4">
                    <button type="button" class="btn btn-dark btn-sm my-2 text-right" data-bs-toggle="modal"
                        data-bs-target="#addRoom">
                        <i class="bi bi-plus-circle me-2"></i>Add Rooms
                    </button>
                </div>
                <div class="table-responsive-lg border-top border-3" style="height: 450px; overflow-y:scroll;">
                    <table class="table table-hover border-5 bg-secondary">
                        <thead>
                            <tr class="bg-dark text-light text-center">
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Area</th>
                                <th scope="col">Guests</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                                </tr>
                        </thead>

                        <tbody id="room-data" class="text-center align-items-center justify-content-center">

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- model for add rooms -->
    <div class="modal modal-lg fade" id="addRoom" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">

            <form id="addRoomForm" autocomplete="off">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold" id="staticBackdropLabel">Add Room</h5>
                    </div>
                    <div class="modal-body">
                        <!-- details section -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">name</label>
                                <input type="text" min="1" name="name" class="form-control shadow-none mb-3" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Area</label>
                                <input type="number" min="1" name="area" class="form-control shadow-none mb-3" required>
                            </div>
                            <div class=" col-md-6 mb-3">
                                <label class="form-label fw-bold">Adults(Max.)</label>
                                <input type="number" min="1" name="adults" id="site_title_inp"
                                    class="form-control shadow-none mb-3" required>
                            </div>
                            <div class=" col-md-6 mb-3">
                                <label class="form-label fw-bold">Children(Max.)</label>
                                <input type="number" min="1" name="children" id="site_title_inp"
                                    class="form-control shadow-none mb-3" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Price</label>
                                <input type="number" min="1" name="price" class="form-control shadow-none mb-3"
                                    required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Quantity</label>
                                <input type="number" min="1" name="quantity" class="form-control shadow-none mb-3"
                                    required>
                            </div>

                        </div>
                        <!-- features section -->
                        <div class="col-12 mb-3">
                            <label class="form-label fw-bold">Features</label>
                            <div class="row">
                                <?php
                                $query = "SELECT * FROM `features`";
                                $data = mysqli_query($conn, $query);
                                while ($res = mysqli_fetch_assoc($data)) {
                                    echo "<div class='col-lg-3 mb-1'>
                                                <label>
                                                <input type='checkbox' name='features' value='$res[id]' class='form-check-input ms-2 me-2 shadow-none'>$res[name]
                                                </label>
                                            </div>";
                                }
                                ?>
                            </div>
                        </div>

                        <!-- facilities section -->
                        <div class="col-12 mb-3">
                            <label class="form-label fw-bold">Facilities</label>
                            <div class="row">
                                <?php
                                $query = "SELECT * FROM `facilities`";
                                $data = mysqli_query($conn, $query);
                                while ($res = mysqli_fetch_assoc($data)) {
                                    echo "<div class='col-lg-3 mb-1'>
                                                <label>
                                                <input type='checkbox' name='facilities' value='$res[id]' class='form-check-input ms-2 me-2 shadow-none'>$res[name]
                                                </label>
                                            </div>";
                                }
                                ?>
                            </div>
                        </div>

                        <!-- description section -->
                        <div class="col-12 mb-3">
                            <label class="form-label fw-bold">Description</label><br>
                            <textarea name="description" rows="4" class="form-control shadow-none" required></textarea>
                        </div>
                        <!-- modal footer -->
                        <div class="modal-footer">
                            <button type="reset"
                                onclick="site_title.value = general_data.site_title , about_title.value = general_data.about"
                                class="btn text-secondary outline-none border-none"
                                data-bs-dismiss="modal">reset</button>
                            <button type="submit" class="btn btn-dark">submit</button>
                        </div>
                    </div>
                </div>

            </form>

        </div>
    </div>
    <!-- model for edit rooms -->
    <div class="modal modal-lg fade" id="editRoom" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">

            <form id="editRoomForm" autocomplete="off">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold" id="staticBackdropLabel">Edit Room</h5>
                    </div>
                    <div class="modal-body">
                        <!-- details section -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">name</label>
                                <input type="text" min="1" name="name" class="form-control shadow-none mb-3" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Area</label>
                                <input type="number" min="1" name="area" class="form-control shadow-none mb-3" required>
                            </div>
                            <div class=" col-md-6 mb-3">
                                <label class="form-label fw-bold">Adults(Max.)</label>
                                <input type="number" min="1" name="adults" id="site_title_inp"
                                    class="form-control shadow-none mb-3" required>
                            </div>
                            <div class=" col-md-6 mb-3">
                                <label class="form-label fw-bold">Children(Max.)</label>
                                <input type="number" min="1" name="children" id="site_title_inp"
                                    class="form-control shadow-none mb-3" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Price</label>
                                <input type="number" min="1" name="price" class="form-control shadow-none mb-3"
                                    required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Quantity</label>
                                <input type="number" min="1" name="quantity" class="form-control shadow-none mb-3"
                                    required>
                            </div>

                        </div>
                        <!-- features section -->
                        <div class="col-12 mb-3">
                            <label class="form-label fw-bold">Features</label>
                            <div class="row">
                                <?php
                                $query = "SELECT * FROM `features`";
                                $data = mysqli_query($conn, $query);
                                while ($res = mysqli_fetch_assoc($data)) {
                                    echo "<div class='col-lg-3 mb-1'>
                                                <label>
                                                <input type='checkbox' name='features' value='$res[id]' class='form-check-input ms-2 me-2 shadow-none'>$res[name]
                                                </label>
                                            </div>";
                                }
                                ?>
                            </div>
                        </div>

                        <!-- facilities section -->
                        <div class="col-12 mb-3">
                            <label class="form-label fw-bold">Facilities</label>
                            <div class="row">
                                <?php
                                $query = "SELECT * FROM `facilities`";
                                $data = mysqli_query($conn, $query);
                                while ($res = mysqli_fetch_assoc($data)) {
                                    echo "<div class='col-lg-3 mb-1'>
                                                <label>
                                                <input type='checkbox' name='facilities' value='$res[id]' class='form-check-input ms-2 me-2 shadow-none'>$res[name]
                                                </label>
                                            </div>";
                                }
                                ?>
                            </div>
                        </div>
                        <!-- description section -->
                        <div class="col-12 mb-3">
                            <label class="form-label fw-bold">Description</label><br>
                            <textarea name="description" rows="4" class="form-control shadow-none" required></textarea>
                        </div>
                        <!-- room id on the basis of room id we will edit the room -->
                        <input type="hidden" name='room_id'>
                        <!-- modal footer -->
                        <div class="modal-footer">
                            <button type="reset"
                                onclick="site_title.value = general_data.site_title , about_title.value = general_data.about"
                                class="btn text-secondary outline-none border-none"
                                data-bs-dismiss="modal">close</button>
                            <button type="submit" class="btn btn-dark">Edit</button>
                        </div>
                    </div>
                </div>

            </form>

        </div>
    </div>

    <!-- Manage room image modal -->

    <div class="modal fade" id="Room-images" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Room Name</h5>
                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- for alert  -->
                    <div id="img_alert">

                    </div>
                    <!-- modal form -->
                    <div class="border-bottom border-3 pb-3 mb-3">
                        <form id="add_image_form">
                            <label class="form-label fw-bold">Add image</label>
                            <input type="file" name="image" id="" accept=".jpg, .jpeg, .png, .webp"
                                class="form-control shadow-none mb-3" required>
                            <button class="btn btn-info shadow-none outline-none fw-bold text-dark">Add</button>
                            <input type="hidden" name='room_id'>
                        </form>
                    </div>
                    <!-- image table -->
                    <div class="table-responsive-lg bg-dark text-white border-top border-3"
                        style="height: 350px; overflow-y:scroll;">
                        <table class="table table-hover border-5 ">
                            <thead>
                                <tr class="bg-dark text-light sticky-top">
                                    <th scope="col" style="width: 60%;">Image</th>
                                    <th scope="col">Thumb</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>

                            <tbody id="room-image-data">

                            </tbody>

                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- for the click and stick for that time till the cursor is not changing it's place -->
    <?php require('inc/scripts.php') ?>
    <script src="Script/rooms.js"></script>
</body>

</html>