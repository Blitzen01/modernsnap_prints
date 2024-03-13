<?php
    include '../../assets/fonts/fonts.php';
    include '../../assets/cdn/cdn_links.php';
    include '../../render/connection.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bookings</title>

        <link rel="stylesheet" href="../../assets/style/admin_style.css">
    </head>

    <body>
        <div class="container-fluid">
            <div class="row">
                <div id="sidebar_content" class="col-lg-2">
                    <?php include '../../navigation/admin_sidebar.php'; ?>
                </div>
                <div id="admin_content" class="col py-3">
                    <h3 class="ps-3">Bookings</h3>
                    <?php include '../page_content/create_booking.php'; ?>

                    <h3 class="ps-3">Booked Events</h3>
                    <?php include '../page_content/booked_events.php'; ?>

                    <h3 class="ps-3">Transaction History</h3>
                    <?php include '../page_content/transaction_history.php'; ?>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                var booking_details = $('#booking_details').DataTable({
                    scrollX: true
                });
                var booking_details = $('#transaction_details').DataTable();
            });
            
        </script>
    </body>
</html>
