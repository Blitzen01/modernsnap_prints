<?php
    include '../../render/connection.php';

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $to_do_list_id = $_POST['to_do_list_id'];

        // SQL query to delete the task based on its ID
        $sql = "DELETE FROM to_do_list WHERE id = $to_do_list_id";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            $redirectUrl = "../../admin/web_content/need_to_do.php";
            // Redirect back to the previous window using window.location
            echo '<script type="text/javascript">';
            echo 'window.location.href = "' . $redirectUrl . '";';
            echo '</script>';
        } else {
            echo "Error deleting task: " . mysqli_error($conn);
        }

        // Close database connection
        mysqli_close($conn);
    }
?>
