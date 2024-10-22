<!-- Footer Section  -->
<div class="container-fluid bg-white w-100">
    <div class="row no-gutters">
        <div class="col-12 col-md-4  p-4">
            <h5 class="h-font fw-bold fs-3 mb-3">XYZ HOTEL</h5>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illo recusandae
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus, exercitationem?
                iure sed soluta necessitatibus sapiente perspiciatis totam sint, odit provident.</p>
        </div>
        <div class="col-12 col-md-4  p-4">
            <h5 class="fs-3 mb-3">Links </h5>
            <a href="index.php" class="d-inline-block mb-2 text-decoration-none text-dark ">Home</a><br>
            <a href="rooms.php" class="d-inline-block mb-2 text-decoration-none text-dark ">Rooms</a><br>
            <a href="facilities.php" class="d-inline-block mb-2 text-decoration-none text-dark ">Facilities</a><br>
            <a href="contact.php" class="d-inline-block mb-2 text-decoration-none text-dark ">Contact Us</a><br>
            <a href="about.php" class="d-inline-block mb-2 text-decoration-none text-dark ">About</a><br>
        </div>
        <div class="col-12 col-md-4  p-4">
            <h5 class="mb-3">Follow us</h5>
            <!-- Twitter -->
            <a href="https://x.com/" class="d-inline-block  text-decoration-none text-dark">
                <i class="bi bi-twitter-x bg-light text-dark fs-6 me-2"></i>
                <p class="d-inline-block text-decoration-none text-dark">Twitter</p>
            </a>
            <br>
            <!-- INSTAGRAM -->
            <a href="https://www.instagram.com/" class="d-inline-block text-decoration-none">
                <i class="bi bi-instagram bg-light text-dark  fs-6 me-2"></i>
                <p class="d-inline-block text-decoration-none text-dark">Instagram</p>
            </a>
            <br>
            <!-- Facebook -->
            <a href="https://www.facebook.com/" class="d-inline-block text-decoration-none text-dark">
                <i class="bi bi-facebook bg-light text-dark  fs-6 me-2 text-dark"></i>
                <p class="d-inline-block text-decoration-none text-dark">Facebook </p>
            </a>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

<!-- nav-hover effect -->
<script>
    let navbar = document.getElementById('nav-bar');
    let a_tabs = navbar.getElementsByTagName('a');

    function setActive() {
        for (let i = 0; i < a_tabs.length; i++) {
            let file = a_tabs[i].href.split('/').pop();
            let file_name = file.split('.')[0];
            console.log(file_name); 
            if (document.location.href.indexOf(file_name) >= 0) {
                a_tabs[i].classList.add('fw-bold','fs-5');
            }
        }

    }

    // Call the function
    setActive();
</script>