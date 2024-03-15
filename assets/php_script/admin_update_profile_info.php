<?php
    include '../../render/connection.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get form data
        $name = $_POST['account_name'];
        $username = $_POST['account_username'];
        $contact_number = $_POST['account_contact_number'];
        $birthday = $_POST['account_birthday'];
        $gender = $_POST['account_gender'];
        $bio = $_POST['account_bio'];
        
        // Update query
        $sql = "UPDATE account 
                SET name = '$name', 
                    contact_number = '$contact_number', 
                    birthday = '$birthday', 
                    gender = '$gender', 
                    bio = '$bio' 
                WHERE username = '$username'";

        // Execute query
        if (mysqli_query($conn, $sql)) {
            $redirectUrl = "../../admin/web_content/account_settings.php";
            // Redirect back to the previous window using window.location
            echo '<script type="text/javascript">';
            echo 'window.location.href = "' . $redirectUrl . '";';
            echo '</script>';
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }
?>
