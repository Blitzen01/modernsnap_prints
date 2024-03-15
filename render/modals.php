<!-- update inventory modal -->
<?php
    $sql = "SELECT * FROM inventory";
    $result = mysqli_query($conn, $sql);

    if($result) {
        while ($row = mysqli_fetch_assoc($result)) {
?>
    <div class="modal fade" id="update_item<?php echo $row['id']; ?>_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo $row['item']; ?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-center align-items-center">
                        <button class="btn btn-danger" onclick="decrease(<?php echo $row['id']; ?>)">-</button>
                        <span id="number_<?php echo $row['id']; ?>" class="mx-3"><?php echo $row['quantity']; ?></span>
                        <button class="btn btn-success" onclick="increase(<?php echo $row['id']; ?>)">+</button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="itemSaveChange(<?php echo $row['id']; ?>)">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php
        }
    }
?>
<!-- update inventory modal -->

<!-- new item in inventory modal -->
<div class="modal fade" id="invetory_new_item_modal" tabindex="-1" aria-labelledby="invetory_new_item_modal_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="invetory_new_item_modal_label">New Item</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../../assets/php_script/inventory_new_item.php" method="post">
                    <div class="mb-3">
                        <label for="item_name">Item:</label>
                        <input type="text" name="item_name" id="item_name" class="form-control" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="item_quantity">Quantity:</label>
                        <input type="number" name="item_quantity" id="item_quantity" class="form-control" autocomplete="off" required>
                    </div>
                
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- new item in inventory modal -->

