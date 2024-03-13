<?php
    include '../../render/connection.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Process form submission

        // Extract data from the POST request
        $name = $_POST['name'];
        $contact_number = $_POST['contact_number'];
        $email = $_POST['email'];
        $event_location = $_POST['event_location'];
        $date = $_POST['date'];
        $start_time = $_POST['start_time'];
        $end_time = $_POST['end_time'];
        $package = $_POST['package'];
        $total_price = $_POST['total_price'];

        // Insert data into transaction_history table
        $insert_query = "INSERT INTO transaction_history (name, contact_number, email, event_location, date, start_time, end_time, package, total_price)
                        VALUES ('$name', '$contact_number', '$email', '$event_location', '$date', '$start_time', '$end_time', '$package', '$total_price')";

        if (mysqli_query($conn, $insert_query)) {
            // If insertion into transaction_history is successful, remove the entry from the booking table
            $id = $_POST['id']; // Assuming there's a hidden input for booking ID
            $delete_query = "DELETE FROM booking WHERE id = '$id'";
            mysqli_query($conn, $delete_query);

            $redirectUrl = "../../admin/web_content/booking.php";
            // Redirect back to the previous window using window.location
            echo '<script type="text/javascript">';
            echo 'window.location.href = "' . $redirectUrl . '";';
            echo '</script>';
        } else {
            // Provide feedback if there's an error
            echo "<script>alert('Error: Unable to finish booking. Please try again later.');</script>";
        }
    }
?>
