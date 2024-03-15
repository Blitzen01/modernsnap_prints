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
                    <section class="my-2">
                        <?php
                            $sql = "SELECT * FROM account WHERE username = ?";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("s", $username);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            if($result){
                                while($row = $result->fetch_assoc()) {
                                    // Display only the first three characters of the password followed by asterisks
                                    $hashedPassword = $_SESSION['password'];
                                    $maskedPassword = str_repeat("*", strlen($hashedPassword));

                                    $birthday = date("F j, Y", strtotime($row['birthday']));

                        ?>
                                <div class="row">
                                    <div class="col-lg-3 col-sm-11 text-center">
                                        <div class="dropdown">
                                            <div id="square-image-container">
                                                <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <?php
                                                        if($row['picture'] != NULL) {
                                                            $profile = $row['picture'];
                                                    ?>
                                                            <img class="rounded-circle" id="profile_picture" src="../../assets/image/profile_picture/<?php echo $profile; ?>" alt="" srcset="">
                                                    <?php
                                                        } else {
                                                    ?>
                                                            <img class="rounded-circle" id="profile_picture" src="../../assets/image/profile_picture/blank_profile_picture.png" alt="" srcset="">
                                                    <?php
                                                        }
                                                    ?>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li><a class="btn drop-item" data-bs-toggle="modal" data-bs-target="#update_profile_picture_modal">Update profile picture</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-sm-11 px-5">
                                        <div class="row border">
                                            <h4 class="bg-secondary bg-opacity-25 border-bottom">Personal Information</h4>
                                            <div class="col-lg-5 col-sm-11">
                                                <h5><strong>Name: </strong> <?php echo $row['name']; ?></h5>
                                            </div>
                                            <div class="col-lg-5 col-sm-11">
                                                <h5><strong>Username: </strong> <?php echo $row['username']; ?></h5>
                                            </div>
                                            <div class="col-lg-5 col-sm-11">
                                                <h5><strong>Password: </strong> <?php echo $maskedPassword; ?></h5>
                                                <button class="nav-link text-primary ms-3" data-bs-toggle="modal" data-bs-target="#change_password_modal"><u>change password</u></button>
                                            </div>
                                            <div class="col-lg-5 col-sm-11">
                                                <h5><strong>Contact Number: </strong> <?php echo $row['contact_number']; ?></h5>
                                            </div>
                                            <div class="col-lg-5 col-sm-11">
                                                <h5><strong>Birthday: </strong> <?php echo $birthday; ?></h5>
                                            </div>
                                            <div class="col-lg-5 col-sm-11">
                                                <h5><strong>Gender: </strong> <?php echo $row['gender']; ?></h5>
                                            </div>
                                            <hr class="mx-auto" style="width:80%;">
                                            <h5><strong>Bio: </strong> <?php echo $row['bio']; ?></h5>
                                            <button class="border btn-midnight-blue text-light" data-bs-toggle="modal" data-bs-target="#update_profile_information_modal_label">Update Profile</button>
                                        </div>
                                    </div>
                                </div>
                        <?php
                                }
                            }
                        ?>
                    </section>
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