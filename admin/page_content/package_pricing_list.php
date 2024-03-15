<button class="btn btn-info ms-5" data-bs-toggle="modal" data-bs-target="#add_new_package"><i class="fa-solid fa-box"></i> New Package</button>
<button class="btn btn-danger ms-3" data-bs-toggle="modal" data-bs-target="#remove_package"><i class="fa-solid fa-trash"></i> Remove Package</button>
<section>
    <div class="row text-center mb-5 p-4">
        <?php
            $sql = "SELECT * FROM services";
            $result = mysqli_query($conn, $sql);

            if($result) {
                while($row = mysqli_fetch_assoc($result)){
        ?>
                    <div class="col-lg-2 col-sm-11 mb-2">
                        <div class="card shadow">
                        <span><?php echo strtoupper($row['service']);?></span>
                        <h5><?php echo $row['package'];?></h5>
                        <span>&#8369; <?php echo $row['price'];?></span><br>
                        <button class="border btn-midnight-blue" data-bs-toggle="modal" data-bs-target="#update<?php echo $row['id']; ?>">Update Price</button>
                        </div>
                    </div>
        <?php
                }
            }
        ?>
    </div>
</section>