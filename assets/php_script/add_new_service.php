<?php
    include '../../render/connection.php';

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $service_name = $_POST['service_name'];

        // Corrected SQL query
        $sql = "INSERT INTO service_list (services) VALUES ('$service_name')";
        
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $redirectUrl = "../../admin/web_content/pricing.php";
            // Redirect back to the previous window using window.location
            echo '<script type="text/javascript">';
            echo 'window.location.href = "' . $redirectUrl . '";';
            echo '</script>';
        } else {
            echo "Error updating price: " . mysqli_error($conn);
        }

        // Close database connection
        mysqli_close($conn);
    }
?>
