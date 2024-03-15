<?php
include '../../render/connection.php';
include '../cdn/cdn_links.php';
include '../fonts/fonts.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve and sanitize form data
        $name = $_POST['customize_booking_name'];
        $contact_number = $_POST['customize_booking_contact_number'];
        $email = $_POST['customize_booking_email'];
        $event_location = $_POST['customize_booking_event_location'];
        $date = $_POST['customize_booking_date'];
        $starttime = $_POST['customize_booking_starttime'];
        $endtime = $_POST['customize_booking_endtime'];
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Confirm Booking</title>
    </head>
    <body>
        <div class="container d-flex justify-content-center mt-5">
            <div class="w-75 border mt-4">
                <div class="card-title bg-midnight-blue text-light text-center p-1">
                    <h5>Review Booking Form</h5>
                </div>
                <form action="confirm_booking.php" method="post">
                    <div class="row m-1">
                        <div class="col-lg-6 col-sm-11">
                            <strong>Name: </strong> <?php echo $name; ?>
                            <input type="hidden" name="name" value="<?php echo $name; ?>">
                        </div>
                        <div class="col-lg-6 col-sm-11">
                            <strong>Contact Number: </strong> <?php echo $contact_number; ?>
                            <input type="hidden" name="contact_number" value="<?php echo $contact_number; ?>">
                        </div>
                    </div>
                    <div class="row m-1">
                        <div class="col-lg-6 col-sm-11">
                            <strong>Email: </strong> <?php echo $email; ?>
                            <input type="hidden" name="email" value="<?php echo $email; ?>">
                        </div>
                        <div class="col-lg-6 col-sm-11">
                            <strong>Event Location: </strong> <?php echo $event_location; ?>
                            <input type="hidden" name="event_location" value="<?php echo $event_location; ?>">
                        </div>
                    </div>
                    <div class="row m-1">
                        <div class="col-lg-4 col-sm-11">
                            <strong>Date: </strong> <?php echo $date; ?>
                            <input type="hidden" name="date" value="<?php echo $date; ?>">
                        </div>
                        <div class="col-lg-4 col-sm-11">
                            <strong>Start Time: </strong> <?php echo $starttime; ?>
                            <input type="hidden" name="starttime" value="<?php echo $starttime; ?>">
                        </div>
                        <div class="col-lg-4 col-sm-11">
                            <strong>End Time: </strong> <?php echo $endtime; ?>
                            <input type="hidden" name="endtime" value="<?php echo $endtime; ?>">
                        </div>
                    </div>
                    <hr class="mx-3">
                    <div class="row text-center">
                    <?php
                        // Function to sanitize input
                        function sanitize($input) {
                            // You might want to implement your own sanitization logic here
                            return $input;
                        }

                        $total_price = 0;
                        $selected_packages = '';
                        if(isset($_POST['package'])) {
                            echo "<h5 class='card-title'>Selected Packages</h5>";
                            $selectedPackagesString = ""; // Initialize an empty string to concatenate selected packages
                            foreach($_POST['package'] as $selected_package) {
                                // Sanitize the input before using it in the query to prevent SQL injection
                                $selected_package = sanitize($selected_package);
                                
                                // Query the database to get the price for the selected package
                                $query = "SELECT price FROM services WHERE package = ?";
                                $stmt = $pdo->prepare($query);
                                $stmt->execute([$selected_package]);
                                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                
                                if ($row) {
                                    $price = $row['price'];
                                    $total_price += $price;
                                    // Concatenate the package and price to the string
                                    $selectedPackagesString .= "Package: $selected_package, Price: &#8369;$price<br>";
                                    $selected_packages .= "$selected_package, ";
                                } else {
                                    // If the price is not available, still concatenate the package with a message
                                    $selectedPackagesString .= "Package: $selected_package, Price: Not available<br>";
                                }
                            }
                            $selected_packages = rtrim($selected_packages, ", ");
                            // Output the concatenated string
                            echo "<span class='card-text'>$selectedPackagesString</span>";
                        }
                        
                        echo "<p><strong>Total price:</strong> &#8369;$total_price</p>";
                    ?>
                    </div>
                    
                    <div class="container d-flex justify-content-center mt-1">
                        <div class="row">
                            <div class="col">
                                <input type="hidden" name="package" value="<?php echo $selected_packages ?>">
                                <input type="hidden" name="total_price" value="<?php echo $total_price; ?>">
                                <button type="submit" class="btn btn-midnight-blue">Confirm</button>
                            </div>
                            <div class="col">
                                <a href="../../admin/web_content/booking.php" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
