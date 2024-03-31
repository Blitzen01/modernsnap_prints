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

        $yearlyIncomeData = array();

        for ($month = 1; $month <= 12; $month++) {
            $monthlyIncomeQuery = "SELECT SUM(total_price) AS monthlyIncome FROM transaction_history WHERE MONTH(date) = '$month' AND YEAR(date) = '$currentYear'";
            $result = mysqli_query($conn, $monthlyIncomeQuery);

            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $monthlyIncome = $row['monthlyIncome'];
                // Store the monthly income in the array with the month name as the key
                $yearlyIncomeData[date("F", mktime(0, 0, 0, $month, 1))] = $monthlyIncome;
            }
        }

        $months = array_keys($yearlyIncomeData);
        $incomes = array_values($yearlyIncomeData);

        $yearlyExpensesData = array();

        for ($month = 1; $month <= 12; $month++) {
            $monthlyExpensesQuery = "SELECT SUM(total) AS monthlyExpenses FROM expenses WHERE MONTH(date_purchase) = '$month' AND YEAR(date_purchase) = '$currentYear'";
            $result = mysqli_query($conn, $monthlyExpensesQuery);

            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $monthlyExpenses = $row['monthlyExpenses'];
                // Store the monthly expenses in the array with the month name as the key
                $yearlyExpensesData[date("F", mktime(0, 0, 0, $month, 1))] = $monthlyExpenses;
            }
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

    <div class="row mb-5">
        <div class="col text-center">
            <canvas id="yearlyCombinedChart"></canvas>
        </div>
    </div>

    <div class="mb-5 card shadow">
        <h4>SUMMARY OF SATISFACTION RATING</h4>
        <table class="table table-sm text-center table-striped compact table-hover">
            <thead class="table-primary">
                <tr>
                    <th>Feedback Type</th>
                    <th>Average Rating</th>
                    <th>Descriptive Rating</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT feedback_type, AVG(star_rating) AS averageRating, 
                            CASE 
                                WHEN AVG(star_rating) >= 4.5 THEN 'Excellent'
                                WHEN AVG(star_rating) >= 3.5 THEN 'Good'
                                WHEN AVG(star_rating) >= 2.5 THEN 'Average'
                                WHEN AVG(star_rating) >= 1.5 THEN 'Poor'
                                ELSE 'Neutral' 
                            END AS descriptiveRating
                            FROM ratings 
                            GROUP BY feedback_type";
                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <tr>
                                <td><?php echo $row['feedback_type']; ?></td>
                                <td><?php echo number_format($row['averageRating'], 1); ?></td>
                                <td><?php echo $row['descriptiveRating']; ?></td>
                            </tr>
                    <?php
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>

    <div class="mb-5">
        <table id="satisfaction_rating" class="table table-sm table-striped compact table-hover">
            <thead class="table-primary">
                <tr>
                    <th>Feedback Type</th>
                    <th>Star Rating</th>
                    <th>Descriptive Rating</th>
                    <th>Date</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
                <?php
                        $sql = "SELECT * FROM ratings";
                    $result = mysqli_query($conn, $sql);

                    if($result) {
                        while($row = mysqli_fetch_assoc($result)) {
                ?>
                            <tr>
                                <td><?php echo $row['feedback_type']; ?></td>
                                <td><?php echo $row['star_rating']; ?></td>
                                <td><?php echo $row['feedback_message']; ?></td>
                                <td><?php echo $row['date']; ?></td>
                                <td><?php echo $row['time']; ?></td>
                            </tr>
                <?php
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</section>

<script>
    // Retrieve yearly bookings and expenses data from PHP and parse it into JavaScript arrays
    var yearlyExpensesData = <?php echo json_encode($yearlyExpensesData); ?>;
    var yearlyIncomeData = <?php echo json_encode($yearlyIncomeData); ?>;

    // Extract labels (months) and data values from the arrays
    var months = Object.keys(yearlyIncomeData);
    var incomes = Object.values(yearlyIncomeData);
    var expenses = Object.values(yearlyExpensesData);

    // Create a new Chart.js instance for the combined data
    var ctx = document.getElementById('yearlyCombinedChart').getContext('2d');
    var yearlyCombinedChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: months,
            datasets: [{
                label: 'Income',
                data: incomes,
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }, {
                label: 'Expenses',
                data: expenses,
                backgroundColor: 'rgba(255, 206, 86, 0.5)',
                borderColor: 'rgba(255, 206, 86, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    bgeingAtZero: true
                }
            }
        }
    });
</script>