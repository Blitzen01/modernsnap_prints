<!-- <div id="sidebar">
    <div class="text-center border-bottom border-secondary">
        <img id="sidebar_logo" src="../../assets/image/sidebar_logo_no_bg.png" alt="" srcset="">
    </div>
    <div class="text-center border-bottom border-secondary">
        <span>Admin: <strong>name</strong></span>
    </div>
    <div id="sidebar_nav" class="pt-3">
        <a href="../web_content/event_calendar.php" class="nav-link d-flex">
            <div class="row">
                <div class="col-1">
                    <div class=""><i class="fa-regular fa-calendar-days"></i></div>
                </div>
                <div class="col">
                    <div><span>Event Calendar</span></div>
                </div>
            </div>
        </a>
        <a href="../web_content/dashboard.php" class="nav-link d-flex">
            <div class="row">
                <div class="col-1">
                    <div class=""><i class="fa-solid fa-gauge"></i></div>
                </div>
                <div class="col">
                    <div><span>Dashboard</span></div>
                </div>
            </div>
        </a>
        <a href="../web_content/booking.php" class="nav-link d-flex">
            <div class="row">
                <div class="col-1">
                    <div class=""><i class="fa-solid fa-book"></i></div>
                </div>
                <div class="col">
                    <div><span>Booking</span></div>
                </div>
            </div>
        </a>
        <a href="../web_content/inventory.php" class="nav-link d-flex">
            <div class="row">
                <div class="col-1">
                    <div class=""><i class="fa-solid fa-boxes-stacked"></i></div>
                </div>
                <div class="col">
                    <div><span>Inventory</span></div>
                </div>
            </div>
        </a>
        <div class="position-absolute bottom-0">
            <a href="../index.php" class="nav-link">
                <div class="row">
                    <div class="col-1">
                        <div class=""><i class="fa-solid fa-power-off"></i></div>
                    </div>
                    <div class="col">
                        <div><span>Logout</span></div>
                    </div>
                </div>
            </a>
        </div>
        
    </div>
</div> -->

<?php include '../../render/modals.php'; ?>

<div id="sidebar">
    <div class="text-center border-bottom border-secondary">
        <img id="sidebar_logo" src="../../assets/image/sidebar_logo_no_bg.png" alt="" srcset="">
    </div>
    <div class="text-center border-bottom border-secondary">
        <span>Admin: <strong>name</strong></span>
    </div>
    <div id="sidebar_nav" class="pt-3 d-none d-md-block">
        <a href="../web_content/event_calendar.php" class="nav-link d-flex">
            <div class="row">
                <div class="col-1">
                    <div class=""><i class="fa-regular fa-calendar-days"></i></div>
                </div>
                <div class="col">
                    <div><span>Event Calendar</span></div>
                </div>
            </div>
        </a>
        <a href="../web_content/dashboard.php" class="nav-link d-flex">
            <div class="row">
                <div class="col-1">
                    <div class=""><i class="fa-solid fa-gauge"></i></div>
                </div>
                <div class="col">
                    <div><span>Dashboard</span></div>
                </div>
            </div>
        </a>
        <a href="../web_content/booking.php" class="nav-link d-flex">
            <div class="row">
                <div class="col-1">
                    <div class=""><i class="fa-solid fa-book"></i></div>
                </div>
                <div class="col">
                    <div><span>Booking</span></div>
                </div>
            </div>
        </a>
        <a href="../web_content/inventory.php" class="nav-link d-flex">
            <div class="row">
                <div class="col-1">
                    <div class=""><i class="fa-solid fa-boxes-stacked"></i></div>
                </div>
                <div class="col">
                    <div><span>Inventory</span></div>
                </div>
            </div>
        </a>
        <a href="../web_content/pricing.php" class="nav-link d-flex">
            <div class="row">
                <div class="col-1">
                    <div class=""><i class="fa-solid fa-peso-sign"></i></div>
                </div>
                <div class="col">
                    <div><span>Pricing</span></div>
                </div>
            </div>
        </a>
        <a href="../web_content/expences.php" class="nav-link d-flex">
            <div class="row">
                <div class="col-1">
                    <div class=""><i class="fa-solid fa-money-bill"></i></div>
                </div>
                <div class="col">
                    <div><span>Expences</span></div>
                </div>
            </div>
        </a>
        <a href="../web_content/need_to_do.php" class="nav-link d-flex">
            <div class="row">
                <div class="col-1">
                    <div class="">!!!</div>
                </div>
                <div class="col">
                    <div><span>To Do List</span></div>
                </div>
            </div>
        </a>
        <a href="../index.php" class="nav-link">
            <div class="row">
                <div class="col-1">
                    <div class=""><i class="fa-solid fa-power-off"></i></div>
                </div>
                <div class="col">
                    <div><span>Logout</span></div>
                </div>
            </div>
        </a>
    </div>
    
    <nav class="navbar navbar-expand-md bg-none d-md-none">
        <button class="navbar-toggler justify-content-end" type="button" data-bs-toggle="collapse" data-bs-target="#admin_navBar"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" id="toggle">
            <i class="fa-solid fa-bars text-light"></i>
        </button>
        <div class="collapse navbar-collapse" id="admin_navBar">
            <ul class="navbar-nav" id="sidebar">
                <li class="nav-item">
                    <a class="nav-link" href="../web_content/event_calendar.php">
                        <i class="fa-regular fa-calendar-days"></i> Event Calendar
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../web_content/dashboard.php">
                        <i class="fa-solid fa-gauge"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../web_content/booking.php">
                        <i class="fa-solid fa-book"></i> Booking
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../web_content/inventory.php">
                        <i class="fa-solid fa-boxes-stacked"></i> Inventory
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../web_content/pricing.php">
                        <i class="fa-solid fa-peso-sign"></i> Pricing
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../web_content/expences.php">
                        <i class="fa-solid fa-money-bill"></i> Expences
                    </a>
                </li>
                <!-- Other menu items follow the same structure -->
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">
                        <i class="fa-solid fa-power-off"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>