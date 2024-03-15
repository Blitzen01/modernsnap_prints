<?php
    include '../../assets/fonts/fonts.php';
    include '../../assets/cdn/cdn_links.php';
    include '../../render/connection.php';

    session_start();

    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Account Settings</title>

        <link rel="stylesheet" href="../../assets/style/admin_style.css">
        <style>
            
        </style>
    </head>

    <body>
        <div class="container-fluid">
            <div class="row">
                <div id="sidebar_content" class="col-lg-2">
                    <?php include '../../navigation/admin_sidebar.php'; ?>
                </div>
                <div id="admin_content" class="col py-3">
                    <h3 id="analytics" class="ps-3">Account Settings</h3>
                    <?php include '../page_content/account_settings_display.php'; ?>
                </div>
            </div>
        </div>

        <script>
            var passwordToCheckAgainst = "<?php echo $password; ?>";

            function check_account_password() {
                var account_password = document.getElementById('account_password').value;
                var check_account_password = document.getElementById('check_account_password');
                var account_new_password = document.getElementById('account_new_password');

                if(account_password === passwordToCheckAgainst) {
                    check_account_password.innerText = "Password match!";
                    check_account_password.style.color = "green";
                    account_new_password.disabled = false;
                } else {
                    check_account_password.innerText = "Password didn't match!";
                    check_account_password.style.color = "red";
                }
            }
            function check_new_password() {
                var account_new_password = document.getElementById('account_new_password').value;
                var check_new_password = document.getElementById('check_new_password');
                var account_confirm_new_password = document.getElementById('account_confirm_new_password');

                if(account_new_password.length <= 7) {
                    check_new_password.innerText = "Password too short";
                    check_new_password.style.color = "red";
                    account_confirm_new_password.disabled = false;
                } else {
                    check_new_password.innerText = "";
                    check_new_password.style.color = "red";
                }
            }
            function check_confirm_new_password() {
                var account_new_password = document.getElementById('account_new_password').value;
                var account_confirm_new_password = document.getElementById('account_confirm_new_password').value;
                var check_confirm_new_password = document.getElementById('check_confirm_new_password');
                var save_new_password = document.getElementById('save_new_password');

                if(account_new_password === account_confirm_new_password) {
                    save_new_password.disabled = false;
                    check_confirm_new_password.innerText = "Confirm password match!";
                    check_confirm_new_password.style.color = "green";
                } else {
                    check_confirm_new_password.innerText = "Confirm password didn't match!";
                    check_confirm_new_password.style.color = "red";
                }
            }
        </script>
    </body>
</html>