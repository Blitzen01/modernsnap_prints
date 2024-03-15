<?php
    include '../../render/connection.php';
    session_start();

    $username = $_SESSION['username'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $password = $_POST['account_new_password'];

        // Hash the new password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $_SESSION['password'] = $password;

        // Prepare the SQL statement to update the password
        $sql = "UPDATE account SET password = '$hashed_password' WHERE username = '$username'";
        
        if (mysqli_query($conn, $sql)) {
            $redirectUrl = "../../admin/web_content/account_settings.php";
            // Redirect back to the previous window using window.location
            echo '<script type="text/javascript">';
            echo 'window.location.href = "' . $redirectUrl . '";';
            echo '</script>';
        } else {
            // Error occurred while updating password
            echo "Error: " . mysqli_error($conn);
        }
    }
?>

