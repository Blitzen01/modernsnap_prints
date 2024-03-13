<?php
// Include your database connection file
include '../../render/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ensure that the required fields are present in the POST data
    if (isset($_POST['id']) && isset($_POST['quantity'])) {
        // Sanitize and validate the input data
        $itemId = mysqli_real_escape_string($conn, $_POST['id']);
        $quantity = intval($_POST['quantity']); // Assuming quantity is an integer

        // Prepare and execute the SQL query using prepared statements
        $sql = "UPDATE inventory SET quantity = ? WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ii", $quantity, $itemId);
        $success = mysqli_stmt_execute($stmt);

        // Check for errors and provide feedback
        if ($success) {
            $redirectUrl = "../../admin/web_content/inventory.php";
            // Redirect back to the previous window using window.location
            echo '<script type="text/javascript">';
            echo 'window.location.href = "' . $redirectUrl . '";';
            echo '</script>';
        } else {
            echo "Error updating quantity: " . mysqli_error($conn);
        }

        // Close the prepared statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Missing required fields.";
    }
} else {
    echo "Invalid request method.";
}

// Close the database connection
mysqli_close($conn);
?>
