<?php
    include '../../render/connection.php';

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve selected package name
        $package_name = $_POST['remove_package'];

        // Execute SQL DELETE query to remove the package
        $sql = "DELETE FROM services WHERE package = '$package_name'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $redirectUrl = "../../admin/web_content/pricing.php";
            // Redirect back to the previous window using window.location
            echo '<script type="text/javascript">';
            echo 'window.location.href = "' . $redirectUrl . '";';
            echo '</script>';
        } else {
            // Error message
            echo "Error removing package: " . mysqli_error($conn);
        }

        // Close database connection
        mysqli_close($conn);
    }
?>
