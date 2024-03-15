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
        <title>Dashboard</title>

        <link rel="stylesheet" href="../../assets/style/admin_style.css">
    </head>

    <body>
        <div class="container-fluid">
            <div class="row">
                <div id="sidebar_content" class="col-lg-2">
                    <?php include '../../navigation/admin_sidebar.php'; ?>
                </div>
                <div id="admin_content" class="col py-3">
                    <h3 id="analytics" class="ps-3">Analytics</h3>
                    <?php include '../page_content/dashboard_analytics.php'; ?>

                    <h3 id="collection" class="ps-3">Collection</h3>
                    <a href="inventory.php" class="btn p-2 border ms-5 my-2"><i class="fa-solid fa-pen-clip"></i> Update collections</a>
                    <?php include '../page_content/dashboard_collection.php'; ?>
                </div>
            </div>
        </div>
    </body>
</html>