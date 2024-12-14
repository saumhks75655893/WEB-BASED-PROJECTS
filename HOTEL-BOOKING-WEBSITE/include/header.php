<?php
require('ADMIN/inc/db_config.php');
require('ADMIN/inc/essentials.php');

$setting_q = "SELECT * FROM `settings` WHERE `sr_no`=?"; 
$values = [1]; 
$setting_r = mysqli_fetch_assoc(select($setting_q,$values, 'i')); 

if($setting_r['shutdown']){
    echo <<<alertbar
        <div class='bg-danger text-center p-2 fw-bold position-fixed'  style="top:68px; left: 0; width:100vw; z-index:1000;">
            <i class='bi bi-exclamation-triangle-fill'></i>
            BOOKINGS ARE TEMPORARILY CLOSED !!! SORRY FOR YOUR INCONVENIENT !!! 
        </div>
    alertbar; 
}
?>

<!-- nar bar  Design  -->
<nav id="nav-bar"
    class="navbar navbar-expand-lg navbar-light bg-white shadow-light px-4 py-2 shadow-sm sticky-top position-sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand h-font me-5 fw-bold  fs-3 align-items-center" href="index.php">THE KING HOTEL</a>
        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- nav bar items -->
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-1">
                <!-- home -->
                <li class="nav-item">
                    <a class="nav-link me-5 my-custom-class" href="index.php">Home</a>
                </li>
                <!-- rooms -->
                <li class="nav-item">
                    <a class="nav-link me-5 my-custom-class" href="rooms.php">Rooms</a>
                </li>
                <!-- rooms -->
                <li class="nav-item">
                    <a class="nav-link me-5 my-custom-class" href="facilities.php">Facilities</a>
                </li>
                <!-- contact us -->
                <li class="nav-item">
                    <a class="nav-link me-5 my-custom-class" href="contact.php">Contact us</a>
                </li>
                <!-- about -->
                <li class="nav-item">
                    <a class="nav-link my-custom-class me-5" href="about.php">About</a>
                </li>
            </ul>
            <div class="d-flex align-items-center">
                <!-- login buttons -->
                <?php
                session_start();
                if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
                    $path = USER_IMG_PATH;
                    echo <<<data
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle d-flex align-items-center justify-content-space-between" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                <img src="$path$_SESSION[uPic]" style="width:30px; height:30px;" class="me-1">
                                <h6>$_SESSION[uName]</h6>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-lg-none">
                                <li><a class="dropdown-item" href="profile.php?id=$_SESSION[uId]">Profile</a></li>
                                <li><a class="dropdown-item" href="user_bookings.php?id=$_SESSION[uId]">Bookings</a></li>
                                <li><a class="dropdown-item" href="logout.php">LogOut</a></li>
                            </ul>
                        </div>
                   data;
                } else {
                    echo <<<data
                        <button type="button"
                            class="btn btn-warning btn-outline-none fw-bold text-dark  shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#loginModal">Login
                        </button>
                        <!-- Register button -->
                        <button type="button" class="btn btn-warning btn-outline-none fw-bold text-dark  shadow-none" data-bs-toggle="modal" data-bs-target="#registerModal">Register
                        </button>
                    data;
                }
                ?>
            </div>
        </div>
    </div>
</nav>

<!-- button popup Modal (for login Button) -->
<div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- login form content -->
            <form action="#" id="login-form">

                <!-- header -->
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center">
                        <i class="bi bi-people-fill fs-3 me-2"></i>User Login
                    </h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <!-- body -->
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Email/Mobile No. </label>
                        <input type="text" name="email_mob" required class="form-control shadow-none"
                            placeholder="hksinha85@gmail.com">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="pass" required class="form-control shadow-none mb-4"
                            placeholder="At least 8 characters">
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <button type="button" class="btn btn-muted btn-outline-none shadow-none" data-bs-toggle="modal"
                            data-bs-target="#forgotModal" data-bs-dismiss="modal">Forgot Password? </button>
                        <div>
                            <button type="submit" class="btn btn-success btn-block shadow-none me-3">LOGIN</button>
                            <button type="reset" class="btn btn-warning btn-block shadow-none me-1 ">CLEAR</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<!-- button popup Modal (for Register button ) -->
