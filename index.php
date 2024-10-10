<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo "HOTEL BOOKING WEBSITE" ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,400;0,500;1,600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- nar bar  -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-light px-4 py-2 shadow-sm sticky-top position-sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand h-font me-5 fw-bold  fs-3 align-items-center" href="index.php">XYZ HOTEL</a>
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- nav bar items -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-1">
                    <!-- home -->
                    <li class="nav-item">
                        <a class="nav-link active me-5" aria-current="page" href="#">Home</a>
                    </li>
                    <!-- rooms -->
                    <li class="nav-item">
                        <a class="nav-link me-5" href="#">Rooms</a>
                    </li>
                    <!-- contact us -->
                    <li class="nav-item">
                        <a class="nav-link me-5" href="#">Contact us</a>
                    </li>
                    <!-- about -->
                    <li class="nav-item me-5">
                        <a class="nav-link" href="#">About</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center">
                    <!-- login buttons -->
                    <button type="button" class="btn btn-warning btn-outline-none fw-bold text-dark  shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#loginModal">
                        Login
                    </button>
                    <!-- Register button -->
                    <button type="button" class="btn btn-warning btn-outline-none fw-bold text-dark  shadow-none" data-bs-toggle="modal" data-bs-target="#registerModal">
                        Register
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- button popup Modal (for login Button) -->
    <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- login form content -->
                <form action="#">

                    <!-- header -->
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center">
                            <i class="bi bi-people-fill fs-3 me-2"></i>User Login
                        </h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- body -->
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" class="form-control shadow-none" placeholder="hksinha85@gmail.com">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control shadow-none mb-4" placeholder="At least 8 characters">
                        </div>
                        <div class="d-flex align-items-center justify-content-end ">
                            <button type="submit" class="btn btn-success btn-block shadow-none me-3">LOGIN</button>
                            <button type="reset" class="btn btn-warning btn-block shadow-none me-1 ">CLEAR</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- button popup Modal (for Register button ) -->
    <div class="modal fade modal-xl" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- login form content -->
                <form action="#">

                    <!-- header -->
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center">
                            <i class="bi bi-person-fill-add fs-3 me-2"></i><b>User Registration</b>
                        </h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <span class="badge bg-light text-dark mb-3 text-wrap">Provide details as per the valid documents (eg. Adhar card, Pan card, Driving license , Passport etc.</span>



                    <!-- body -->
                    <!-- <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" class="form-control shadow-none" placeholder="hksinha85@gmail.com">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control shadow-none mb-4" placeholder="At least 8 characters">
                        </div>
                        <div class="d-flex align-items-center justify-content-end ">
                            <button type="submit" class="btn btn-success btn-block shadow-none me-3">LOGIN</button>
                            <button type="reset" class="btn btn-warning btn-block shadow-none me-1 ">CLEAR</button>
                        </div>
                    </div> -->

                </form>
            </div>
        </div>
    </div>

    <!-- java script  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>