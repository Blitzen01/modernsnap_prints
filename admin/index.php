<?php
    include '../render/connection.php';
    include '../assets/fonts/fonts.php';
    include '../assets/cdn/cdn_links.php';
    
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        // Query to select user from the database
        $sql = "SELECT * FROM account WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                // Password matches, set session variables
                $_SESSION['username'] = $row['username'];
                $_SESSION['password'] = $password;
                $_SESSION['permission'] = $row['permission'];
    
                // Redirect to dashboard or any other page after successful login
                header("Location: web_content/event_calendar.php");
                exit();
            } else {
                // Invalid password
                $error = "Invalid username or password.";
            }
        } else {
            // Invalid username
            $error = "Invalid username or password.";
        }
    
        // Close statement
        $stmt->close();
    }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin: Modernsnap & Prints</title> 
        <link rel="stylesheet" href="../assets/style/admin_login_form.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    </head>
    <body>
        <div class="container">
            <div class="wrapper">
                <div class="title">
                    <img src="../assets/image/modernsnaplogo_no_bg.png" alt="" srcset="">
                </div>
                <form action="#" method="post">
                    <div class="row">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Username" name="username" autocomplete="off" required>
                    </div>
                    <div class="row">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="password" autocomplete="off" required>
                    </div>
                    <div class="row button">
                        <input type="submit" value="Login">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>