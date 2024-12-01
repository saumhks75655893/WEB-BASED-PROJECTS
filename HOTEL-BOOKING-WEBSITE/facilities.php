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
        top: -70px !important;
        /* margin-left: 20px !important; */
    }

    .pop:hover {
        transform: scale(1.03);
        transition: all 0.3s;
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
</style>

<body class="bg-light">

    <?php require('include/header.php') ?>

    <!-- hotel facilities view -->
    <div class="my-5 px-4">
        <h1 class="text-center fw-bold h-font">Facilities</h1>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3 ">Hotels typically offer a range of facilities to enhance guest comfort and convenience. Common amenities include comfortable rooms with <br> ensuite bathrooms, free Wi-Fi, air conditioning,and flat-screen TVs. Our hotel also provide 24-hour front desk service, on-site dining options such as restaurants or cafes, room service, and fitness centers.</p>
    </div>

    <!-- facilities -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-4 col-md-5 px-5 my-5">
                <div class="bg-white shadow border-top border-4 p-4 my-2 pop">
                    <div class="d-flex align-items-center">
                        <img src="IMAGES/facilities/wifi.svg" width="50px">
                        <h5 class="mt-3 ms-3">Wifi</h5>
                    </div>
                    <p>Enjoy seamless connectivity throughout your stay with our high-speed Wi-Fi, available in all rooms and common areas. Whether you're working, streaming, or staying in touch with loved ones, we’ve got you covered!</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-5 px-5 my-5">
                <div class="bg-white shadow border-top border-4 p-4 my-2 pop">
                    <div class="d-flex align-items-center">
                        <img src="IMAGES/facilities/rooms.svg" width="50px">
                        <h5 class="mt-3 fb-3 ms-3">Room</h5>
                    </div>
                    <p>Each of our rooms is equipped with complimentary high-speed Wi-Fi, ensuring you can stay connected during your stay. Whether you need to catch up on work, stream your favorite shows, or browse the web, enjoy uninterrupted access right from the comfort of your room.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-5 px-5 my-5">
                <div class="bg-white shadow border-top border-4 p-4 my-2 pop">
                    <div class="d-flex align-items-center">
                        <img src="IMAGES/facilities/flattv.svg" width="50px">
                        <h5 class="mt-3 ms-3">Television</h5>
                    </div>
                    <p>Each room features a modern television with access to a variety of channels, ensuring you can relax and enjoy your favorite shows, movies, or news. Whether you’re unwinding after a busy day or catching up on the latest entertainment, we’ve got you covered.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-5 px-5 my-5">
                <div class="bg-white shadow border-top border-4 p-4 my-2 pop">
                    <div class="d-flex align-items-center">
                        <img src="IMAGES/facilities/IMG_27079.svg" width="50px">
                        <h5 class="mt-3 ms-3">Room Services</h5>
                    </div>
                    <p>Experience the ultimate in comfort with our dedicated room service, available to cater to your needs. Whether you’re craving a delicious meal, need a refreshing beverage, or require additional amenities, our team is here to assist you. Enjoy the luxury of dining or relaxing in the privacy of your room, with prompt and professional service tailored to your preferences.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-5 px-5 my-5">
                <div class="bg-white shadow border-top border-4 p-4 my-2 pop">
                    <div class="d-flex align-items-center">
                        <img src="IMAGES/facilities/ac.svg" width="50px">
                        <h5 class="mt-3 ms-3">AC</h5>
                    </div>
                    <p>Each room is equipped with modern air conditioning to ensure a pleasant and relaxing stay. Adjust the temperature to your liking and enjoy a refreshing environment, whether you’re escaping the summer heat or simply unwinding after a long day. Your comfort is our priority!</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-5 px-5 my-5">
                <div class="bg-white shadow border-top border-4 p-4 my-2 pop">
                    <div class="d-flex align-items-center">
                        <img src="IMAGES/facilities/heater.svg" width="50px">
                        <h5 class="mt-3 ms-3">Room Heater</h5>
                    </div>
                    <p>Our rooms are equipped with efficient room heaters to keep you warm and comfortable during chilly days and nights. Relax in a cozy environment and enjoy your stay, no matter the weather outside. Your comfort is always our priority!
                    </p>
                </div>
            </div>
        </div>
    </div>


    <!-- footer -->
    <br>
    <?php require('include/footer.php') ?>
</body>

</html>