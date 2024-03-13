<?php
    include '../../render/connection.php';
    include '../cdn/cdn_links.php';
    include '../fonts/fonts.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve and sanitize form data
        $name = $_POST['name'];
        $contact_number = $_POST['contact_number'];
        $email = $_POST['email'];
        $event_location = $_POST['event_location'];
        $date = $_POST['date'];

        $starttime = $_POST['starttime'];
        
        $endtime = $_POST['endtime'];

        $total_price = $_POST['total_price'];
        $package = $_POST['package'];

        // Insert booking data into the database
        $insert_query = "INSERT INTO booking (name, contact_number, email, event_location, date, start_time, end_time, package, total_price) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $insert_stmt = $pdo->prepare($insert_query);
        $insert_stmt->execute([$name, $contact_number, $email, $event_location, $date, $starttime, $endtime, $package, $total_price]);
    }

    $redirectUrl = "../../admin/web_content/booking.php";
    // Redirect back to the previous window using window.location
    echo '<script type="text/javascript">';
    echo 'window.location.href = "' . $redirectUrl . '";';
    echo '</script>';
?>
