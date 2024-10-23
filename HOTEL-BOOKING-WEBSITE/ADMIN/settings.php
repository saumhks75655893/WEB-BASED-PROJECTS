<?php
require('inc/essentials.php');
adminLogin();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Setting</title>
    <?php require('inc/links.php') ?>
</head>

<body class="bg-light">

    <?php
    require('inc/header.php');
    ?>
    <!-- Heading for Setting tab -->
    <div class="col-lg-10 p-4 ms-auto">
        <h3 class="mb-4">SETTINGS</h3>

        <!--          General setting sections  -->
        <div class="card p-4 mb-2 shadow-sm">
            <div class="d-flex align-items-center justify-content-between">
                <h5 class="card-title">General Settings </h5>
                <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#general-s">
                    <i class="bi bi-pencil-square me-2"></i>Edit
                </button>
            </div>
            <div class="card-body">
                <h6 class="card-subtitle mb-2">Site title </h6>
                <p class="card-text" id="site_title"></p>
                <h6 class="card-subtitle mb-2">About </h6>
                <p class="card-text" id="about"></p>
            </div>

        </div>

        <!--Genera Setting Modal -->
        <div class="modal fade" id="general-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">

                <form id="general_s_form">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title fw-bold" id="staticBackdropLabel">General setting </h5>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Site Title</label>
                                <input type="text" name="site_title" id="site_title_inp" class="form-control shadow-none mb-3" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">About</label>
                                <textarea name="about_title" id="site_about_inp" class="form-control shadow-none mb-3" rows="6" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" onclick="site_title.value = general_data.site_title , about_title.value = general_data.about" class="btn text-secondary outline-none border-none" data-bs-dismiss="modal">cancel</button>
                            <button type="submit" class="btn btn-dark">submit</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

        <!-- shutdown section -->
        <div class="card p-4 shadow-sm">
            <div class="d-flex align-items-center justify-content-between">
                <h5 class="card-title">Shutdown Website </h5>
                <div class="form-check form-switch">
                    <form>
                        <input onchange="upd_shutdown(this.value)" class="form-check-input" type="checkbox" id="shutdown_toggle">
                    </form>
                </div>

            </div>
            <div class="card-body border-0 shadow-sm">
                <p class="card-text" id="about">
                    No Customer will be allowed to book hotel room, when shutdown mode is turned on.
                </p>

            </div>
        </div>
    </div>

    <?php require('inc/scripts.php') ?>

    <script>
        let general_data;

        let general_s_form = document.getElementById('general_s_form');
        let site_title_inp = document.getElementById('site_title_inp');
        let about_inp = document.getElementById('site_about_inp');

        // get-general function
        function get_general() {
            let site_title = document.getElementById('site_title');
            let about = document.getElementById('about');



            let shutdown_toggle = document.getElementById('shutdown_toggle');

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "AJAX/setting_crud.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                general_data = JSON.parse(this.responseText);

                site_title.innerText = general_data.site_title;
                about.innerText = general_data.about;

                site_title_inp.value = general_data.site_title;
                site_about_inp.value = general_data.about;

                // Set the checkbox state based on general_data.shutdown
                console.log(general_data.shutdown);
                if (general_data.shutdown == 0) {
                    shutdown_toggle.checked = false;
                    shutdown_toggle.value = 0;
                } else {
                    shutdown_toggle.checked = true;
                    shutdown_toggle.value = 1;
                }

            }

            xhr.send('get_general');
        }

        // to make, no one can send the empty value
        general_s_form.addEventListener('submit', function(e) {
            e.preventDefault();
            upd_general(site_title_inp.value, site_about_inp.value);
        })

        // upd_general function for update value on click on the submit button
        function upd_general(site_title_val, site_about_val) {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "AJAX/setting_crud.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {

                var myModel1 = document.getElementById('general-s');
                var modal = bootstrap.Modal.getInstance(myModel1);
                modal.hide();

                if (this.responseText == 1) {
                    alert('success', 'Chages saved !! ');
                    get_general();

                } else {
                    alert('error', 'NO changes made!!');
            }

        }

        xhr.send('site_title=' + site_title_val + '&site_about=' + site_about_val + '&upd_general');
        }

        // shutdown function 
        function upd_shutdown(val) {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "AJAX/setting_crud.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                if (this.responseText == 1 && general_data.shutdown == 0) {
                    alert('success', 'Site has be Shutdown!! ');
                } else {
                    alert('success', 'Shutdown mode off !! ');
                }
                get_general();
            }

            xhr.send('upd_shutdown=' + val);
        }


        // after window load

        window.onload = function() {
            get_general();
        }
    </script>
</body>

</html>