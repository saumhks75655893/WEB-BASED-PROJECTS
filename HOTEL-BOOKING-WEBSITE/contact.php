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
    .custom-bg {
        color: black;
        background-color: var(--teal) !important;
        font-weight: 500 !important;
    }

    .custom-bg:hover {
        background-color: var(--teal_hover) !important;
        font-weight: 700 !important;
    }
</style>

<body class="bg-light">

    <?php require('include/header.php') ?>

    <!-- hotel facilities view -->
    <div class="my-5 px-4">
        <h1 class="text-center fw-bold h-font">Contact Us </h1>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3 ">Feel free to contact us. Phone No - +91 8618587690 gmail - sksinha85345@gmail.com</p>
    </div>

    <!-- facilities -->
    <div class="container mt-3">
        <div class="row">
            <!-- left side -->
            <div class="col-lg-6 col-md-5 px-5 my-3">
                <!-- embed the map of the hotel where situated -->
                <div class="bg-white shadow p-4 my-2 overflow-hidden">
                    <iframe class="w-100 rounded mb-4" height="320px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14711.925445286224!2d81.72858533790232!3d22.803154519246682!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3987a09f2beeee53%3A0x8e16a10edc999450!2sLalpur%2C%20Madhya%20Pradesh%20484886!5e0!3m2!1sen!2sin!4v1728836174430!5m2!1sen!2sin" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <!-- address section -->
                    <h5 class="fw-bold">Address</h5>
                    <a href="https://maps.app.goo.gl/dbLQsF8NKpRZUgqm6" target="_blank" class="d-inling-block text-decoration-none text-dark mb-3">
                        <i class="bi bi-geo-alt"></i>Lalput, Amarkantak, Anuppur, Madhya Pradesh</a>

                    <!-- call us -->
                    <h5 class="mt-4">Call Us</h5>
                    <a href="tel: +91 7686844050" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill"></i>+91 7686844050
                    </a>
                    <br>
                    <a href="tel: +91 7686844050" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill"></i>+91 7686844050
                    </a>

                    <!-- email us -->
                    <h5 class="mt-4">Email Us</h5>
                    <a href="mailto: himanshukumar75655893@gmail.com" class="d-inline-block text-decoration-none text-dark mb-3">
                        <i class="bi bi-envelope me-2"></i>himanshukumar75655893@gmail.com</a>


                    <!-- Follow us  -->
                    <h5 class="mt-4 mb-3">Follow Us</h5>
                    <!-- Twitter -->
                    <a href="#" class="d-inline-block mb-3">
                        <i class="bi bi-twitter-x bg-light text-dark fs-6 p-2 ms-4"></i>
                        </span>
                    </a>
                    <!-- INSTAGRAM -->

                    <a href="#" class="d-inline-block mb-3">
                        <i class="bi bi-instagram bg-light text-dark text-decoration-none fs-6 p-2 ms-3"></i>
                        </span>
                    </a>

                    <!-- Facebook -->
                    <a href="#" class="d-inline-block mb-3">
                        <i class="bi bi-facebook bg-light text-dark text-decoration-none fs-6 p-2 ms-3"></i>
                    </a>
                </div>
            </div>
            <!-- right side -->
            <div class="col-lg-6 col-md-5 px-5 my-3">
                <div class="bg-white shadow p-4 my-2">
                    <h5>Send a Message </h5>
                    <form action="#">
                        <label class="form-label fw-600 mb-1">Name</label>
                        <input type="text" class="form-control shadow-none mb-3" placeholder="Your name" required>

                        <label class="form-label fw-600 mb-1">Email</label>
                        <input type="email" class="form-control shadow-none mb-3" placeholder="Your email-id" required>

                        <label class="form-label fw-600 mb-1">Subject</label>
                        <input type="text" class="form-control shadow-none mb-3" placeholder="Subject for contacting">

                        <label class="form-label fw-600 mb-1">Message</label>
                        <textarea class="form-control shadow-none mb-3" rows="3" placeholder="Write Why are you contacting us in brief. "></textarea>

                        <button type="reset"
                            class="btn  shadow-none  me-3  custom-bg">CLEAR</button>
                        <button type="submit"
                            class="btn  shadow-none  me-2 custom-bg ">LOGIN</button>
                    </form>
                </div>

            </div>
        </div>

        <br><br><br>
        <!-- footer -->
        <?php require('include/footer.php') ?>
</body>

</html>