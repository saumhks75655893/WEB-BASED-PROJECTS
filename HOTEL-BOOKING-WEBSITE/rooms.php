<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo "HOTEL BOOKING WEBSITE - HOME" ?>
    </title>
    <?php require('include/links.php') ?>
    <!-- carousel design link  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>
<style>
    .box:hover {
        transform: scale(1.03);
        transition: all 0.3s;
        border-color: var(--teal_hover) !important;
    }

    .swiper-container {
        width: 100% !important;
        /* or specific value like 600px */
        height: 100% !important;
        /* Set the desired height */
        object-fit: cover;
    }
</style>

<body class="bg-light">

    <?php require('include/header.php') ?>

    <!-- hotel room view -->
    <div class="my-5 px-4">
        <h1 class="text-center fw-bold h-font">Our Rooms</h1>
        <div class="h-line bg-dark"></div>
    </div>

    <!-- room design -->


    <div class="container">
        <div class="row">
            <!-- for filter opetions  -->
            <div class="col-lg-3 col-md-12 mb-lg-0 mb-4">
                <nav class="navbar navbar-expand-lg navbar-light bg-secondary rounded shadow">
                    <div class="container-fluid flex-lg-column align-items-stretch">
                        <!-- Filtering -->
                        <h4 class="mt-2 text-white">FILTERS</h4>
                        <button class="navbar-toggler bg-white shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse flex-column align-items-stretch mt-3" id="filterDropdown">

                            <!-- by date -->
                            <div class="border border-lg-light bg-white shadow rounded px-3 mb-4">
                                <h5 class="mt-2 mb-2" style="font-size: 18px;">CHECK AVAILABILITY</h5>
                                <!--Check in  -->
                                <label class="form-label mb-1">Check in</label>
                                <input type="date" class="form-control shadow-none mb-1">
                                <!-- check-out -->
                                <label class="form-label mt-2">Check Out</label>
                                <input type="date" class="form-control shadow-none mb-3">
                            </div>
                            <!-- by facilities -->
                            <div class="border border-lg-light shadow bg-white rounded px-3 mb-3">
                                <h5 class="mt-2 mb-2" style="font-size: 18px;"> Facilities</h5>

                                <input type="checkbox" id="f1" class="form-check-box shadow-none mb-1 me-1 ">
                                <label for="f1" class="form-check-label mb-1">Facility 1</label><br>

                                <input type="checkbox" id="f2" class="form-check-box shadow-none mb-1 me-1 ">
                                <label for="f2" class="form-check-label mb-1">Facility 2</label><br>

                                <input type="checkbox" id="f3" class="form-check-box shadow-none mb-1 me-1 ">
                                <label for="f3" class="form-check-label mb-1">Facility 3</label><br>

                                <input type="checkbox" id="f4" class="form-check-box shadow-none mb-1 me-1 ">
                                <label for="f4" class="form-check-label mb-3">Facility 4</label><br>


                            </div>
                            <!-- by No of Guests -->
                            <div class="border border-lg-light bg-white shadow rounded px-3 mb-3">
                                <h5 class="mt-2 mb-2" style="font-size: 18px;"> Guests</h5>
                                <div class="d-flex">
                                    <div class="me-3">
                                        <label class="form-label mb-1 me-2">Adults</label>
                                        <input type="number" class="form-control shadow-none mb-1">
                                    </div>
                                    <div>
                                        <label class="form-label mb-1">Children</label>
                                        <input type="number" class="form-control shadow-none mb-1 mb-3">
                                    </div>
                                </div>


                            </div>


                        </div>
                    </div>
                </nav>
            </div>

            <!-- for filter result -->
            <div class="col-lg-9 col-md-12  px-4" style="font-size: 14px;">
                <!-- cards -->
                 <!-- room 1 -->
                <div class="card mb-3 border-0 shadow ">
                    <div class="row g-0 p-4 align-items-center">
                        <!-- room image -->
                        <div class="col-md-5 pb-sm-2">
                            <img src="IMAGES/rooms/1.jpg" class="img-fluid rounded" alt="...">
                        </div>
                        <!-- room name features facilities and  -->
                        <div class="col-md-5 px-lg-3 px-md-3 px-sm-0">
                            <h5 class="mb-2">Room name</h5>
                            <h6 class="mb-1">Features</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                2 Room
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                1 Bathroom
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                1 Balcony
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                3 Balcony
                            </span>

                            <!-- facilities-->

                            <h6 class="mb-1 mt-2">Facilities</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Wifi
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Television
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Room heater
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                AC
                            </span>
                            <!-- guests -->
                            <h6 class="mb-1 mt-2">Guests</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                5 Adults
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap mb-sm-3">
                                2 Children
                            </span>
                        </div>
                        <!-- price and books now and more details  -->
                        <div class="col-md-2 text-center">
                            <h6 class="mb-3"> ₹500 per night</h6>
                            <a href="#" class="btn btn-sm p-2 text-white  custom-bg fw-bold mb-2 w-100">Book now</a>
                            <a href="#" class="btn btn-sm p-2 btn-outline-dark  fw-bold w-100">More details</a>
                        </div>
                    </div>
                </div>
                 <!-- room 2 -->
                <div class="card mb-3 border-0 shadow ">
                    <div class="row g-0 p-4 align-items-center">
                        <!-- room image -->
                        <div class="col-md-5 pb-sm-2">
                            <img src="IMAGES/rooms/1.jpg" class="img-fluid rounded" alt="...">
                        </div>
                        <!-- room name features facilities and  -->
                        <div class="col-md-5 px-lg-3 px-md-3 px-sm-0">
                            <h5 class="mb-2">Room name</h5>
                            <h6 class="mb-1">Features</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                2 Room
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                1 Bathroom
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                1 Balcony
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                3 Balcony
                            </span>

                            <!-- facilities-->

                            <h6 class="mb-1 mt-2">Facilities</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Wifi
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Television
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Room heater
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                AC
                            </span>
                            <!-- guests -->
                            <h6 class="mb-1 mt-2">Guests</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                5 Adults
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap mb-sm-3">
                                2 Children
                            </span>
                        </div>
                        <!-- price and books now and more details  -->
                        <div class="col-md-2 text-center">
                            <h6 class="mb-3"> ₹500 per night</h6>
                            <a href="#" class="btn btn-sm p-2 text-white  custom-bg fw-bold mb-2 w-100">Book now</a>
                            <a href="#" class="btn btn-sm p-2 btn-outline-dark  fw-bold w-100">More details</a>
                        </div>
                    </div>
                </div>
                 <!-- room 3 -->
                <div class="card mb-3 border-0 shadow ">
                    <div class="row g-0 p-4 align-items-center">
                        <!-- room image -->
                        <div class="col-md-5 pb-sm-2">
                            <img src="IMAGES/rooms/1.jpg" class="img-fluid rounded" alt="...">
                        </div>
                        <!-- room name features facilities and  -->
                        <div class="col-md-5 px-lg-3 px-md-3 px-sm-0">
                            <h5 class="mb-2">Room name</h5>
                            <h6 class="mb-1">Features</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                2 Room
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                1 Bathroom
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                1 Balcony
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                3 Balcony
                            </span>

                            <!-- facilities-->

                            <h6 class="mb-1 mt-2">Facilities</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Wifi
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Television
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Room heater
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                AC
                            </span>
                            <!-- guests -->
                            <h6 class="mb-1 mt-2">Guests</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                5 Adults
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap mb-sm-3">
                                2 Children
                            </span>
                        </div>
                        <!-- price and books now and more details  -->
                        <div class="col-md-2 text-center">
                            <h6 class="mb-3"> ₹500 per night</h6>
                            <a href="#" class="btn btn-sm p-2 text-white  custom-bg fw-bold mb-2 w-100">Book now</a>
                            <a href="#" class="btn btn-sm p-2 btn-outline-dark  fw-bold w-100">More details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>





        <!-- footer -->
        <br>
        <?php require('include/footer.php') ?>

        <!-- java script  -->
</body>

</html>