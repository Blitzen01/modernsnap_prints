<?php
    include '../../assets/fonts/fonts.php';
    include '../../assets/cdn/cdn_links.php';
    include '../../render/connection.php';

    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: ../index.php"); // Redirect to the index if not logged in
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gallery</title>

        <link rel="stylesheet" href="../../assets/style/admin_style.css">
        <style>
            .hidden {
                display: none;
            }
        </style>
    </head>

    <body>
        <div class="container-fluid">
            <div class="row">
                <div id="sidebar_content" class="col-lg-2">
                    <?php include '../../navigation/admin_sidebar.php'; ?>
                </div>
                <div id="admin_content" class="col py-3">
                    <h3 id="analytics" class="ps-3"><i class="fa-solid fa-image-portrait"></i> Gallery</h3>
                    <section class="my-2">
                        <div class="mx-3">
                            <button class="btn btn-midnight-blue" data-bs-toggle="modal" data-bs-target="#upload_photo_to_gallery_modal">
                                <i class="fa-regular fa-images"></i> Add Picture
                            </button>
                        </div>

                        <div class="row text-center" id="photoGallery">
                            <?php
                                // Retrieve distinct services from the database
                                $sql_services = "SELECT DISTINCT service FROM gallery";
                                $result_services = mysqli_query($conn, $sql_services);

                                if ($result_services->num_rows > 0) {
                                    while ($row_services = $result_services->fetch_assoc()) {
                                        $service = strtoupper($row_services['service']);
                                        echo "<h2>$service</h2>";
                                        
                                        // Retrieve photos for the current service
                                        $sql_photos = "SELECT file_name FROM gallery WHERE service='$service'";
                                        $result_photos = $conn->query($sql_photos);

                                        if ($result_photos->num_rows > 0) {
                                            echo "<div class='row'>";
                                            while ($row_photos = $result_photos->fetch_assoc()) {
                                                $file_name = $row_photos['file_name'];
                            ?>      
                                            <div class='col-lg-3 mb-3'>
                                                <div class='position-relative img-thumbnail'>
                                                    <img src='../../assets/image/gallery/<?php echo $file_name; ?>' class='img-fluid gallery-image' style='width: 100%;'>
                                                    <button type='button' class='nav-link p-1 text-midnight-blue position-absolute m-2 top-0 end-0' 
                                                        onclick='openModal("<?php echo $file_name; ?>")' data-bs-toggle="modal" data-bs-target="#remove_photo_modal">
                                                        <i class='fa-solid fa-x'></i>
                                                    </button>
                                                    <?php echo "$file_name"; ?>
                                                </div>
                                            </div>
                            <?php
                                            }
                                        }
                                    }
                                }
                            ?>
                        </div>
                    </section>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var fileInput = document.querySelector('#upload_photo_to_gallery_modal input[type="file"]');
                var errorMessage = document.querySelector('#upload_photo_to_gallery_modal #errorMessage');
                var uploadButton = document.querySelector('#upload_photo_to_gallery_modal #upload_image_to_gallery_form_button');

                fileInput.addEventListener('change', function() {
                    if (this.files.length > 5) {
                        errorMessage.classList.remove('hidden');
                        errorMessage.style.color = "red";
                        uploadButton.disabled = true;
                    } else {
                        errorMessage.classList.add('hidden');
                        uploadButton.disabled = false;
                    }
                });
            });

            function openModal(fileName) {
                var modalImage = document.getElementById("modal-image");
                var modalFileName = document.getElementById("modal-file-name");
                var modal_file_name_input = document.getElementById("modal-file-name-input");

                // Set the image source and file name in the modal
                modalImage.src = "../../assets/image/gallery/" + fileName;
                modalFileName.textContent = fileName;
                modal_file_name_input.value = fileName;

                // Show the modal
                $('#remove_photo_modal').modal('show');
            }
        </script>
    </body>
</html>