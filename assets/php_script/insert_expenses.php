<?php
    // Include your database connection file
    include '../../render/connection.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Extract data from the POST request
        $item_name = $_POST['item_name'];
        $unit = $_POST['unit'];
        $unit_price = $_POST['unit_price'];
        $quantity = $_POST['quantity'];
        $date_purchase = $_POST['date_purchase'];
        $remarks = $_POST['remarks'];

        $total = $unit_price * $quantity;
        // Insert data into expenses table
        $insert_expenses = "INSERT INTO expenses (expenses_as, item_name, unit, unit_price, quantity, total, date_purchase, remarks)
                            VALUES ('consumable_goods', '$item_name', '$unit', '$unit_price', '$quantity', '$total', '$date_purchase', '$remarks')";
        if (mysqli_query($conn, $insert_expenses)) {
            // Check if remarks are "paid" before updating the inventory
            if ($remarks == "paid") {
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
                        $redirectUrl = "../../admin/web_content/expenses.php";
                        // Redirect back to the previous window using window.location
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
                // Redirect to expenses page if remarks are not "paid"
                $redirectUrl = "../../admin/web_content/expenses.php";
                echo '<script type="text/javascript">';
                echo 'window.location.href = "' . $redirectUrl . '";';
                echo '</script>';
            }
        } else {
            // Error handling
            echo "<script>alert('Error: Unable to add expense item. Please try again later.');</script>";
        }
    }
?>
