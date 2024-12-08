<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo "HOTEL BOOKING WEBSITE - CONFIRM BOOKING" ?>
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

    /*
    some condition to be complete for booking : ----
    1. Check room id from url is present or not
    2. Shutdown mode is active or not
    3. User is logged in or not

    */


    if (!isset($_GET['id']) || $setting_r['shutdown'] == true) {
        redirect('rooms.php');
    } else {
        if (!isset($_SESSION['login']) && $_SESSION['login'] == true) {
            redirect('rooms.php');
        }
    }

    // filter and get room and user data
    
    $data = filteration($_GET);

    $room_res = select("SELECT * FROM `rooms` WHERE `id`=? AND `status`=? AND `removed`=?", [$data['id'], 1, 0], 'iii');

    if (mysqli_num_rows($room_res) == 0) {
        redirect('rooms.php');
    }

    $room_data = mysqli_fetch_assoc($room_res);
    // on/off book_now button
    $book_now = "";

    if (!$setting_r['shutdown']) {
        $login = 0;
        if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
            $login = 1;
        }
        $book_now = "<button  onclick='checkLoginToBook($login,$room_data[id])' class='btn btn-sm p-2 text-white custom-bg fw-bold'>Book now </button>";
    }

    // store value of the booking
    $_SESSION['room'] = [
        "id" => $room_data['id'],
        "name" => $room_data['name'],
        "price" => $room_data['price'],
        "payment" => null,
        "" => false,
    ];

    $user_res = select(
        "SELECT * FROM `user_cred` WHERE `id`=? LIMIT 1",
        [$_SESSION['uId']],
        'i'
    );

    $user_data = mysqli_fetch_assoc($user_res);

    ?>
    <!-- hotel room booking view -->
    <!-- room booking design -->

    <div class="container">
        <div class="row">

            <!-- Room title -->
            <div class="col-12 my-5 mb-4 px-4">
                <h2 class="fw-bold">CONFIRM BOOKING</h2>
                <div style="font-size:14px mb-2 me-2">
                    <a href="index.php" class="text-secondary text-decoration-none mb-1 me-1">HOME</a>
                    <span class="text-secondary"> > </span>
                    <a href="rooms.php" class="text-secondary text-decoration-none mb-1 me-1">ROOMS</a>
                    <span class="text-secondary"> > </span>
                    <a href="confirm.php" class="text-secondary text-decoration-none mb-1 me-1">CONFIRM</a>
                </div>
            </div>
            <!-- Room Images -->
            <div class="col-lg-7 col-md-12 px-4">
                <?php
                // get thumbnail of the room
                
                $room_thumb = ROOM_IMG_PATH . "thumbnail.jpg";
                $thumb_q = mysqli_query($conn, "SELECT * FROM `room_images` where `room_id`= '$room_data[id]' AND `thumb`='1'");
                if (mysqli_num_rows($thumb_q) > 0) {
                    $thumb_res = mysqli_fetch_assoc($thumb_q);
                    $room_thumb = ROOM_IMG_PATH . $thumb_res['image'];
                }


                echo <<<data
                 <div class='card p-3 shadow-sm rounded'>
                    <img src="$room_thumb" class="img-fluid rounded" alt="..."><br>
                    <h5>$room_data[name]</h5>
                    <h5>₹$room_data[price] per night</h5>
                </div>
                data;
                ?>
            </div>
            <!-- Room details -->
            <div class="col-lg-5 col-md-12 px-4">
                <div class="card mb-4 border-0 shadow-sm rounded-3">
                    <div class="card-body">
                        <form action="pay_now.php" id="booking_form" method="POST">
                            <h6 class="mb-3">BOOKING DETAILS</h6>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" required value="<?php echo $user_data['name'] ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Phone Number</label>
                                    <input type="number" name="phonenum" required
                                        value="<?php echo $user_data['phonenum'] ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" required value="<?php echo $user_data['email'] ?>">
                                </div>
                                <?php $date = date('d-m-Y', strtotime($user_data['datentime'])) ?>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Date</label>
                                    <input type="text" name="date" required value="<?php echo $date ?>">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Address</label>
                                    <textarea name="address" rows="1" class="form-control shadow-none"
                                        required><?php echo $user_data['address'] ?></textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Check in</label>
                                    <input name="checkin" type="date" onchange="check_availability()"
                                        class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Check out</label>
                                    <input name="checkout" type="date" onchange="check_availability()"
                                        class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="spinner-border text-info d-none" role="status" id="info_loader">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <h6 class="text-danger mb-3" id="pay_info">Provide check-in & check-out dates !!
                                    </h6>
                                    <button name="pay_now" class="btn w-100 text-white custom-bg shadow-none mb-1" target="_blank" disabled>Pay now</button>
                                </div>

                            </div>
                        </form>
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
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing tates accusamus reprehenderit vel
                    repellendus
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

        <script>
            let booking_form = document.getElementById('booking_form');
            let info_loader = document.getElementById('info_loader');
            let pay_info = document.getElementById('pay_info');

            function check_availability() {
                let checkin_val = booking_form.elements['checkin'].value;
                let checkout_val = booking_form.elements['checkout'].value;
                let user_name = booking_form.elements['name'].value; 

                booking_form.elements['pay_now'].setAttribute('disabled', true); arguments

                if (checkin_val != '' && checkout_val != '') {
                    pay_info.classList.add('d-none');
                    pay_info.classList.replace('text-dark', 'text-danger');
                    info_loader.classList.remove('d-none');

                    let data = new FormData();

                    data.append('check_availability', '');
                    data.append('check_in', checkin_val);
                    data.append('check_out', checkout_val);
                    data.append('name',user_name); 

                    let xhr = new XMLHttpRequest();
                    xhr.open("POST", "ajax/confirm_booking.php", true);
                    // xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                    xhr.onload = function () {
                        let data = JSON.parse(this.responseText);
                        if (data.status == 'checkin_checkout_equal') {
                            pay_info.innerText = 'You cannot check-out on the say day!'
                        }
                        else if (data.status == 'check_out_earlier') {
                            pay_info.innerText = 'Checkout date is earlier than checkin date !!';
                        }
                        else if (data.status == 'check_in_earlier') {
                            pay_info.innerText = "Check_in date is earlier than today's date!! ";
                        }
                        else if (data.status == "unavailable") {
                            pay_info.innerText = 'Room is not available for this check-in date!';
                        } else {
                            pay_info.innerHTML = "No. of days : " + data.days + "<br>Total Amount to Pay : ₹" + data.payment;
                            pay_info.classList.replace('text-danger', 'text-dark');
                            booking_form.elements['pay_now'].removeAttribute('disabled')
                        }
                    }
                    pay_info.classList.remove('d-none');
                    info_loader.classList.add('d-none');

                    xhr.send(data);

                }
            }
        </script>
</body>

</html>