<div class="container my-3">
    <div class="row text-center" id="pricing">
        <?php
            $sql = "SELECT * FROM service_list";
            $result = mysqli_query($conn, $sql);

            if($result) {
                while($row = mysqli_fetch_assoc($result)) {
        ?>
                    <div class="col-lg-12 col-sm-12 mb-3">
                        <div class="m-2 px-3 card shadow">
                            <div>
                                <h4><?php echo strtoupper($row['services']); ?></h4>
                            </div>
                            <div class="row">
                                <?php
                                    $service = $row['services'];
                                    $sql_package = "SELECT * FROM services WHERE service = '$service'";
                                    $result_package = mysqli_query($conn, $sql_package);
                                    
                                    if($result_package) {
                                        while($row_package = mysqli_fetch_assoc($result_package)) {
                                ?>
                                            <div class="col-lg-4 col-sm-12 mb-2">
                                                    <p class="text-start">
                                                        <?php echo "<strong>" . $row_package['package'] . "</strong>" . " - &#8369;" . $row_package['price']; ?>
                                                    </p>
                                            </div>
                                <?php
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
        <?php
                }
            }
        ?>
    </div>
</div>