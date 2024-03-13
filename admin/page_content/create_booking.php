<div class="container mb-2">
    <div class="row text-center border px-5 py-2 shadow">
        <h4>Create Booking</h4>
        <?php
            $sql = "SELECT DISTINCT service FROM services";
            $result = mysqli_query($conn, $sql);
            
            if($result) {
                while($row = mysqli_fetch_assoc($result)) {
        ?>
                    <div class="col-lg-3 col-sm-11 p-2">
                        <button class="btn btn-midnight-blue" data-bs-toggle="modal" data-bs-target="#<?php echo $row['service']; ?>">
                            <?php echo strtoupper($row['service']); ?>
                        </button>
                    </div>
        <?php
                }
            }
        ?>
        <div class="col-lg-3 col-sm-11 p-2"><button class="btn btn-midnight-blue" data-bs-toggle="modal" data-bs-target="#customize_booking">CUSTOMIZE BOOKING</button></div>
    </div>

    <div id="photobooth_content" class="card m-2 p-2" style="display: none;">
        <h5 class="text-center">PHOTO BOOTH SERVICE</h5>
        <div class="row">
            <?php
                $sql = "SELECT * FROM services WHERE service = 'photobooth'";
                $result = mysqli_query($conn, $sql);

                if($result) {
                    while($row = mysqli_fetch_assoc($result)){
            ?>
                        <div class="col-lg-3 col-sm-11">
                            <div class="form-check">
                                <div>
                                    <input class="form-check-input" type="checkbox" value="" id="<?php echo $row['service'] . $row['id']; ?>">
                                    <label class="form-check-label" for="<?php echo $row['service'] . $row['id']; ?>">
                                        <?php echo $row['package'] . " &#8369;" . $row['price']; ?>
                                    </label>
                                </div>
                            </div>
                        </div>
            <?php
                    }
                }
            ?>
        </div>
    </div>

    <div id="photoman_content" class="card m-2 p-2" style="display: none;">
        <h5 class="text-center">PHOTO MAN SERVICE</h5>
        <div class="row">
            <?php
                $sql = "SELECT * FROM services WHERE service = 'photoman'";
                $result = mysqli_query($conn, $sql);

                if($result) {
                    while($row = mysqli_fetch_assoc($result)){
            ?>
                        <div class="col-lg-3 col-sm-11">
                            <div class="form-check">
                                <div>
                                    <input class="form-check-input" type="checkbox" value="" id="<?php echo $row['service'] . $row['id']; ?>">
                                    <label class="form-check-label" for="<?php echo $row['service'] . $row['id']; ?>">
                                        <?php echo $row['package'] . " &#8369;" . $row['price']; ?>
                                    </label>
                                </div>
                            </div>
                        </div>
            <?php
                    }
                }
            ?>
        </div>
    </div>

    <div id="photocoverage_content" class="card m-2 p-2" style="display: none;">
        <h5 class="text-center">PHOTO COVERAGE SERVICE</h5>
        <div class="row">
            <?php
                $sql = "SELECT * FROM services WHERE service = 'photocoverage'";
                $result = mysqli_query($conn, $sql);

                if($result) {
                    while($row = mysqli_fetch_assoc($result)){
            ?>
                        <div class="col-lg-3 col-sm-11">
                            <div class="form-check">
                                <div>
                                    <input class="form-check-input" type="checkbox" value="" id="<?php echo $row['service'] . $row['id']; ?>">
                                    <label class="form-check-label" for="<?php echo $row['service'] . $row['id']; ?>">
                                        <?php echo $row['package'] . " &#8369;" . $row['price']; ?>
                                    </label>
                                </div>
                            </div>
                        </div>
            <?php
                    }
                }
            ?>
        </div>
    </div>

    <div id="customize_booking_content" class="card m-2 p-2" style="display: none;">
        <h5 class="text-center">CUSTOMIZE BOOKING</h5>
        <div class="row">
            <?php
                $sql = "SELECT * FROM services";
                $result = mysqli_query($conn, $sql);

                if($result) {
                    while($row = mysqli_fetch_assoc($result)){
            ?>
                        <div class="col-lg-3 col-sm-11">
                            <div class="form-check">
                                <div>
                                    <input class="form-check-input" type="checkbox" value="" id="<?php echo $row['service'] . $row['id']; ?>">
                                    <label class="form-check-label" for="<?php echo $row['service'] . $row['id']; ?>">
                                        <?php echo strtoupper($row['service']) . ": " . $row['package'] . " &#8369;" . $row['price']; ?>
                                    </label>
                                </div>
                            </div>
                        </div>
            <?php
                    }
                }
            ?>
        </div>
    </div>
</div>