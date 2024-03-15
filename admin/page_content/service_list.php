<div class="my-3 border border-bottom pb-5 shadow">
    <div class="py-2">
        <button class="btn btn-info ms-5" data-bs-toggle="modal" data-bs-target="#add_new_service">
            <i class="fa-solid fa-square-plus"></i> New Service
        </button>
        <button class="btn btn-danger ms-3" data-bs-toggle="modal" data-bs-target="#remove_service">
            <i class="fa-solid fa-trash"></i> Remove Service
        </button>
    </div>
    <div class="row mx-5">
        <h4 class="text-center">List of Services</h4>
        <?php
            $sql = "SELECT * FROM service_list";
            $result = mysqli_query($conn, $sql);

            if($result) {
                while($row = mysqli_fetch_assoc($result)) {
        ?>
                    <div class="col text-center ">
                        <h5 class="text-midnight-blue text-light rounded">
                            <strong>
                                <?php echo strtoupper($row['services']); ?>
                            </strong>
                        </h5>
                    </div>
        <?php
                }
            }
        ?>
    </div>
</div>