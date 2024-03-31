<?php
    include '../../render/connection.php';

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $to_do_list = $_POST['new_todo_list'];

        // Corrected SQL query
        $sql = "INSERT INTO to_do_list (list) VALUES ('$to_do_list')";
        
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $redirectUrl = "../../admin/web_content/need_to_do.php";
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
