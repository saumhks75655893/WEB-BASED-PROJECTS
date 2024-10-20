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

    <?php
    require('inc/header.php');
    ?>
    <!-- Heading for Setting tab -->
    <div class="col-lg-10 p-4 ms-auto col-sm-12">
        <h3 class="mb-4">SETTINGS</h3>

        <!--          General setting sections  -->
        <div class="card p-4">
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
    </div>
    <!--Genera Setting Modal -->
    <div class="modal fade" id="general-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">General setting </h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Site Title</label>
                            <input type="text" name="site_title" class="form-control shadow-none mb-3" placeholder="Your name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">About</label>
                            <textarea name="about_title" class="form-control shadow-none mb-3" rows="6"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn text-secondary outline-none border-none" data-bs-dismiss="modal">cancel</button>
                        <button type="button" class="btn btn-primary">submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <?php require('inc/scripts.php') ?>

    <script>
        let general_data;

        function get_general() {
            let site_title = document.getElementById('site_title');
            let about = document.getElementById('about');

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "AJAX/setting_crud.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                general_data = JSON.parse(this.responseText);
                site_title.innerText = general_data.site_title;
                console.log(site_title.innerText)
                about.innerText = general_data.about;
                console.log(about.innerText)

            }

            xhr.send('get_general');
        }

        window.onload = function() {
            get_general();
        }
    </script>
</body>

</html>