<!-- remove item in inventory modal -->
<div class="modal fade" id="remove_item_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Select Item to Remove</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../../assets/php_script/inventory_remove_item.php" method="post">
                    <div class="mb-5">
                        <select id="selected_item" name="selected_item" class="form-select" aria-label="Default select example">
                            <option value="default" disabled>Open this select menu</option>
                            <?php
                                $sql = "SELECT * FROM inventory";
                                $result = mysqli_query($conn, $sql);

                                if($result){
                                    while($row = mysqli_fetch_assoc($result)){
                            ?>
                                        <option value="<?php echo $row['item']; ?>"><?php echo $row['item']; ?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Remove item</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- remove item in inventory modal -->

<!-- create booking modal -->
<?php
    $sql = "SELECT DISTINCT service FROM services";
    $result = mysqli_query($conn, $sql);

    if($result) {
        while($row = mysqli_fetch_assoc($result)) {
?>
            <div class="modal fade" id="<?php echo $row['service']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo strtoupper($row['service']); ?></h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <?php
                                $selected_service = mysqli_real_escape_string($conn, $row['service']);
                                $package = "SELECT * FROM services WHERE service = '$selected_service'";
                                $package_result = mysqli_query($conn, $package);

                                if($package_result) {
                            ?>
                                    <form action="../../assets/php_script/review_booking.php" method="post">
                            <?php
                                        while($rows = mysqli_fetch_assoc($package_result)) {
                            ?>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="<?php echo $rows['package']; ?>" id="<?php echo $rows['service'] . $rows['id']; ?>" name="package[]">
                                                <label class="form-check-label" for="<?php echo $rows['service'] . $rows['id']; ?>">
                                                    <?php echo $rows['package'] . " &#8369;" . $rows['price']; ?>
                                                </label>
                                            </div>
                                            
                            <?php
                                        }
                            ?>
                                        <div class="form-group mb-3 mt-2">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" autocomplete="off" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="contact_number" class="form-label">Contact Number</label>
                                            <input type="text" class="form-control" id="contact_number" name="contact_number" autocomplete="off" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" autocomplete="off" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="event_location" class="form-label">Event Location</label>
                                            <input type="text" class="form-control" id="event_location" name="event_location" autocomplete="off" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="date">Date:</label>
                                            <input type="date" class="form-control" name="date">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="starttime">From:</label>
                                            <input type="time" class="form-control" name="starttime">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="endtime">To:</label>
                                            <input type="time" class="form-control" name="endtime">
                                        </div>
                                        
                                        <div class="modal-footer">
                                            <button id="create_booking" type="submit" class="btn btn-primary">Create Booking</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
<?php
        }
    }
?>
<!-- create booking modal -->

<!-- customize booking modal -->
<?php
    $sql = "SELECT * FROM services";
    $result = mysqli_query($conn, $sql);

    if($result) {
        while($row = mysqli_fetch_assoc($result)) {
?>
            <div class="modal fade" id="customize_booking" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">CUSTOMIZE BOOKING</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <?php
                                $package_query = "SELECT * FROM services";
                                $package_result = mysqli_query($conn, $package_query);
                                
                                if($package_result && mysqli_num_rows($package_result) > 0) {
                            ?>
                                    <form action="../../assets/php_script/customize_review_booking.php" method="post">
                            <?php
                                    while($row = mysqli_fetch_assoc($package_result)) {
                            ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="<?php echo $row['package']; ?>" id="<?php echo $row['service'] . $row['id']; ?>" name="package[]">
                                            <label class="form-check-label" for="<?php echo $row['service'] . $row['id']; ?>">
                                                <?php echo strtoupper($row['service']) . ": " . $row['package'] . " &#8369;" . $row['price']; ?>
                                            </label>
                                        </div>
                            <?php
                                        }
                            ?>
                                        <div class="form-group mb-3 mt-2">
                                            <label for="customize_booking_name" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="name" name="customize_booking_name" autocomplete="off" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="customize_booking_contact_number" class="form-label">Contact Number</label>
                                            <input type="text" class="form-control" id="customize_booking_contact_number" name="customize_booking_contact_number" autocomplete="off" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="customize_booking_email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="customize_booking_email" name="customize_booking_email" autocomplete="off" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="customize_booking_event_location" class="form-label">Event Location</label>
                                            <input type="text" class="form-control" id="customize_booking_event_location" name="customize_booking_event_location" autocomplete="off" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="customize_booking_date">Date:</label>
                                            <input type="date" class="form-control" name="customize_booking_date">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="customize_booking_starttime">From:</label>
                                            <input type="time" class="form-control" name="customize_booking_starttime">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="customize_booking_endtime">To:</label>
                                            <input type="time" class="form-control" name="customize_booking_endtime">
                                        </div>
                                        
                                        <div class="modal-footer">
                                            <button id="create_booking" type="submit" class="btn btn-primary">Create Booking</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
<?php
        }
    }
?>
<!-- customize booking modal -->

<!-- finish booking modal -->
<?php
    $sql = "SELECT * FROM booking";
    $result = mysqli_query($conn, $sql);

    if($result) {
        while($row = mysqli_fetch_assoc($result)) {
            $formatted_date = date('F d, Y', strtotime($row['date']));
            $formatted_start_time = date('h:i A', strtotime($row['start_time']));
            $formatted_end_time = date('h:i A', strtotime($row['end_time']));
?>
            <div class="modal fade" id="booking_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-midnight-blue text-light">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm Finish Booking</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="../../assets/php_script/finish_booking.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                                <input type="hidden" name="contact_number" value="<?php echo $row['contact_number']; ?>">
                                <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
                                <input type="hidden" name="event_location" value="<?php echo $row['event_location']; ?>">
                                <input type="hidden" name="date" value="<?php echo $row['date']; ?>">
                                <input type="hidden" name="start_time" value="<?php echo $row['start_time']; ?>">
                                <input type="hidden" name="end_time" value="<?php echo $row['end_time']; ?>">
                                <input type="hidden" name="package" value="<?php echo $row['package']; ?>">
                                <input type="hidden" name="total_price" value="<?php echo $row['total_price']; ?>">

                                <span><strong>Name: </strong></span> <?php echo $row['name']; ?> <br>
                                <span><strong>Contact Number: </strong></span> <?php echo $row['contact_number']; ?> <br>
                                <span><strong>Email: </strong></span> <?php echo $row['email']; ?> <br>
                                <span><strong>Event Location: </strong></span> <?php echo $row['event_location']; ?> <br>
                                <span><strong>Date: </strong></span> <?php echo $row['date']; ?> <br>
                                <span><strong>Start Time: </strong></span> <?php echo $row['start_time']; ?> <br>
                                <span><strong>End Time: </strong></span> <?php echo $row['end_time']; ?> <br>
                                <span><strong>Package: </strong></span> <?php echo $row['package']; ?> <br>
                                <span><strong>Total Price: </strong></span> <?php echo $row['total_price']; ?> <br>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-midnight-blue">Finish</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
<?php
        }
    }
?>
<!-- finish booking modal -->

<!-- add operator modal -->
<div class="modal fade" id="add_operator_modal" tabindex="-1" aria-labelledby="add_operator_modal_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-midnight-blue text-light">
                <h1 class="modal-title fs-5" id="add_operator_modal_label">Operator form</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../../assets/php_script/add_operator.php" method="post">
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input class="form-control" type="text" name="name" id="name" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="username">Username</label>
                        <input class="form-control" type="text" name="username" id="username" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" name="password" id="password" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password">Confirm Password</label>
                        <input class="form-control" type="password" name="confirm_password" id="confirm_password" onkeyup="check_confirm_password()" autocomplete="off" required>
                        <span id="password_match_confirm"></span>
                    </div>
                    <div class="mb-3">
                        <label for="contact_number">Contact Number</label>
                        <input class="form-control" type="text" name="contact_number" id="contact_number" autocomplete="off" required>
                    </div>
                    <div class="modal-footer">
                        <button id="add_operator_button" type="submit" class="btn btn-primary" disabled="true">Add</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- add operator modal -->

<div class="modal fade" id="update_profile_picture_modal" tabindex="-1" aria-labelledby="update_profile_picture_modal_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="update_profile_picture_modal_label">Upload Picture</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../../assets/php_script/admin_upload_profile_picture.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input class="form-control" name="file" type="file" id="formFile">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Upload</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- remove operator -->
<div class="modal fade" id="remove_operator_modal" tabindex="-1" aria-labelledby="remove_operator_modal_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="remove_operator_modal_label">Remove Operator</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../../assets/php_script/remove_operator.php" method="post">
                    <div class="mb-3">
                        <select class="form-select" name="operator" id="operator">
                            <option value="default" disabled selected>Default</option>
                            <?php
                                $sql = "SELECT * FROM account WHERE permission = 'operator'";
                                $result = mysqli_query($conn, $sql);

                                if($result) {
                                    while($row = mysqli_fetch_assoc($result)){
                            ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Remove</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- remove operator -->

<!-- admin update profile -->
<div class="modal fade" id="update_profile_information_modal_label" tabindex="-1" aria-labelledby="update_profile_information_modal_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="update_profile_information_modal_label">Upadate Profile Information</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                    $sql = "SELECT * FROM account WHERE username = '$username'";
                    $result = mysqli_query($conn, $sql);

                    if($result) {
                        while($row = mysqli_fetch_assoc($result)) {
                ?>
                    <form action="../../assets/php_script/admin_update_profile_info.php" method="post">
                        <div class="mb-3">
                            <label for="account_name">Name</label>
                            <input class="form-control" type="text" name="account_name" id="account_name" value="<?php echo $row['name']; ?>" required autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="account_username">Username</label>
                            <input class="form-control" type="text" name="account_username" id="account_username" value="<?php echo $row['username']; ?>" required autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="account_contact_number">Contact Number</label>
                            <input class="form-control" type="text" name="account_contact_number" id="account_contact_number" value="<?php echo $row['contact_number']; ?>" required autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="account_birthday">Birthday</label>
                            <input class="form-control" type="date" name="account_birthday" id="account_birthday" value="<?php echo $row['birthday']; ?>" required autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="account_gender">Birthday</label>
                            <select class="form-select" name="account_gender" id="account_gender">
                                <option value="default" disabled <?php if ($row['gender'] == 'default') echo 'selected'; ?>>Default</option>
                                <option value="male" <?php if ($row['gender'] == 'male') echo 'selected'; ?>>Male</option>
                                <option value="female" <?php if ($row['gender'] == 'female') echo 'selected'; ?>>Female</option>
                                <option value="other" <?php if ($row['gender'] == 'other') echo 'selected'; ?>>Other</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="account_bio">Bio</label>
                            <textarea class="form-control" type="text" name="account_bio" id="account_bio" cols="30" rows="3" style="resize:none;" required autocomplete="off"><?php echo $row['bio']; ?></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                <?php
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- admin update profile -->

<!-- admin update password -->
<div class="modal fade" id="change_password_modal" tabindex="-1" aria-labelledby="change_password_modal_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="change_password_modal_label">Change Password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../../assets/php_script/admin_update_password.php" method="post">
                    <div class="mb-3">
                        <label for="account_password">Password</label>
                        <input class="form-control" type="password" name="account_password" id="account_password" onkeyup="check_account_password()">
                        <span id="check_account_password"></span>
                    </div>
                    <div class="mb-3">
                        <label for="account_new_password">New Password</label>
                        <input class="form-control" type="password" name="account_new_password" id="account_new_password" disabled="true" onkeyup="check_new_password()">
                        <span id="check_new_password"></span>
                    </div>
                    <div class="mb-3">
                        <label for="account_confirm_new_password">Confirm New Password</label>
                        <input class="form-control" type="password" name="account_confirm_new_password" id="account_confirm_new_password" disabled="true" onkeyup="check_confirm_new_password()">
                        <span id="check_confirm_new_password"></span>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="save_new_password" disabled="true">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- admin update password -->

<!-- admin update package modal -->
<?php
    $sql = "SELECT * FROM services";
    $result = mysqli_query($conn, $sql);
    if($result) {
        while($row = mysqli_fetch_assoc($result)) {

?>
    <div class="modal fade" id="update<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo strtoupper($row['service']); ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../../assets/php_script/update_package.php" method="post">
                    <div class="mb-3">
                        <input type="hidden" id="package_id" name="package_id" value="<?php echo $row['id']; ?>">
                        <label for="update_package<?php echo $row['id']; ?>"><?php echo $row['package']; ?></label>
                        <input class="form-control" type="number" name="updated_price" id="updated_price" value="<?php echo $row['price']; ?>" required autocomplete="off">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
<?php
        }
    }
?>
<!-- admin update package modal -->

<!-- add new service modal -->
<div class="modal fade" id="add_new_service" tabindex="-1" aria-labelledby="add_new_service_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="add_new_service">Add new Service</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../../assets/php_script/add_new_service.php" method="post">
                    <div class="mb-3">
                        <label for="service_name">Service Name</label>
                        <input type="text" class="form-control" id="service_name" name="service_name" required autocomplete="off" onkeyup="check_add_new_service()">
                        <span class="fs-6 text-muted"><strong>Note: </strong> Service name should be no spaces.</span>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="add_service_button" disabled="true">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- add new service modal -->

<!-- add new package modal -->
<div class="modal fade" id="add_new_package" tabindex="-1" aria-labelledby="add_new_package_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="add_new_package_label">Add new Package</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../../assets/php_script/add_new_package.php" method="post">
                    <div class="mb-3">
                        <label for="select_service">Select Service</label>
                        <select class="form-select" name="select_service" id="select_service">
                            <option value="default" selected disabled>DEFAULT</option>
                            <?php
                                $sql = "SELECT *  FROM service_list";
                                $result = mysqli_query($conn, $sql);
                                if($result) {
                                    while($row = mysqli_fetch_assoc($result)) {      
                            ?>
                                        <option value="<?php echo $row['services']; ?>"><?php echo strtoupper($row['services']); ?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="package_name">Package Name</label>
                        <input class="form-control" type="text" id="package_name" name="package_name" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="package_price">Package Price</label>
                        <input class="form-control" type="number" id="package_price" name="package_price" required autocomplete="off">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- add new package modal -->

<!-- remove package modal -->
<div class="modal fade" id="remove_package" tabindex="-1" aria-labelledby="remove_package_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="remove_package">Remove Package</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../../assets/php_script/remove_package.php" method="post">
                    <div class="mb-3">
                        <select class="form-select" name="remove_package" id="remove_package">
                            <option value="default" selected disabled>Default</option>
                            <?php
                                $sql = "SELECT *  FROM services";
                                $result = mysqli_query($conn, $sql);
                                if($result) {
                                    while($row = mysqli_fetch_assoc($result)) {      
                            ?>
                                        <option value="<?php echo $row['package']; ?>"><?php echo strtoupper($row['package']); ?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Remove</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- remove package modal -->

<!-- remove service modal -->
<div class="modal fade" id="remove_service" tabindex="-1" aria-labelledby="remove_service_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="remove_service">Remove Service</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../../assets/php_script/remove_service.php" method="post">
                    <div class="mb-3">
                        <select class="form-select" name="service" id="service">
                            <option value="default" selected disabled>Default</option>
                            <?php
                                $sql = "SELECT *  FROM service_list";
                                $result = mysqli_query($conn, $sql);
                                if($result) {
                                    while($row = mysqli_fetch_assoc($result)) {      
                            ?>
                                        <option value="<?php echo $row['services']; ?>"><?php echo strtoupper($row['services']); ?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Remove</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- remove service modal -->

<!-- upload photos to gallery modal -->
<div class="modal fade" id="upload_photo_to_gallery_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Select File to upload</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../../assets/php_script/upload_to_gallery.php" method="post" id="uploadForm" enctype="multipart/form-data">
                    <div class="mb-3">
                        <select class="form-select" name="upload_select_service" id="upload_select_service">
                            <option value="defaut" disabled selected>DEFAULT</option>
                            <?php
                                $sql = "SELECT services FROM service_list";
                                $result = mysqli_query($conn, $sql);

                                if($result) {
                                    while($row = mysqli_fetch_assoc($result)) {
                            ?>
                                        <option value="<?php echo $row['services']; ?>"><?php echo strtoupper($row['services']); ?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <input class="form-control" type="file" name="images[]" accept="image/*" multiple>
                    <div class="modal-footer">
                        <button id="upload_image_to_gallery_form_button" type="submit" class="btn btn-primary" disabled="true">Upload</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                    <div id="errorMessage" class="hidden">Maximum 5 images allowed</div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- upload photos to gallery modal -->


<div class="modal fade" id="remove_photo_modal" tabindex="-1" aria-labelledby="remove_photo_modal_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="remove_photo_modal_label">Remove Photo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <form action="../../assets/php_script/remove_photo.php" method="post">
                    <img id="modal-image" src="" class="img-fluid" style="width:50%;">
                    <p type="text" id="modal-file-name" name="file_name"></p>
                    <input type="hidden" name="file_name" id="modal-file-name-input">
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Remove</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>