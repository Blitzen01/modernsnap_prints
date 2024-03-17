<?php
    include '../../render/connection.php';

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if select_operator is set and not empty
        if (isset($_POST["select_operator"]) && !empty($_POST["select_operator"])) {
            // Get the selected operator from the form
            $selected_operator = $_POST["select_operator"];
            if(!empty($_POST["select_second_operator"])) {
                $select_second_operator = $_POST["select_second_operator"];

                $operator = $selected_operator . ', ' . $select_second_operator;
            } else {
                $operator = $selected_operator;
            }

            $booking_id = $_POST["booking_id"];

            // Update the booking record in the database with the selected operator
            $update_sql = "UPDATE booking SET operator = ? WHERE id = ?";
            $stmt = mysqli_prepare($conn, $update_sql);
            mysqli_stmt_bind_param($stmt, "si", $operator, $booking_id);
            
            if (mysqli_stmt_execute($stmt)) {
                $redirectUrl = "../../admin/web_content/booking.php";
                // Redirect back to the previous window using window.location
                echo '<script type="text/javascript">';
                echo 'window.location.href = "' . $redirectUrl . '";';
                echo '</script>';
            } else {
                // Error updating booking
                echo "Error updating booking: " . mysqli_error($conn);
            }
            
            // Close statement
            mysqli_stmt_close($stmt);
        } else {
            // If select_operator is not set or empty
            echo "Please select an operator.";
        }
    } else {
        // If form is not submitted
        echo "Form not submitted.";
    }
?>
