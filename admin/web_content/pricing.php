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
        <title>Pricing</title>

        <link rel="stylesheet" href="../../assets/style/admin_style.css">
    </head>

    <body>
        <div class="container-fluid">
            <div class="row">
                <div id="sidebar_content" class="col-lg-2">
                    <?php include '../../navigation/admin_sidebar.php'; ?>
                </div>
                <div id="admin_content" class="col py-3">
                    <h3 class="ps-3">Pricing</h3>
                    <?php include '../page_content/service_list.php'; ?>
                    <?php include '../page_content/package_pricing_list.php'; ?>
                </div>
            </div>
        </div>
        
        <script>
            function check_add_new_service() {
                var service_name = document.getElementById('service_name').value;
                var add_service_button = document.getElementById('add_service_button');

                if (service_name.includes(' ')) {
                    add_service_button.disabled = true;
                } else {
                    add_service_button.disabled = false;
                }
            }
        </script>
    </body>
</html>