<div class="container mt-3">
    <div class="row text-center" id="gallery">
        <?php
            // Retrieve distinct services from the database
            $sql_services = "SELECT * FROM service_list";
            $result_services = mysqli_query($conn, $sql_services);

            if ($result_services->num_rows > 0) {
                while ($row_services = $result_services->fetch_assoc()) {
                    $service = strtoupper($row_services['services']);
        ?>
                    <div>
                            <h2><?php echo $service; ?></h2>
                    </div>
        <?php
                    // Retrieve photos for the current service
                    $sql_photos = "SELECT file_name FROM gallery WHERE service='$service'";
                    $result_photos = $conn->query($sql_photos);

                    if ($result_photos->num_rows > 0) {
                        while ($row_photos = $result_photos->fetch_assoc()) {
                            $file_name = $row_photos['file_name'];
                            $animations = array('fade-up-left', 'fade-down-right', 'fade-down-left', 'fade-up-right');
                            $delay = array('50', '100', '150');

                            $random_animation = $animations[array_rand($animations)];
                            $random_delay = $delay[array_rand($delay)];
        ?>      
                        <div class='col-lg-1 col-sm-3 mb-3'>
                            <div class='image_thumbnail'>
                                    <img id="gallery_img" src='../assets/image/gallery/<?php echo $file_name; ?>' class='img-fluid gallery-image'>
                            </div>
                        </div>
        <?php
                        }
                    }
                }
            }
        ?>
        <div class="popup-image">
            <span class="close"><i class="fa-solid fa-xmark"></i></span>
            <span class="prev"><i class="fa-solid fa-chevron-left"></i></span>
            <img src="../assets/image/gallery/<?php echo $file_name; ?>" alt="">
            <span class="next"><i class="fa-solid fa-chevron-right"></i></span>
        </div>
    </div>
</div>