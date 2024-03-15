<?php
    include '../../render/connection.php';

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $service_name = $_POST['select_service'];
        $package_name = $_POST['package_name'];
        $package_price = $_POST['package_price'];

        // Insert data into services table
        $sql = "INSERT INTO services (service, package, price) VALUES ('$service_name', '$package_name', '$package_price')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $redirectUrl = "../../admin/web_content/pricing.php";
            // Redirect back to the previous window using window.location
            echo '<script type="text/javascript">';
            echo 'window.location.href = "' . $redirectUrl . '";';
            echo '</script>';
        } else {
            // Error message
            echo "Error adding package: " . mysqli_error($conn);
        }

        // Close database connection
        mysqli_close($conn);
    }
?>
