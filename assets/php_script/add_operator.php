<?php
include '../../render/connection.php';
include '../cdn/cdn_links.php';
include '../fonts/fonts.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password
    $contact_number = $_POST['contact_number'];
    $permission = "operator";

    // Your SQL query to insert the data into the table
    $sql = "INSERT INTO account (name, username, password, contact_number, permission) VALUES (?, ?, ?, ?, ?)";

    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("sssss", $name, $username, $hashed_password, $contact_number, $permission);

    // Execute the statement
    if ($stmt->execute()) {
        $redirectUrl = "../../admin/web_content/operator.php";
        // Redirect back to the previous window using window.location
        echo '<script type="text/javascript">';
        echo 'window.location.href = "' . $redirectUrl . '";';
        echo '</script>';
    } else {
        // Error occurred
        echo "Error: " . $conn->error;
    }

    // Close statement
    $stmt->close();
}

?>
