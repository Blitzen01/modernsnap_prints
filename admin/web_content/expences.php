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
        <title>Expenses</title>

        <link rel="stylesheet" href="../../assets/style/admin_style.css">
    </head>

    <body>
        <div class="container-fluid">
            <div class="row">
                <div id="sidebar_content" class="col-lg-2">
                    <?php include '../../navigation/admin_sidebar.php'; ?>
                </div>
                <div id="admin_content" class="col py-3">
                    <h3 id="analytics" class="ps-3">Expenses</h3>
                    <section class="my-2">
                        <div class="mx-3">
                            <button class="btn btn-info"><i class="fa-solid fa-basket-shopping"></i> Consumable Goods</button>
                            <button class="btn btn-secondary"><i class="fa-solid fa-cart-plus"></i> Other Expenses</button>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </body>
</html>