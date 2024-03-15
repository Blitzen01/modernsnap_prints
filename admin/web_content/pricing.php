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

                    <button class="btn btn-info ms-5" data-bs-toggle="modal" data-bs-target="#"><i class="fa-solid fa-box"></i> New Package</button>
                    <button class="btn btn-danger ms-3" data-bs-toggle="modal" data-bs-target="#"><i class="fa-solid fa-trash"></i> Remove Package</button>
                    <section>
                        
                    </section>

                    <button class="btn btn-info ms-5" data-bs-toggle="modal" data-bs-target="#"><i class="fa-solid fa-square-plus"></i> New Service</button>
                    <button class="btn btn-danger ms-3" data-bs-toggle="modal" data-bs-target="#"><i class="fa-solid fa-trash"></i> Remove Service</button>
                    <section>
                        <div class="row text-center mb-5 p-4">
                            <?php
                                $sql = "SELECT * FROM services";
                                $result = mysqli_query($conn, $sql);

                                if($result) {
                                    while($row = mysqli_fetch_assoc($result)){
                            ?>
                                        <div class="col-lg-2 col-sm-11 mb-2">
                                            <div class="card shadow">
                                            <span><?php echo strtoupper($row['service']);?></span>
                                            <h5><?php echo $row['package'];?></h5>
                                            <span>&#8369; <?php echo $row['price'];?></span><br>
                                            <button class="border btn-midnight-blue">Update Price</button>
                                            </div>
                                        </div>
                            <?php
                                    }
                                }
                            ?>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </body>
</html>