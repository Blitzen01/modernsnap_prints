<section class="text-center">
    <div class="row mb-5">
    <?php
        $sql = "SELECT * FROM inventory";
        $result = mysqli_query($conn, $sql);

        if($result) {
            while ($row = mysqli_fetch_assoc($result)) {
    ?>
                <div class="col-lg-2 col-md-6 col-sm-12 mb-2">
                    <div class="card shadow">
                        <?php echo $row['item']; ?>
                        <span><strong class="fs-4"><?php echo $row['quantity']; ?></strong></span>
                    </div>
                </div>
    <?php
            }
        }
    ?>
    </div>
</section>