<div class="modal fade modal-lg" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- registration  form content -->
            <form id="register-form">
                <!-- header -->
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center">
                        <i class="bi bi-person-fill-add fs-3 me-2"></i><b>User Registration</b>
                    </h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <span class="badge bg-light text-dark fs-6 fw-normal mb-3 text-wrap">Note: Provide details as per
                    the valid documents (eg. Adhar card, Pan card, Driving license , Passport etc.
                    When you are checking-in !!
                </span>
                <!-- body  -->
                <div class="container-fluid px-2 my-1">

                    <div class="row">
                        <div class="col-md-6 ">
                            <label class="form-label fw-bold mb-2">Name</label>
                            <input type="text" name="name" class="form-control shadow-none mb-3" placeholder="Your name"
                                required>
                        </div>

                        <div class="col-md-6 ">
                            <label class="form-label fw-bold mb-2">Phone No </label>
                            <input type="number" name="phonenum" class="form-control shadow-none mb-3"
                                placeholder="7991861858" pattern="[0-9]{10}" required>
                            <div class="invalid-feedback">
                                Please provide a valid phone number. It should be greater than 10 numbers.
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold mb-2">Email ID </label>
                            <input type="email" name="email" class="form-control shadow-none mb-3"
                                placeholder="hksinha75655893@gmail.com" required>
                        </div>


                        <div class="col-md-6">
                            <label class="form-label fw-bold mb-2">Profile</label>
                            <input type="file" name="profile" accept=".jpg, .jpeg, .png, .webp"
                                class="form-control shadow-none mb-3" required>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label fw-bold mb-3">Address</label>
                            <textarea class="form-control shadow-none mb-3" rows="3" name="address"
                                pattern="[A-Za-z]{1,32}" required></textarea>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold mb-2">Pincode</label>
                            <input type="number" class="form-control shadow-none mb-3" name="pincode" pattern="[0-9]{6}"
                                placeholder="232103" required>
                            <div class="invalid-feedback">
                                Please provide valid pincode.
                            </div>
                        </div>


                        <div class="col-md-6">
                            <label class="form-label fw-bold mb-2">Date of birth</label>
                            <input type="date" name="dob" class="form-control shadow-none mb-3" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold mb-2">Password</label>
                            <input type="Password" name="pass" class="form-control shadow-none mb-3"
                                placeholder="At least 8 characters" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold mb-2">Confirm Password</label>
                            <input type="Password" name="cpass" class="form-control shadow-none mb-3"
                                placeholder="Same as password" required>
                        </div>
                        <div class="text-center my-1">
                            <div class="d-flex align-items-center justify-content-start">
                                <button type="reset"
                                    class="btn btn-warning btn-block shadow-none ms-2 fw-bold me-3 w-50 ">CLEAR</button>
                                <button type="submit"
                                    class="btn btn-success btn-block shadow-none  fw-bold me-2 w-50">REGISTER</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- button popup Modal (for forgot Button) -->
<div class="modal fade" id="forgotModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- login form content -->
            <form action="#" id="forgot-form">

                <!-- header -->
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center">
                        <i class="bi bi-people-fill fs-3 me-2"></i>Forgot Password
                    </h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <!-- body -->
                <div class="modal-body">
                    <span class="badge bg-light text-dark fs-6 fw-normal mb-3 text-wrap">
                        Note: A link will be sent to your email to reset your password ...
                    </span>
                    <div class="mb-3">
                        <label class="form-label">Email </label>
                        <input type="text" name="email" required class="form-control shadow-none"
                            placeholder="hksinha85@gmail.com">
                    </div>
                    <div class="d-flex align-items-center justify-content-end">
                        <button type="button" class="btn btn-warning btn-block shadow-none me-2" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-dismiss="modal">CANCEL</button>

                        <button type="submit" class="btn btn-success btn-block shadow-none me-3">SEND LINK TO RESET PASSWORD</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>