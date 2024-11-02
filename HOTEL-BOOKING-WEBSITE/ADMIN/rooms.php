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
                    <button type="button" class="btn btn-dark btn-sm my-2 text-right" data-bs-toggle="modal" data-bs-target="#addRoom">
                        <i class="bi bi-plus-circle me-2"></i>Add
                    </button>
                </div>
                <div class="table-responsive-lg border-top border-3" style="height: 450px; overflow-y:scroll;">
                    <table class="table table-hover border-5">
                        <thead>
                            <tr class="bg-dark text-light">
                                <th scope="col">#</th>
                                <th scope="col" style="width: 15%;">Name</th>
                                <th scope="col" style="width: 15%;">Area</th>
                                <th scope="col" style="width: 15%;">Guests</th>
                                <th scope="col" style="width: 15%;">Price</th>
                                <th scope="col" style="width: 15%;">Quantity</th>
                                <th scope="col" style="width: 15%;">Status</th>
                                <th scope="col" style="width: 29%;">Action</th>
                            </tr>
                        </thead>

                        <tbody id="room-data">

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- model for add rooms -->
    <div class="modal modal-lg fade" id="addRoom" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                <input type="number" min="1" name="adults" id="site_title_inp" class="form-control shadow-none mb-3" required>
                            </div>
                            <div class=" col-md-6 mb-3">
                                <label class="form-label fw-bold">Children(Max.)</label>
                                <input type="number" min="1" name="children" id="site_title_inp" class="form-control shadow-none mb-3" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Price</label>
                                <input type="number" min="1" name="price" class="form-control shadow-none mb-3" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Quantity</label>
                                <input type="number" min="1" name="quantity" class="form-control shadow-none mb-3" required>
                            </div>

                        </div>
                        <!-- features section -->
                        <div class="col-12 mb-3">
                            <label class="form-label fw-bold">Features</label>
                            <div class="row">
                                <?php
                                $query = "SELECT * FROM `features`";
                                $data  = mysqli_query($conn, $query);
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
                                $data  = mysqli_query($conn, $query);
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
                            <button type="reset" onclick="site_title.value = general_data.site_title , about_title.value = general_data.about" class="btn text-secondary outline-none border-none" data-bs-dismiss="modal">reset</button>
                            <button type="submit" class="btn btn-dark">submit</button>
                        </div>
                    </div>
                </div>

            </form>

        </div>
    </div>
    <!-- model for edit rooms -->
    <div class="modal modal-lg fade" id="editRoom" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                <input type="number" min="1" name="adults" id="site_title_inp" class="form-control shadow-none mb-3" required>
                            </div>
                            <div class=" col-md-6 mb-3">
                                <label class="form-label fw-bold">Children(Max.)</label>
                                <input type="number" min="1" name="children" id="site_title_inp" class="form-control shadow-none mb-3" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Price</label>
                                <input type="number" min="1" name="price" class="form-control shadow-none mb-3" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Quantity</label>
                                <input type="number" min="1" name="quantity" class="form-control shadow-none mb-3" required>
                            </div>

                        </div>
                        <!-- features section -->
                        <div class="col-12 mb-3">
                            <label class="form-label fw-bold">Features</label>
                            <div class="row">
                                <?php
                                $query = "SELECT * FROM `features`";
                                $data  = mysqli_query($conn, $query);
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
                                $data  = mysqli_query($conn, $query);
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
                            <button type="reset" onclick="site_title.value = general_data.site_title , about_title.value = general_data.about" class="btn text-secondary outline-none border-none" data-bs-dismiss="modal">reset</button>
                            <button type="submit" class="btn btn-dark">submit</button>
                        </div>
                    </div>
                </div>

            </form>

        </div>
    </div>

    <!-- for the click and stick for that time till the cursor is not changing it's place -->
    <?php require('inc/scripts.php') ?>

    <script>
        // adding the room to the database 
        let add_room_form = document.getElementById('addRoomForm');
        add_room_form.addEventListener('submit', function(e) {
            e.preventDefault();
            add_room();
        });

        function add_room() {
            let data = new FormData();
            data.append('addRoom', ''); // Corrected the key to match the PHP handler 'addRoom'
            data.append('name', add_room_form.elements['name'].value);
            data.append('area', add_room_form.elements['area'].value);
            data.append('adults', add_room_form.elements['adults'].value);
            data.append('children', add_room_form.elements['children'].value);
            data.append('price', add_room_form.elements['price'].value);
            data.append('quantity', add_room_form.elements['quantity'].value);
            data.append('description', add_room_form.elements['description'].value);

            // Collecting Features
            let features = [];
            document.querySelectorAll('input[name="features"]:checked').forEach(el => {
                features.push(el.value)
            });

            // Collecting Facilities
            let facilities = [];
            document.querySelectorAll('input[name="facilities"]:checked').forEach(el => {
                facilities.push(el.value)
            });

            // Append to FormData
            data.append('features', JSON.stringify(features));
            data.append('facilities', JSON.stringify(facilities));

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "AJAX/rooms.php", true);

            xhr.onload = function() {

                var myModal = document.getElementById('addRoom');
                var modal = bootstrap.Modal.getInstance(myModal);
                modal.hide();

                if (this.responseText == 1) { // Compare to the status key in the response
                    alert('success', 'Room added!');
                    add_room_form.reset();
                    get_all_rooms();
                } else {
                    alert('error', 'server down error !!!! ');
                }
            }
            xhr.send(data);
        }

        // fetching the room from the database
        function get_all_rooms() {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "AJAX/rooms.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                document.getElementById('room-data').innerHTML = this.responseText;

            };

            xhr.send('get_all_rooms');

        }

        // calling get_all_rooms() function 
        window.onload = function() {
            get_all_rooms();
        }
        // function for status toggle
        function toggle_status(id, val) {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "AJAX/rooms.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                if (this.responseText == 1) {
                    alert('success', 'Status toggled !');
                    get_all_rooms();
                } else {
                    alert('error', 'Status not toggled ! ')
                }

            }
            xhr.send('toggle_status=' + id + '&value=' + val)
        }

        // edit room

        let edit_room_form = document.getElementById('editRoomForm');

        function edit_details(id) {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "AJAX/rooms.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                let data = JSON.parse(this.responseText);
                edit_room_form.elements['name'].value = data.roomdata.name;
                edit_room_form.elements['area'].value = data.roomdata.area;
                edit_room_form.elements['adults'].value = data.roomdata.adults;
                edit_room_form.elements['children'].value = data.roomdata.children;
                edit_room_form.elements['price'].value = data.roomdata.price;
                edit_room_form.elements['quantity'].value = data.roomdata.quantity;
                edit_room_form.elements['description'].value = data.roomdata.description;
                edit_room_form.elements['room_id'].value = data.roomdata.id;

                edit_room_form.elements['facilities'].forEach(el => {
                    if (data.facilities.includes(Number(el.value))) {
                        el.checked = true;
                    }
                })

                edit_room_form.elements['features'].forEach(el => {
                    if (data.features.includes(Number(el.value))) {
                        el.checked = true;
                    }
                })
            }
            xhr.send('get_room=' + id);
        }
        // submit_edit_

        edit_room_form = document.getElementById('editRoomForm');
        edit_room_form.addEventListener('submit', function(e) {
            e.preventDefault();
            submit_edit_room();
        });

        function submit_edit_room() {
            let data = new FormData();
            data.append('editRoom', ''); // Corrected the key to match the PHP handler 'addRoom'
            data.append('room_id', edit_room_form.elements['room_id'].value); 
            data.append('name', edit_room_form.elements['name'].value);
            data.append('area', edit_room_form.elements['area'].value);
            data.append('adults', edit_room_form.elements['adults'].value);
            data.append('children', edit_room_form.elements['children'].value);
            data.append('price', edit_room_form.elements['price'].value);
            data.append('quantity', edit_room_form.elements['quantity'].value);
            data.append('description', edit_room_form.elements['description'].value);

            // Collecting Features
            let features = [];
            edit_room_form.querySelectorAll('input[name="features"]:checked').forEach(el => {
                features.push(el.value)
            });

            // Collecting Facilities
            let facilities = [];
            edit_room_form.querySelectorAll('input[name="facilities"]:checked').forEach(el => {
                facilities.push(el.value)
            });

            // Append to FormData
            data.append('features', JSON.stringify(features));
            data.append('facilities', JSON.stringify(facilities));

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "AJAX/rooms.php", true);

            xhr.onload = function() {

                var myModal = document.getElementById('editRoom');
                var modal = bootstrap.Modal.getInstance(myModal);
                modal.hide();

                if (this.responseText == 1) { // Compare to the status key in the response
                    alert('success', 'Room data edited!');
                    edit_room_form.reset();
                    get_all_rooms();
                } else {
                    alert('error', 'server down error !!!! ');
                }
            }
            xhr.send(data);
        }
        window.edit_details = edit_details; 
    </script>
</body>

</html>