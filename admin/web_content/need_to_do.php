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
                    <h3 id="analytics" class="ps-3"><i class="fa-solid fa-list-check"></i> To Do</h3>
                    <section class="my-2">
                        <button class="btn btn-midnight-blue ms-3" data-bs-toggle="modal" data-bs-target="#new_todo_list_modal"><i class="fa-solid fa-plus"></i> New List</button>
                        <div class="container">
                            <div class="m-3">
                                <?php
                                    $sql = "SELECT * FROM to_do_list";
                                    $result = mysqli_query($conn, $sql);

                                    if($result) {
                                        while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                            <div class="mb-3">
                                                <button class="border btn-midnight-blue me-2" data-bs-toggle="modal" data-bs-target="#done_todo_<?php echo $row['id']; ?>">Done</button>
                                                <span><?php echo strtoupper($row['list']); ?></span>
                                            </div>
                                <?php       
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </body>
</html>