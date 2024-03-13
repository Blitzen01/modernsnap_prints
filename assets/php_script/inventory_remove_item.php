<?php
include '../../render/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['selected_item'])) {
        $selectedItem = mysqli_real_escape_string($conn, $_POST['selected_item']);

        if ($selectedItem == "default") {
            echo "<span class='text-danger'>Please select a valid item to remove.</span>";
        } else {
            $sql = "DELETE FROM inventory WHERE item = '$selectedItem'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $redirectUrl = "../../admin/web_content/inventory.php";
                // Redirect back to the previous window using window.location
                echo '<script type="text/javascript">';
                echo 'window.location.href = "' . $redirectUrl . '";';
                echo '</script>';
            } else {
                // Handle the case where deletion fails
                echo "<span class='text-danger'>Error: Unable to remove the item.</span>";
                // Log the error for debugging purposes
                error_log("Error deleting item: " . mysqli_error($conn));
            }
        }
    } else {
        echo "<span class='text-danger'>No item selected.</span>";
    }
}
?>
