<?php
    include '../../assets/fonts/fonts.php';
    include '../../assets/cdn/cdn_links.php';
    include '../../render/connection.php';
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
                        <p>login and logout</p>
                        <span>database</span><br>
                        <span>user session</span><br>
                        <span>forget password</span>
                        <hr>
                        <p>Dashboard Responsiveness</p>
                        <span>buttons and displays</span><br>
                        <span>total expences display</span>
                        <hr>
                        <p>expences page</p>
                        <span>layout and display</span>
                        <hr>
                        <p>Pricing page</p>
                        <span>new service button</span><br>
                        <span>remove service button</span><br>
                        <span>update price button</span>
                        <hr>
                    </section>
                </div>
            </div>
        </div>
    </body>
</html>