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

    <!-- hotel facilities view -->
    <div class="my-5 px-4">
        <h1 class="text-center fw-bold h-font">About</h1>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3 ">XYZ hotel is a place that provides accommodation for travelers, offering rooms with basic amenities like beds, bathrooms, and sometimes <br> additional services like free Wi-Fi, room service, or on-site dining. Many hotels also offer facilities such as gyms, <br> swimming pools, and meeting rooms, catering to both leisure and business travelers. The goal <br> is to provide a comfortable and convenient stay for guests..</p>
    </div>
    <!-- facilities -->
    <div class="container mt-5 my-5">
        <div class="row justify-content-between align-items-center">

            <div class="col-lg-6 col-md-5 mb-4 order-sm-2 order-lg-1 order-md-1 mt-3">
                <h5 class="mb-3">ABOUT XYZ HOTEL </h5>
                <p>XYZ Hotel, established by Himanshu Kumar in 1997, has been providing quality hospitality for
                    over two decades. Known for its comfortable accommodations and excellent service, it has become
                    a trusted destination for travelers.</p>
            </div>
            <div class="col-lg-6 col-md-5 order-sm-1 order-lg-2 order-md-2">
                <img src="IMAGES/about/about.jpeg" class="w-100">
            </div>
        </div>

        <!-- Our  -->
        <div class="container mt-5">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-3 col-md-6 mb-4 px-4 shadow bg-white  border-top border-4 rounded p-4  text-center box">
                    <div class="d-flex align-items-center ms-2 justify-content-center">
                        <img src="IMAGES/about/hotel.svg" width="70px">
                    </div>
                    <h5 class="mt-3">200+ Rooms</h5>
                </div>
                <div class="col-lg-3  col-md-6 mb-4 px-4 shadow bg-white border-top border-4 rounded p-4 text-center box">
                    <div class="d-flex align-items-center ms-2 justify-content-center">
                        <img src="IMAGES/about/customers.svg" width="70px">
                    </div>
                    <h5 class="mt-3">500+ Customers</h5>
                </div>
                <div class="col-lg-3  col-md-6 mb-4 px-4 shadow bg-white border-top border-4 rounded p-4 text-center box">
                    <div class="d-flex align-items-center ms-2 justify-content-center">
                        <img src="IMAGES/about/staff.svg" width="70px">
                    </div>
                    <h5 class="mt-3">150+ Staffs</h5>
                </div>
                <div class="col-lg-3  col-md-6 mb-4 px-4 shadow bg-white border-top border-4 rounded p-4 text-center box">
                    <div class="d-flex align-items-center ms-2 justify-content-center">
                        <img src="IMAGES/about/rating.svg" width="70px">
                    </div>
                    <h5 class="mt-3">400+ Reviews</h5>
                </div>
            </div>
        </div>
        <!-- Management team -->
        <h3 class="my-5 fw-bold h-font text-center">Management Team</h3>
        <!-- carousel for management team images -->

        <div class="container px-4">
            <div class="swiper mySwiper swiper-container">
                <div class="swiper-wrapper mb-5">

                    <div class="swiper-slide bg-white text-center overflow-hidden object-fit-cover rounded">
                        <img src="IMAGES/about/dev-g1.jpg" class="w-100">
                        <h5 class="mt-2">Amisha durve </h5>
                    </div>
                    <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                        <img src="IMAGES/about/dev3.jpg" class="w-100">
                        <h5 class="mt-2">Manu nayar </h5>
                    </div>

                    <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                        <img src="IMAGES/about/dev.jpeg" class="w-100">
                        <h5 class="mt-2">Raj Malhotra</h5>
                    </div>
                    <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                        <img src="IMAGES/about/team.jpeg" class="w-100">
                        <h5 class="mt-2">Raj Malhotra: Team</h5>
                    </div>
                    <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                        <img src="IMAGES/about/dev1.jpg" class="w-100">
                        <h5 class="mt-2">Aman sinha </h5>
                    </div>
                    <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                        <img src="IMAGES/about/team1.jpg" class="w-100">
                        <h5 class="mt-2">Aman Sinha: Team </h5>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 30,
            slidesPerView: 3,
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            breakpoints: {
                400: { // At 576px (small screens like smartphones)
                    slidesPerView: 1, // Display 1 slide
                    spaceBetween: 10 // 10px between slides
                },
                768: { // At 768px (tablets)
                    slidesPerView: 2, // Display 2 slides
                    spaceBetween: 20 // 20px between slides
                },
                992: { // At 992px (laptops)
                    slidesPerView: 3, // Display 3 slides
                    spaceBetween: 30 // 30px between slides
                },
                1200: { // At 1200px and above (desktops)
                    slidesPerView: 4, // Display 4 slides
                    spaceBetween: 40 // 40px between slides
                }
            }

        });
    </script>






    <?php require('include/footer.php') ?>
</body>

</html>