<button class="btn btn-success ms-5" data-bs-toggle="modal" data-bs-target="#invetory_new_item_modal"><i class="fa-solid fa-square-plus"></i> New Item</button>
<button class="btn btn-danger ms-3" data-bs-toggle="modal" data-bs-target="#remove_item_modal"><i class="fa-solid fa-trash"></i> Remove Item</button>
<section>
    <div class="row mb-5 p-4 text-center">
    <?php
        $sql = "SELECT * FROM inventory";
        $result = mysqli_query($conn, $sql);

        if($result) {
            while ($row = mysqli_fetch_assoc($result)) {
    ?>
                <div class="col-lg-2 col-md-6 col-sm-12 mb-2">
                    <div class="card shadow">
                        <?php echo $row['item']; ?>
                        <span><strong class="fs-4"><?php echo $row['quantity']; ?></strong> <?php echo $row['unit']; ?></span>
                        <button class="border btn-midnight-blue" id="update_item<?php echo $row['id']; ?>" data-bs-toggle="modal" data-bs-target="#update_item<?php echo $row['id']; ?>_modal">
                            update item
                        </button>
                    </div>
                </div>
    <?php
            }
        }
    ?>
    </div>
</section>