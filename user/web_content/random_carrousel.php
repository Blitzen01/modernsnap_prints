<div class="container my-3">
    <div id="carouselExampleControls" class="carousel slide border border-3 border-blue" data-bs-ride="carousel" data-bs-interval="1200"
        data-aos="fade-in"
        data-aos-easing="linear"
        data-aos-duration="1000">
        
        <div class="carousel-inner">
            <?php
            $sql = "SELECT * FROM gallery ORDER BY RAND() LIMIT 5";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                $active = true; // flag to mark the first carousel item as active
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <div class="carousel-item <?php echo $active ? 'active' : ''; ?>">
                        <img src="../assets/image/gallery/<?php echo $row['file_name']; ?>" class="d-block w-100" alt="...">
                    </div>
            <?php
                    $active = false; // set active flag to false after the first carousel item
                }
            } else {
                echo "No images found in the gallery.";
            }
            ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>