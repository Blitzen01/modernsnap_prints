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
        <title>Operator</title>

        <link rel="stylesheet" href="../../assets/style/admin_style.css">
    </head>

    <body>
        <div class="container-fluid">
            <div class="row">
                <div id="sidebar_content" class="col-lg-2">
                    <?php include '../../navigation/admin_sidebar.php'; ?>
                </div>
                <div id="admin_content" class="col py-3">
                    <h3 id="analytics" class="ps-3">Operator</h3>
                    <section class="my-2">
                        <div class="ms-3">
                            <button class="btn btn-midnight-blue" data-bs-toggle="modal" data-bs-target="#add_operator_modal"><i class="fa-solid fa-plus"></i> Add Operator</button>
                            <button class="btn btn-danger ms-3" data-bs-toggle="modal" data-bs-target="#remove_operator_modal"><i class="fa-solid fa-trash"></i> Remove Operator</button>
                        </div>

                        <div class="mx-5 my-3">
                            <table class="border table table-sm nowrap table-striped compact table-hover bg-midnight-blue">
                                <thead class="table-primary">
                                    <tr>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Contact Number</th>
                                        <th>Permission</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sql = "SELECT * FROM account";
                                        $result = mysqli_query($conn, $sql);

                                        if($result) {
                                            while($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                                <tr>
                                                    <td><?php echo $row['name']; ?></td>
                                                    <td><?php echo $row['username']; ?></td>
                                                    <td><?php echo $row['contact_number']; ?></td>
                                                    <td><?php echo $row['permission']; ?></td>
                                                </tr>
                                    <?php
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
            </div>
        </div>

        <script>
            function check_confirm_password() {
                var password = document.getElementById('password').value;
                var confirm_password = document.getElementById('confirm_password').value;
                var passwordMatchConfirmSpan = document.getElementById('password_match_confirm');
                var addOperatorButton = document.getElementById('add_operator_button');

                if(password === confirm_password) {
                    passwordMatchConfirmSpan.textContent = "Passwords match.";
                    passwordMatchConfirmSpan.style.color = "green";
                    addOperatorButton.disabled = false;
                } else {
                    passwordMatchConfirmSpan.textContent = "Passwords do not match.";
                    passwordMatchConfirmSpan.style.color = "red";
                    addOperatorButton.disabled = true;
                }
            }
        </script>
    </body>
</html>