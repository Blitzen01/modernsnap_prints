<?php
    include "../render/connection.php";
    include "../assets/cdn/cdn_links.php";
    include "../assets/fonts/fonts.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modernsnap & Prints</title>

        <link rel="stylesheet" href="../assets/style/user_main_style.css">
        <link rel="stylesheet" href="../assets/style/evo-calendar.midnight-blue.min.css">

        <style>
            .carousel-item {
                position: relative;
                height: 400px; /* Set the height of the carousel items */
                overflow: hidden; /* Hide overflowing content */
            }

            .carousel-item img {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
        </style>
    </head>


    <body>
        <!-- button scroll to top of screen -->
        <button id="scrollToTopBtn" onclick="scrollToTop()"><i class="fa-solid fa-arrow-up"></i></button>
        <!-- button scroll to top of screen -->

        <!-- modernsnap & prints logo -->
        <div class="container pt-3">
            <div class="text-center mx-5"
                data-aos="zoom-out"
                data-aos-easing="linear"
                data-aos-duration="500">
                    <img src="../assets/image/logo_header.png" alt="" srcset="" class="shadow banner_logo" style="width:100%;">
            </div>
            <hr>
        </div>
        <!-- modernsnap & prints logo -->

        <!-- navigation bar -->
        <?php include "../navigation/user_navigation.php"; ?>
        <!-- navigation bar -->

        <!-- random carrousel -->
        <?php include "web_content/random_carrousel.php"; ?>
        <!-- random carrousel -->

        <!-- pricing -->
        <?php include "web_content/pricing.php"; ?>
        <!-- pricing -->

        <!-- events -->
        <?php include "web_content/events.php"; ?>
        <!-- events -->

        <!-- gallery -->
        <?php include "web_content/gallery.php"; ?>
        <!-- gallery -->

        <!-- ratings -->
        <button class="bg-midnight-blue text-light border rounded-top p-1" id="feedback_button" onclick="toggleFeedbackForm()">Feedback</button>
        <div id="ratings" class="p-3 rounded shadow">
            <h4 class="text-center">Feedback Form</h4>
            <form action="../assets/php_script/feedback_form.php" method="post">
                <div class="border rounded shadow mb-3 p-2">
                    <div class="mb-3">
                        <div class="form-group">
                            <div class="rating-box mb-3 text-center">
                                How was your experience?
                                <div class="stars">
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                </div>
                            </div>

                            What kind of comment would you like to send?<br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="feedbackType" id="praise" value="praise">
                                <label class="form-check-label" for="praise">Praise</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="feedbackType" id="problem" value="problem">
                                <label class="form-check-label" for="problem">Problem</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="feedbackType" id="complain" value="complain">
                                <label class="form-check-label" for="complain">Complain</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="feedbackType" id="suggestion" value="suggestion">
                                <label class="form-check-label" for="suggestion">Suggestion</label>
                            </div>
                            <input type="hidden" name="starRating" id="starRating">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="feedback_message">Enter your comments in the space provided below:</label>
                        <textarea class="form-control" name="feedback_message" id="feedback_message" rows="5" style="resize: none;"></textarea>
                    </div>
                </div>
                
                <div class="mb-3">
                    <button type="submit" class="btn btn-midnight-blue">SUBMIT</button>
                </div>
            </form>
        </div>
        <!-- ratings -->

        <script src="../assets/script/user_script.js"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init({
                once: false,
            });

            $("#calendar").evoCalendar({
                theme: 'Midnight Blue',
                calendarEvents: [
                    <?php
                        $sql = "SELECT * FROM booking";
                        $result = mysqli_query($conn, $sql);

                        if($result) {
                            while($row = mysqli_fetch_assoc($result)){
                                $start_time = date("h:i A", strtotime($row['start_time']));
                                $end_time = date("h:i A", strtotime($row['end_time']));
                    ?>
                            {
                                id: "<?php echo $row['id']; ?>",
                                name: "<?php echo $start_time . " to " . $end_time; ?>",
                                date: "<?php echo $row['date']; ?>",
                                type: 'event',
                            },
                    <?php
                            }
                        }
                    ?>
                ]
            });

            
            document.querySelectorAll('.image_thumbnail').forEach((thumbnail, index) => {
                thumbnail.addEventListener('click', () => {
                    var gallery_img = thumbnail.querySelector('img');
                    document.querySelector('.popup-image').style.display = "block";
                    document.querySelector('.popup-image img').src = gallery_img.getAttribute('src');
                    document.querySelector('.popup-image').setAttribute('data-index', index); // Store the index of the clicked image
                });
            });

            document.querySelector('.popup-image .close').onclick = () => {
                document.querySelector('.popup-image').style.display = "none";
            };

            document.querySelector('.popup-image .prev').onclick = () => {
                const currentIndex = parseInt(document.querySelector('.popup-image').getAttribute('data-index'));
                const prevIndex = (currentIndex - 1 + document.querySelectorAll('.image_thumbnail').length) % document.querySelectorAll('.image_thumbnail').length;
                const prevImage = document.querySelectorAll('.image_thumbnail')[prevIndex].querySelector('img').getAttribute('src');
                document.querySelector('.popup-image img').src = prevImage;
                document.querySelector('.popup-image').setAttribute('data-index', prevIndex);
            };

            document.querySelector('.popup-image .next').onclick = () => {
                const currentIndex = parseInt(document.querySelector('.popup-image').getAttribute('data-index'));
                const nextIndex = (currentIndex + 1) % document.querySelectorAll('.image_thumbnail').length;
                const nextImage = document.querySelectorAll('.image_thumbnail')[nextIndex].querySelector('img').getAttribute('src');
                document.querySelector('.popup-image img').src = nextImage;
                document.querySelector('.popup-image').setAttribute('data-index', nextIndex);
            };

            document.addEventListener('keydown', event => {
                if (event.key === "Escape") {
                    document.querySelector('.popup-image').style.display = "none";
                }
            });
        </script>
    </body>

    <!-- about us -->
    <?php include "web_content/about.php"; ?>
    <!-- about us -->
</html>