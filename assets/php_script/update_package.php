<?php
    include '../../render/connection.php';

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Retrieve the package ID and updated price from the form
        $package_id = $_POST['package_id'];
        $updated_price = $_POST['updated_price'];

        // Prepare and execute the SQL UPDATE query
        $sql = "UPDATE services SET price = '$updated_price' WHERE id = $package_id";
        $result = mysqli_query($conn, $sql);

        // Check if the query was successful
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
