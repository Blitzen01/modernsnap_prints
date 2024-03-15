<div class="container mb-2">
    <div class="row text-center border px-5 py-2 shadow">
        <h4>Create Booking</h4>
        <?php
            $sql = "SELECT services FROM service_list";
            $result = mysqli_query($conn, $sql);
            
            if($result) {
                while($row = mysqli_fetch_assoc($result)) {
        ?>
                    <div class="col-lg-3 col-sm-11 p-2">
                        <button class="btn btn-midnight-blue" data-bs-toggle="modal" data-bs-target="#<?php echo $row['services']; ?>">
                            <?php echo strtoupper($row['services']); ?>
                        </button>
                    </div>
        <?php
                }
            }
        ?>
        <div class="col-lg-3 col-sm-11 p-2"><button class="btn btn-midnight-blue" data-bs-toggle="modal" data-bs-target="#customize_booking">CUSTOMIZE BOOKING</button></div>
    </div>
</div>