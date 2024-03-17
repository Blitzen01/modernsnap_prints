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

        // Monthly expenses query
        $monthlyExpensesQuery = "SELECT SUM(total) AS totalMonthlyExpenses FROM expenses WHERE MONTH(date_purchase) = '$currentMonth' AND YEAR(date_purchase) = '$currentYear'";
        $result = mysqli_query($conn, $monthlyExpensesQuery);
        $totalMonthlyExpenses = 0;

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $totalMonthlyExpenses = $row['totalMonthlyExpenses'];
        }

        // Yearly expenses query
        $yearlyExpensesQuery = "SELECT SUM(total) AS totalYearlyExpenses FROM expenses WHERE YEAR(date_purchase) = '$currentYear'";
        $result = mysqli_query($conn, $yearlyExpensesQuery);
        $totalYearlyExpenses = 0;

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $totalYearlyExpenses = $row['totalYearlyExpenses'];
        }
    ?>
    
    <h4 class="mt-3 mb-3">Monthly Monitoring</h4>
    <div class="row mb-5">
        <div class="col-lg-4 col-sm-12 mb-2">
            <div class="card shadow bg-info bg-opacity-75">
                <span class="bg-info">Total Bookings</span>
                <span class="border-top"><strong class="fs-4"><?php echo $totalBookings; ?></strong></span>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12 mb-2">
            <div class="card shadow bg-danger bg-opacity-75">
                <span class="bg-danger">Total Expenses</span>
                <span class="border-top"><strong class="fs-4">&#8369;<?php echo number_format($totalMonthlyExpenses); ?></strong></span>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12 mb-2">
            <div class="card shadow bg-success bg-opacity-75">
                <span class="bg-success">Total Income</span>
                <span class="border-top"><strong class="fs-4">&#8369;<?php echo number_format($totalIncome); ?></strong></span>
            </div>
        </div>
    </div>

    <h4 class="mt-3 mb-3">Yearly Monitoring</h4>
    <div class="row mb-5">
        <div class="col-lg-4 col-sm-12 mb-2">
            <div class="card shadow bg-warning bg-opacity-75">
                <span class="bg-warning">Total Bookings</span>
                <span class="border-top"><strong class="fs-4"><?php echo $totalYearlyBookings; ?></strong></span>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12 mb-2">
            <div class="card shadow bg-primary bg-opacity-75">
                <span class="bg-primary">Total Expenses</span>
                <span class="border-top"><strong class="fs-4">&#8369;<?php echo number_format($totalYearlyExpenses); ?></strong></span>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12 mb-2">
            <div class="card shadow bg-secondary bg-opacity-75">
                <span class="bg-secondary">Total Income</span>
                <span class="border-top"><strong class="fs-4">&#8369;<?php echo number_format($totalYearlyIncome); ?></strong></span>
            </div>
        </div>
    </div>
</section>