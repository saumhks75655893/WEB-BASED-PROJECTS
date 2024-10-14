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
    .pop {
        position: relative !important;
        top: -180px !important;
        /* margin-left: 20px !important; */
    }

    .pop:hover {
        transform: scale(1.03);
        transition: all 0.3s;
        border-color: var(--teal_hover) !important;
    }

    .pin {

        background-color: var(--teal) !important;
        border: none;
        margin-left: 20px !important;
        position: relative;
        top: 10px !important;

    }

    .pin:hover {
        background-color: var(--teal_hover) !important;
    }

    .intro {
        position: relative !important;
        top: -250px !important;
        text-align: center;
        margin: 0 auto;
        color: white !important;
    }

    .custom-bg {
        color: black;
        background-color: var(--teal) !important;
        font-weight: 500 !important;
        border: 1px solid var(--teal);
    }

    .custom-bg:hover {
        background-color: var(--teal_hover) !important;
        font-weight: 700 !important;
        border: 1px solid var(--teal);
    }

    .custom-card:hover {
        transform: scale(1.02);
        transition: all 0.2s;
        border-color: var(--teal_hover) !important;
    }
</style>

<body class="bg-light">

    <?php require('include/header.php') ?>

    <!-- hotel home view -->
    <div class="me-5">
        <img src="IMAGES/h1.jpg" alt="" class="mx-auto d-block custom-img">
        <h2 class="h-font intro">WELCOME TO XYZ HOTEL </h2>
    </div>
    <!-- Availability checking -->
    <form>
        <div class="container b-class">
            <div class="row">
                <div class="bg-white shadow border-top border-4 p-4  d-flex mb-5  align-items-center pop">
                    <div class="col-lg-4 px-5">
                        <label class="form-label fw-bold mb-2">Check in</label>
                        <input type="date" class="form-control shadow-none mb-1">
                    </div>
                    <div class="col-lg-4">
                        <label class="form-label fw-bold mb-2">Check out</label>
                        <input type="date" class="form-control shadow-none mb-1">
                    </div>
                    <div class="col-lg-4 ms-5">
                        <button type="submit"
                            class="btn btn-success px-3 py-2 align-items-center pin ">Check Availibility</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </form>

    <!-- Our rooms -->
    <h2 class="mt-1 mb-4 text-center fw-bold h-font">Our Rooms</h2>
    <div class="container">
        <div class="row">
            <!-- room 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="bg-white shadow border-top border-4 p-3 rounded custom-card">
                    <img src="IMAGES/rooms/1.jpg" class="w-100">
                    <h5 class="mb-2 mt-3">Simple Room</h5>
                    <h6 class="mb-3"> ₹500 per night</h6>
                    <!-- features -->
                    <div class="features mb-4">
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
                    </div>
                    <!-- facilities-->
                    <div class="facilities mb-4">
                        <h6 class="mb-1">Facilities</h6>
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
                    </div>
                    <!-- rating -->
                    <div class="rating mb-4">
                        <h6 class="mb-1">Rating</h6>
                        <span class="badges rounded-pill bg-light">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                        </span>
                    </div>
                    <div class="d-flex justify-content-evenly p-3">
                        <a href="#" class="btn btn-sm p-2 text-white  custom-bg fw-bold">Book now</a>
                        <a href="#" class="btn btn-sm p-2 btn-outline-dark  fw-bold">More details</a>
                    </div>
                </div>
            </div>
            <!-- room 2 -->
            <div class="col-lg-4 col-md-6">
                <div class="bg-white shadow border-top border-4 p-3 rounded custom-card ">
                    <img src="IMAGES/rooms/1.jpg" class="w-100">
                    <h5 class="mb-2 mt-3">Simple Room</h5>
                    <h6 class="mb-3"> ₹500 per night</h6>
                    <!-- features -->
                    <div class="features mb-4">
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
                    </div>
                    <!-- facilities-->
                    <div class="facilities mb-4">
                        <h6 class="mb-1">Facilities</h6>
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
                    </div>
                    <!-- rating -->
                    <div class="rating mb-4">
                        <h6 class="mb-1">Rating</h6>
                        <span class="badges rounded-pill bg-light">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                        </span>
                    </div>
                    <div class="d-flex justify-content-evenly p-3">
                        <a href="#" class="btn btn-sm p-2 text-white  custom-bg fw-bold">Book now</a>
                        <a href="#" class="btn btn-sm p-2 btn-outline-dark  fw-bold">More details</a>
                    </div>
                </div>
            </div>

            <!-- room 3 -->
            <div class="col-lg-4 col-md-6">
                <div class="bg-white shadow border-top border-4 p-3 rounded  custom-card">
                    <img src="IMAGES/rooms/1.jpg" class="w-100">
                    <h5 class="mb-2 mt-3">Simple Room</h5>
                    <h6 class="mb-3"> ₹500 per night</h6>
                    <!-- features -->
                    <div class="features mb-4">
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
                    </div>
                    <!-- facilities-->
                    <div class="facilities mb-4">
                        <h6 class="mb-1">Facilities</h6>
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
                    </div>
                    <!-- rating -->
                    <div class="rating mb-4">
                        <h6 class="mb-1">Rating</h6>
                        <span class="badges rounded-pill bg-light">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                        </span>
                    </div>
                    <div class="d-flex justify-content-evenly p-3">
                        <a href="#" class="btn btn-sm p-2 text-white  custom-bg fw-bold">Book now</a>
                        <a href="#" class="btn btn-sm p-2 btn-outline-dark  fw-bold">More details</a>
                    </div>
                </div>
            </div>

            <!-- Button -->
            <div class="col-lg-12 col-md-12 text-center mt-5 mb-5">
                <a href="#" class="btn btn-success btn-sm btn-outline-dark fw-bold px-4 py-2 ">More Rooms -> </a>
            </div>
        </div>
    </div>

    <!-- Our facilities -->
    <h2 class="mt-1 mb-4 text-center fw-bold h-font">Our Facilites</h2>
    <div class="container">
        <div class="row justify-content-evenly mb-5">
            <div class="col-lg-2 col-md-2 text-center shadow rounded mb-4 my-4 py-4  custom-card">
                <img src="IMAGES/facilities/wifi.svg" width="80px">
                <h5>Wifi</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center shadow rounded mb-4 my-4 py-4  custom-card">
                <img src="IMAGES/facilities/flattv.svg" width="80px">
                <h5>Television</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center shadow rounded mb-4 my-4 py-4 custom-card">
                <img src="IMAGES/facilities/ac.svg" width="80px">
                <h5>AC</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center shadow rounded mb-4 my-4 py-4  custom-card">
                <img src="IMAGES/facilities/heater.svg" width="80px">
                <h5>Room heater</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center shadow rounded mb-4 my-4 py-4  custom-card">
                <img src="IMAGES/facilities/rooms.svg" width="80px">
                <h5>Rooms</h5>
            </div>
        </div>
    </div>
    <!-- footer -->
    <?php require('include/footer.php') ?>
</body>

</html>