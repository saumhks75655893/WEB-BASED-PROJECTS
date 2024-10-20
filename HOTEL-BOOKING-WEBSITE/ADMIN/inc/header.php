<!-- header -->
<div class="container-fluid bg-dark p-3 d-flex align-items-center justify-content-between text-light sticky-top">
    <h3 class="mb-0 h-font">XYZ HOTEL </h3>
    <a href="logout.php" class="btn btn-light btn-sm ">LogOut</a>
</div>

<!-- admin design -->
<div class="col-lg-2  col-sm-12 bg-dark border-top border-3 border-secondary" id="dashboard-menu">
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid flex-lg-column align-items-stretch">
            <!-- Filtering -->
            <h4 class="mt-2 text-white">Admin Panel</h4>
            <button class="navbar-toggler nav-dark bg-white shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#adminDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-column align-items-stretch mt-3" id="adminDropdown">
                <ul class="nav nav-pills flex-column ">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Rooms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="settings.php">Setting</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>