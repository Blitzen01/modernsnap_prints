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
                        <input type="text" name="item_name" class="form-control" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="item_quantity">Quantity:</label>
                        <input type="number" name="item_quantity" class="form-control" autocomplete="off" required>
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
                                            <label for="datepicker">Date:</label>
                                            <input type="date" class="form-control" name="date">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="starttimepicker">From:</label>
                                            <input type="time" class="form-control" name="starttime">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="endtimepicker">To:</label>
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
                                    while($row = mysqli_fetch_assoc($package_result)) {
                                        ?>
                                    <form action="../../assets/php_script/review_booking.php" method="post">
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
                                            <label for="datepicker">Date:</label>
                                            <input type="date" class="form-control" name="date">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="starttimepicker">From:</label>
                                            <input type="time" class="form-control" name="starttime">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="endtimepicker">To:</label>
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