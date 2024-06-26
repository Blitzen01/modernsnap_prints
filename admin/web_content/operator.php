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
                    <h3 id="analytics" class="ps-3"><i class="fa-regular fa-id-badge"></i> Operator</h3>
                    <?php include '../page_content/operator_list.php'; ?>
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