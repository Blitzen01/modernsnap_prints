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

<?php
    include '../../render/modals.php';
    
    $username = $_SESSION['username'];
    $permission = $_SESSION['permission'];
    
    $displayStyle = ($permission === 'owner') ? 'block' : 'none';
?>

<link rel="stylesheet" href="../../assets/style/admin_style.css">
<link rel="stylesheet" href="../../assets/style/evo-calendar.midnight-blue.min.css">
<link rel="stylesheet" href="../../assets/style/evo-calendar.min.css">

<script src="../../assets/script/evo-calendar.min.js"></script>

<div id="sidebar">
    <div class="text-center border-bottom border-secondary">
        <img id="sidebar_logo" src="../../assets/image/sidebar_logo_no_bg.png" alt="" srcset="">
    </div>
    <div class="text-center border-bottom border-secondary">
        <span>Admin: <strong><?php echo strtoupper($username); ?></strong></span>
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
        <div id="check_permission" style="display:<?php echo $displayStyle; ?>">
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
            <a href="../web_content/expenses.php" class="nav-link d-flex">
                <div class="row">
                    <div class="col-1">
                        <div class=""><i class="fa-solid fa-money-bill"></i></div>
                    </div>
                    <div class="col">
                        <div><span>Expenses</span></div>
                    </div>
                </div>
            </a>
            <a href="../web_content/operator.php" class="nav-link d-flex">
                <div class="row">
                    <div class="col-1">
                        <div class=""><i class="fa-solid fa-address-card"></i></div>
                    </div>
                    <div class="col">
                        <div><span>Operator</span></div>
                    </div>
                </div>
            </a>
            <a href="../web_content/need_to_do.php" class="nav-link d-flex">
                <div class="row">
                    <div class="col-1">
                        <div class=""><i class="fa-solid fa-clipboard"></i></div>
                    </div>
                    <div class="col">
                        <div><span>To Do List</span></div>
                    </div>
                </div>
            </a>
        </div>
        <a href="../web_content/gallery.php" class="nav-link d-flex">
            <div class="row">
                <div class="col-1">
                    <div class=""><i class="fa-solid fa-images"></i></div>
                </div>
                <div class="col">
                    <div><span>Gallery</span></div>
                </div>
            </div>
        </a>
        <a href="../web_content/account_settings.php" class="nav-link d-flex">
            <div class="row">
                <div class="col-1">
                    <div class=""><i class="fa-solid fa-user"></i></div>
                </div>
                <div class="col">
                    <div><span>Account Settings</span></div>
                </div>
            </div>
        </a>
        <a href="../../assets/php_script/admin_logout.php" class="nav-link">
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
                <div id="check_permission" style="display:<?php echo $displayStyle; ?>">
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
                        <a class="nav-link" href="../web_content/expenses.php">
                            <i class="fa-solid fa-money-bill"></i> Expenses
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../web_content/operator.php">
                            <i class="fa-solid fa-address-card"></i> Operator
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../web_content/need_to_do.php">
                            <i class="fa-solid fa-clipboard"></i> To Do List
                        </a>
                    </li>
                </div>
                <li class="nav-item">
                    <a class="nav-link" href="../web_content/gallery.php">
                        <i class="fa-solid fa-images"></i> Gallery
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../web_content/account_settings.php">
                        <i class="fa-solid fa-user"></i> Account Settings
                    </a>
                </li>
                <!-- Other menu items follow the same structure -->
                <li class="nav-item">
                    <a class="nav-link" href="../../assets/php_script/admin_logout.php">
                        <i class="fa-solid fa-power-off"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>
