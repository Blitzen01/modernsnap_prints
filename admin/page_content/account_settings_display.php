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
                    <div class="row shadow">
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