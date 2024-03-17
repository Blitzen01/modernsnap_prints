<?php
// Include your database connection file
include '../../render/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ensure that the required fields are present in the POST data
    if (isset($_POST['item_name']) && isset($_POST['item_quantity'])) {
        // Sanitize and validate the input data
        $itemName = mysqli_real_escape_string($conn, $_POST['item_name']);
        $itemQuantity = intval($_POST['item_quantity']); // Assuming item_quantity is an integer
        $itemUnit = $_POST['item_unit'];

        // Insert the new item into the database
        $sql = "INSERT INTO inventory (item, unit, quantity) VALUES ('$itemName', '$itemUnit', '$itemQuantity')";
        $result = mysqli_query($conn, $sql);

        // Check if the query was successful
        if ($result) {
            $redirectUrl = "../../admin/web_content/inventory.php";
            // Redirect back to the previous window using window.location
            echo '<script type="text/javascript">';
            echo 'window.location.href = "' . $redirectUrl . '";';
            echo '</script>';
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Missing required fields.";
    }
}
?>
