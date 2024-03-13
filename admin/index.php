<?php
    include '../assets/fonts/fonts.php';
    include '../assets/cdn/cdn_links.php';
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
                            <input type="text" placeholder="Username" required>
                        </div>
                        <div class="row">
                            <i class="fas fa-lock"></i>
                            <input type="password" placeholder="Password" required>
                        </div>
                        <div class="pass"><a href="#">Forgot password?</a></div>
                        <div class="row button">
                            <input type="submit" value="Login">
                        </div>
                    </form>
                    
        <a href="web_content/dashboard.php" class="text-light">dashboard</a>
            </div>
        </div>
    </body>
</html>