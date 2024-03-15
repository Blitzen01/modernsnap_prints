<?php
    include '../../assets/fonts/fonts.php';
    include '../../assets/cdn/cdn_links.php';
    include '../../render/connection.php';

    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: ../index.php"); // Redirect to the index if not logged in
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>To Do</title>

        <link rel="stylesheet" href="../../assets/style/admin_style.css">
    </head>

    <body>
        <div class="container-fluid">
            <div class="row">
                <div id="sidebar_content" class="col-lg-2">
                    <?php include '../../navigation/admin_sidebar.php'; ?>
                </div>
                <div id="admin_content" class="col py-3">
                    <h3 id="analytics" class="ps-3">To Do</h3>
                    <section class="my-2">
                        <p>Dashboard Responsiveness</p>
                        <span>buttons and displays</span><br>
                        <span>total expences display</span>
                        <hr>
                        <p>expences page</p>
                        <span>layout and display</span><br>
                        <span>cosumable goods button</span><br>
                        <span>other expences button</span>
                        <hr>
                        <p>gallery</p>
                        <span>add event photo botton</span><br>
                        <span>remove event photo button</span><br>
                        <span>display all photos</span>
                    </section>
                </div>
            </div>
        </div>
    </body>
</html>