<!-- Header -->
<div class="container-fluid bg-dark p-3 d-flex align-items-center justify-content-between text-light sticky-top">
    <h3 class="mb-0 h-font">THE KING HOTEL</h3>
    <a href="logout.php" class="btn btn-light btn-sm">LogOut</a>
</div>

<!-- Sidebar Navigation -->
<div class="col-lg-2 bg-dark border-top border-3 border-secondary" id="dashboard-menu">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid flex-lg-column align-items-stretch">
            <!-- Admin Panel Header -->
            <h4 class="mt-2 text-light">Admin Panel</h4>
            <!-- Toggler for Small Screens -->
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#adminDropdown" aria-controls="adminDropdown" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Collapsible Navigation -->
            <div class="collapse navbar-collapse flex-column align-items-stretch mt-3" id="adminDropdown">
                <ul class="nav nav-pills flex-column">
                    <!-- Dashboard Link -->
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">
                            Dashboard
                        </a>
                    </li>
                    <!-- bookings -->
                    <li class="nav-item">
                        <button
                            class="btn text-white px-3 w-100 shadow-none d-flex align-items-center justify-content-between"
                            type="button" data-bs-toggle="collapse" data-bs-target="#booking_links">
                            <span> Bookings </span>
                            <span><i class="bi bi-caret-down"></i></span>
                        </button>
                        <div class="collapse show px-3 small mb-3" id="booking_links">
                            <ul class="nav nav-pills flex-column rounded border border-secondary">
                             
                                <li class="nav-item text-white">
                                    <a class="nav-link" href="new_bookings.php">New bookings</a>
                                </li>
                             
                                <li class="nav-item text-white">
                                    <a class="nav-link" href="refund_bookings.php">Refund bookings</a>
                                </li>
                             
                                <li class="nav-item text-white">
                                    <a class="nav-link" href="bookings_records.php">Booking Records</a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <!-- Users Link -->
                    <li class="nav-item">
                        <a class="nav-link" href="users.php">
                            Users
                        </a>
                    </li>

                    <!-- Users Queries Link -->
                    <li class="nav-item">
                        <a class="nav-link" href="users_queries.php">
                            Users Queries
                        </a>
                    </li>

                    <!-- Rooms Link -->
                    <li class="nav-item">
                        <a class="nav-link" href="rooms.php">
                            Rooms
                        </a>
                    </li>

                    <!-- Settings Link -->
                    <li class="nav-item">
                        <a class="nav-link" href="settings.php">
                            Settings
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>