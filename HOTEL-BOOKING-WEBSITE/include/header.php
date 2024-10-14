    <!-- nar bar  Design  -->
    <nav
        class="navbar navbar-expand-lg navbar-light bg-white shadow-light px-4 py-2 shadow-sm sticky-top position-sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand h-font me-5 fw-bold  fs-3 align-items-center" href="index.php">XYZ HOTEL</a>
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
                        <a class="nav-link active me-5 my-custom-class" aria-current="page" href="index.php">Home</a>
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
                    <button type="button"
                        class="btn btn-warning btn-outline-none fw-bold text-dark  shadow-none me-lg-3 me-2"
                        data-bs-toggle="modal" data-bs-target="#loginModal">
                        Login
                    </button>
                    <!-- Register button -->
                    <button type="button" class="btn btn-warning btn-outline-none fw-bold text-dark  shadow-none"
                        data-bs-toggle="modal" data-bs-target="#registerModal">
                        Register
                    </button>
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
                <form action="#">

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
                            <label class="form-label">Email address</label>
                            <input type="email" class="form-control shadow-none" placeholder="hksinha85@gmail.com">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control shadow-none mb-4"
                                placeholder="At least 8 characters">
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
    <div class="modal fade modal-lg" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- registration  form content -->
                <form action="#">

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
                                <input type="text" class="form-control shadow-none mb-3" placeholder="Your name">
                            </div>

                            <div class="col-md-6 ">
                                <label class="form-label fw-bold mb-2">Phone No </label>
                                <input type="number" class="form-control shadow-none mb-3" placeholder="7991861858"
                                    pattern="[0-9]{10}">
                                <div class="invalid-feedback">
                                    Please provide a valid phone number. It should be greater than 10 numbers.
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold mb-2">Email ID </label>
                                <input type="email" class="form-control shadow-none mb-3"
                                    placeholder="hksinha75655893@gmail.com">
                            </div>


                            <div class="col-md-6">
                                <label class="form-label fw-bold mb-2">Picture</label>
                                <input type="file" class="form-control shadow-none mb-3">
                            </div>

                            <div class="col-md-12">
                                <label class="form-label fw-bold mb-3">Address</label>
                                <textarea class="form-control shadow-none mb-3" rows="3"></textarea>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold mb-2">Pincode</label>
                                <input type="number" class="form-control shadow-none mb-3" pattern="[0-9]{6}"
                                    placeholder="232103">
                                <div class="invalid-feedback">
                                    Please provide valid pincode.
                                </div>
                            </div>


                            <div class="col-md-6">
                                <label class="form-label fw-bold mb-2">Date of birth</label>
                                <input type="date" class="form-control shadow-none mb-3">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold mb-2">Password</label>
                                <input type="Password" class="form-control shadow-none mb-3"
                                    placeholder="At least 8 characters">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold mb-2">Confirm Password</label>
                                <input type="Password" class="form-control shadow-none mb-3"
                                    placeholder="Same as password">
                            </div>
                            <div class="text-center my-1">
                                <div class="d-flex align-items-center justify-content-start">
                                    <button type="reset"
                                        class="btn btn-warning btn-block shadow-none ms-2 fw-bold me-3 w-50 ">CLEAR</button>
                                    <button type="submit"
                                        class="btn btn-success btn-block shadow-none  fw-bold me-2 w-50">LOGIN</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>