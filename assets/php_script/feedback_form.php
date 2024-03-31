<?php
    include '../../render/connection.php';

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Retrieve form data
        $feedbackType = $_POST['feedbackType'];
        $feedback_message = $_POST['feedback_message'];
        $starRating = $_POST['starRating'];

        // Sanitize form data to prevent SQL injection
        $feedbackType = mysqli_real_escape_string($conn, $feedbackType);
        $feedback_message = mysqli_real_escape_string($conn, $feedback_message);

        date_default_timezone_set('Asia/Manila');
        // Get current date and time
        $currentDate = date("Y-m-d"); // Format: YYYY-MM-DD
        $currentTime = date("G:i:s"); // Format: HH:MM:SS

        // Insert data into the database
        $sql = "INSERT INTO ratings (feedback_type, feedback_message, star_rating, date, time) 
                VALUES ('$feedbackType', '$feedback_message', '$starRating', '$currentDate', '$currentTime')";
    
        if ($conn->query($sql) === TRUE) {
            $redirectUrl = "../../user/index.php";
            // Redirect back to the previous window using window.location
            echo '<script type="text/javascript">';
            echo 'window.location.href = "' . $redirectUrl . '";';
            echo '</script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the database connection
        $conn->close();
    }
?>
