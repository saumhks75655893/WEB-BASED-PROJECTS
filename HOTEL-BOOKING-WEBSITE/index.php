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

    /* for swiper */
    .swiper {
        width: 80vh;
        height: auto;
    }

    .swiper-slide {
        /* display: flex;
        align-items: center;
        justify-content: center; */
        border-radius: 14px;
        font-size: 16px;
        margin-bottom: 50px;
        box-shadow: none;
        /* font-weight: bold; */
        /* color: #fff; */
    }

    /* footer */
    .row.no-gutters {
        margin-right: 0;
        margin-left: 0;
    }

    .row.no-gutters>[class*="col-"] {
        padding-right: 0;
        padding-left: 0;
    }

    /* Example background colors for visibility */
    .bg-column1 {
        background: white;

    }

    .bg-column2 {
        background: white;
    }

    .bg-column3 {
        background: white;
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
                            class="btn btn-success px-3 py-2 align-items-center justify-content-evenly pin ">Check Availibility</button>
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
                    <!-- Guests-->
                    <div class="facilities mb-4">
                        <h6 class="mb-1">Guests</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            5 Adults
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            2 Children
                        </span>
                    </div
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
                    <!-- Guests-->
                    <div class="facilities mb-4">
                        <h6 class="mb-1">Guests</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            5 Adults
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            2 Children
                        </span>
                    </div
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
                    <!-- Guests-->
                    <div class="facilities mb-4">
                        <h6 class="mb-1">Guests</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            5 Adults
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            2 Children
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
            <div class="col-lg-12 col-md-12 text-center mt-5 mb-5">
                <a href="#" class="btn btn-success btn-sm btn-outline-dark fw-bold px-4 py-2 ">More Facilities -> </a>
            </div>
        </div>
    </div>

    <!-- testimonials -->
    <h2 class="mt-1 mb-4 text-center fw-bold h-font">Our Testimonials</h2>

    <div class="container mt-4">
        <div class="swiper swiper-testimonial swiper-custom">
            <div class="swiper-wrapper">
                <!-- 1. -->
                <div class="swiper-slide bg-white shadow  p-4">
                    <div class="profile d-flex align-items-center mb-3">
                        <img src="IMAGES/facilities/star.svg" width="30px">
                        <h5 class="m-0 ms-3">Random user 1</h5>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing tates accusamus reprehenderit vel repellendus nihil possimus dolorem de aliquid!</p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>
                <!-- 2 -->
                <div class="swiper-slide bg-white shadow  p-4">
                    <div class="profile d-flex align-items-center mb-3">
                        <img src="IMAGES/facilities/star.svg" width="30px">
                        <h5 class="m-0 ms-3">Random user 1</h5>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing tates accusamus reprehenderit vel repellendus nihil possimus dolorem de aliquid!</p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>
                <!-- 3 -->
                <div class="swiper-slide bg-white   p-4">
                    <div class="profile d-flex align-items-center mb-3">
                        <img src="IMAGES/facilities/star.svg" width="30px">
                        <h5 class="m-0 ms-3">Random user 1</h5>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing tates accusamus reprehenderit vel repellendus nihil possimus dolorem de aliquid!</p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>
                <!-- 4 -->
                <div class="swiper-slide bg-white   p-4">
                    <div class="profile d-flex align-items-center mb-3">
                        <img src="IMAGES/facilities/star.svg" width="30px">
                        <h5 class="m-0 ms-3">Random user 1</h5>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing tates accusamus reprehenderit vel repellendus nihil possimus dolorem de aliquid!</p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Swiper JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

        <!-- Initialize Swiper -->
        <script>
            var swiper = new Swiper(".swiper-testimonial", {
                grabCursor: true,
                loop: true,
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
                effect: "creative",
                creativeEffect: {
                    prev: {
                        shadow: false,
                        translate: [0, 0, -400],
                    },
                    next: {
                        translate: ["100%", 0, 0],
                    },
                },
                // breakpoint: {
                //     320: {
                //         slidesPerView: 2,
                //         spaceBetween: 20,
                //     },
                //     530: {
                //         slidesPerView: 1,
                //         spaceBetween: 20,
                //     },
                //     650: {
                //         slidesPerView: 3,
                //         spaceBetween: 20;
                //     }, 

            });
        </script>
</body>

<!-- Reach us -->
<h2 class="mt-1 mb-4 text-center fw-bold h-font">Reach Us</h2>
<div class="container">
    <div class="row">
        <!-- Address portion -->
        <div class="col-lg-8 col-md-8 mb-5">
            <div class="p-4 mt-3 bg-white shadow mb-lg-0 mb-3 rounded">
                <iframe class="w-100 rounded mb-4" height="320px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14711.925445286224!2d81.72858533790232!3d22.803154519246682!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3987a09f2beeee53%3A0x8e16a10edc999450!2sLalpur%2C%20Madhya%20Pradesh%20484886!5e0!3m2!1sen!2sin!4v1728836174430!5m2!1sen!2sin" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <!-- address section -->
                <h5 class="fw-bold">Address</h5>
                <a href="https://maps.app.goo.gl/dbLQsF8NKpRZUgqm6" target="_blank" class="d-inling-block text-decoration-none text-dark mb-3">
                    <i class="bi bi-geo-alt"></i>Lalput, Amarkantak, Anuppur, Madhya Pradesh</a>

            </div>
        </div>
        <!-- contact us -->
        <div class="col-lg-4 col-md-4">
            <div class="bg-white px-4 p-2 mt-3 shadow rounded">
                <h5 class="mt-4 mb-2">Call Us</h5><br>
                <a href="tel: +91 7686844050" class="d-inline-block mb-2 text-decoration-none text-dark">
                    <i class="bi bi-telephone-fill"></i>+91 7686844050
                </a>
                <br>
                <a href="tel: +91 7686844050" class="d-inline-block mb-2 text-decoration-none text-dark">
                    <i class="bi bi-telephone-fill"></i>+91 7686844050
                </a>
                <br><br>
                <!-- email us -->
                <h5 class="mt-4">Email Us</h5>
                <a href="mailto: himanshukumar75655893@gmail.com" class="d-inline-block text-decoration-none text-dark mb-3">
                    <i class="bi bi-envelope me-2"></i>himanshukumar75@gmail.com</a>


                <!-- Follow us  -->
                <h5 class="mt-4 mb-3">Follow Us</h5>
                <!-- Twitter -->
                <a href="#" class="d-inline-block mb-2 d-flex align-items-center text-decoration-none">
                    <i class="bi bi-twitter-x bg-light text-dark fs-6 "></i>
                    <p class="m-0 ms-2  text-dark">twitter</p>
                    </span>
                </a>
                <!-- INSTAGRAM -->

                <a href="#" class="d-inline-block  mb-2  d-flex align-items-center text-decoration-none">
                    <i class="bi bi-instagram bg-light text-dark text-decoration-none fs-6 "></i>
                    <p class="m-0 ms-2  text-dark">Instagram</p>
                    </span>
                </a>

                <!-- Facebook -->
                <a href="#" class="d-inline-block mb-3 d-flex align-items-center text-decoration-none">
                    <i class="bi bi-facebook bg-light text-dark text-decoration-none fs-6"></i>
                    <p class="m-0 ms-2  text-dark">Facebook</p>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- footer -->
<br><br><br>
<?php require('include/footer.php') ?>

</html>