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

    <?php
    if (!isset($_GET['id'])) {
        redirect('rooms.php');
    }

    $data = filteration($_GET);

    $room_res = select("SELECT * FROM `rooms` WHERE `id`=? AND `status`=? AND `removed`=?", [$data['id'], 1, 0], 'iii');

    if (mysqli_num_rows($room_res) == 0) {
        redirect('rooms.php');
    }

    $room_data = mysqli_fetch_assoc($room_res);


    // book_now on/off functionality
    $book_now = "";

    if (!$setting_r['shutdown']) {
        $book_now = "<a href='#' class='btn btn-sm p-2 text-white  custom-bg fw-bold'>Book now</a>";
    }
    ?>
    <!-- hotel room view -->


    <!-- room design -->


    <div class="container">
        <div class="row">

            <!-- Room title -->
            <div class="col-12 my-5 mb-4 px-4">
                <h2 class="fw-bold"><?php echo $room_data['name'] ?></h2>
                <div style="font-size:14px mb-2 me-2">
                    <a href="index.php" class="text-secondary text-decoration-none mb-1 me-1">HOME</a>
                    <span class="text-secondary">></span>
                    <a href="rooms.php" class="text-secondary text-decoration-none mb-1 me-1">ROOMS</a>
                </div>
            </div>
            <!-- Room Images -->
            <div class="col-lg-7 col-md-12 px-4">
                <!-- image of the rooms -->
                <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">

                        <?php

                        $room_image = ROOM_IMG_PATH . "thumbnail.jpg";
                        $img_q = mysqli_query($conn, "SELECT * FROM `room_images` where `room_id`= '$room_data[id]'");
                        if (mysqli_num_rows($img_q) > 0) {
                            $active_class = 'active';
                            while ($img_res = mysqli_fetch_assoc($img_q)) {
                                echo "<div class='carousel-item $active_class'>
                                 <img height='350' src='" . ROOM_IMG_PATH . $img_res['image'] . "' class='d-block w-100 rounded'>
                                </div>";
                            }
                            ;
                            $active_class = "";
                        } else {
                            echo "<div class='carousel-item active'>
                             <img src='$room_image' class='d-block w-100'>
                            </div>";
                        }
                        ?>

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <!-- Room details -->
            <div class="col-lg-5 col-md-12 px-4">
                <div class="card mb-4 border-0 shadow-sm rounded-3">
                    <div class="card-body">
                        <?php
                        // price
                        echo <<<price
                                   <h4 class="mb-3"> ₹$room_data[price] per night</h4>
                            price;
                        // rating
                        echo <<<rating
                          
                            <div class="badges rounded-pill bg-light  mb-3">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </div>
                        
                        rating;

                        //  get features of the rooms
                        $fea_q = mysqli_query($conn, "SELECT f.name from `features` f INNER JOIN `room_features` rfea ON f.id = rfea.features_id WHERE rfea.room_id = '$room_data[id]'");
                        $features_data = "";
                        while ($fea_row = mysqli_fetch_assoc($fea_q)) {
                            $features_data .= "<span class='badge rounded-pill bg-light text-dark text-wrap'>
                            $fea_row[name]
                        </span>";
                        }

                        echo <<<features
                              <h6 class="mb-1 mt-2">Facilities</h6>
                               <span class="badge-lg rounded-pill bg-light text-dark text-wrap me-1 mb-1">
                                    $features_data
                               </span>
                        features;


                        //  get facilities of the rooms
                        $faci_q = mysqli_query($conn, "SELECT f.name from `facilities` f INNER JOIN `room_facilities` rfaci ON f.id = rfaci.facilities_id WHERE rfaci.room_id = '$room_data[id]'");

                        $facilities_data = "";
                        while ($faci_row = mysqli_fetch_assoc($faci_q)) {
                            $facilities_data .= "<span class='badge rounded-pill bg-light text-dark text-wrap'>
                            $faci_row[name]
                        </span>";
                        }
                        echo <<<facilities

                             <h6 class="mb-1 mt-2">Facilities</h6>
                                 <span class="badge-lg rounded-pill bg-light text-dark text-wrap me-1 mb-1">
                                        $facilities_data
                                </span>
                        facilities;


                        // Guests 
                        echo <<<guests
                            <h6 class="mb-1 mt-2">Guests</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                $room_data[adults] Adults
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap mb-sm-3">
                                $room_data[children] Children
                            </span>
                        guests;

                        //  Area
                        echo <<<area
                            <h6 class="mb-1">Area</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                $room_data[area] Sq.ft.
                            </span>
                        area;

                        // Quantity
                        echo <<<quantity
                            <h6 class="mb-1 mt-2">Quantity</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                $room_data[quantity] 
                            </span>
                        quantity;

                        // Book Room
                        echo <<<book
                            <br>
                            $book_now
                        book;




                        ?>
                    </div>
                </div>
            </div>

            <!-- description -->
            <div class="col-lg-12 mt-4 px-4">
                <div class="mb-4">
                    <h5>Description</h5>
                    <?php
                    echo <<<description
                        $room_data[description]
                    description;
                    ?>
                </div>


                <h5>Review And Rating</h5>
                <!-- 1. -->
                <div class="profile d-flex align-items-center mb-2 mt-3">
                    <img src="IMAGES/facilities/star.svg" width="20px">
                    <h5 class="m-0 ms-3">Random user 1</h5>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing tates accusamus reprehenderit vel repellendus
                    nihil possimus dolorem de aliquid!</p>
                <div class="rating">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
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


                    });
                </script>


            </div>
        </div>

        <!-- footer -->
        <br>
        <?php require('include/footer.php') ?>

        <!-- java script  -->
</body>

</html>