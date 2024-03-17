<?php
    include '../../render/connection.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Extract expense ID from the AJAX request
        $expense_id = $_POST['id'];
        $item_name = $_POST['item_name'];
        $quantity = $_POST['quantity'];

        // Update the database to mark the expense as paid
        $update_query = "UPDATE expenses SET remarks = 'paid' WHERE id = $expense_id";
        if (mysqli_query($conn, $update_query)) {
            // Retrieve the current quantity of the item from the inventory table
            $select_query = "SELECT quantity FROM inventory WHERE item = '$item_name'";
            $result = mysqli_query($conn, $select_query);
            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $current_quantity = $row['quantity'];

                // Calculate the new quantity by adding the current quantity to the received quantity
                $new_quantity = $current_quantity + $quantity;

                // Update the inventory table with the new quantity
                $update_inventory_query = "UPDATE inventory SET quantity = $new_quantity WHERE item = '$item_name'";
                if (mysqli_query($conn, $update_inventory_query)) {
                    // Redirect to the desired page
                    $redirectUrl = "../../admin/web_content/expenses.php";
                    echo '<script type="text/javascript">';
                    echo 'window.location.href = "' . $redirectUrl . '";';
                    echo '</script>';
                } else {
                    echo 'Error updating inventory: ' . mysqli_error($conn);
                }
            } else {
                echo 'Error retrieving current quantity: ' . mysqli_error($conn);
            }
        } else {
            echo 'Error updating expense status: ' . mysqli_error($conn);
        }
    }
?>
