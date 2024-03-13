<section class="text-center">
    <?php
        date_default_timezone_set('Asia/Manila');
        $currentDate = date("F d, Y");
        echo "<h2>as of $currentDate</h2>";

        $currentMonth = date('m');
        $currentYear = date('Y');

        $countQuery = "SELECT COUNT(*) AS totalBookings, SUM(total_price) AS totalIncome FROM transaction_history 
               WHERE MONTH(date) = '$currentMonth' AND YEAR(date) = '$currentYear'";


        $result = mysqli_query($conn, $countQuery);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $totalBookings = $row['totalBookings'];
            $totalIncome = $row['totalIncome'];
        } else {
            // Handle error if query fails
            $totalBookings = 0;
        }

        $countQuery = "SELECT COUNT(*) AS totalBookings, SUM(total_price) AS totalIncome FROM transaction_history 
               WHERE YEAR(date) = '$currentYear'";

        $result = mysqli_query($conn, $countQuery);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $totalYearlyBookings = $row['totalBookings'];
            $totalYearlyIncome = $row['totalIncome'];
        } else {
            // Handle error if query fails
            $totalYearlyBookings = 0;
            $totalYearlyIncome = 0;
        }
    ?>
    
    <h4 class="mt-3 mb-3">Monthly Monitoring</h4>
    <div class="row mb-5">
        <div class="col-lg-4 col-sm-12 mb-2">
            <div class="card shadow bg-info bg-opacity-75">
                Total Bookings
                <span class="border-bottom"><strong class="fs-4"><?php echo $totalBookings; ?></strong></span>
                <button class="nav-link border-0 bg-info text-dark">See more</button>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12 mb-2">
            <div class="card shadow bg-danger bg-opacity-75">
                Total Expences
                <span class="border-bottom"><strong class="fs-4">&#8369;</strong></span>
                <button class="nav-link border-0 bg-danger text-dark">See more</button>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12 mb-2">
            <div class="card shadow bg-success bg-opacity-75">
                Total Income
                <span class="border-bottom"><strong class="fs-4">&#8369;<?php echo $totalIncome; ?></strong></span>
                <button class="nav-link border-0 bg-success text-dark">See more</button>
            </div>
        </div>
    </div>

    <h4 class="mt-3 mb-3">Yearly Monitoring</h4>
    <div class="row mb-5">
        <div class="col-lg-4 col-sm-12 mb-2">
            <div class="card shadow bg-warning bg-opacity-75">
                Total Bookings
                <span class="border-bottom"><strong class="fs-4"><?php echo $totalYearlyBookings; ?></strong></span>
                <button class="nav-link border-0 bg-warning text-dark">See more</button>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12 mb-2">
            <div class="card shadow bg-primary bg-opacity-75">
                Total Expences
                <span class="border-bottom"><strong class="fs-4">&#8369;</strong></span>
                <button class="nav-link border-0 bg-primary text-dark">See more</button>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12 mb-2">
            <div class="card shadow bg-secondary bg-opacity-75">
                Total Income
                <span class="border-bottom"><strong class="fs-4">&#8369;<?php echo $totalYearlyIncome; ?></strong></span>
                <button class="nav-link border-0 bg-secondary text-dark">See more</button>
            </div>
        </div>
    </div>
</section>