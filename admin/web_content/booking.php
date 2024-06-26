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
                    <h3 class="ps-3"><i class="fa-regular fa-bookmark"></i> Bookings</h3>
                    <?php include '../page_content/create_booking.php'; ?>

                    <h3 class="ps-3"><i class="fa-solid fa-bookmark"></i> Booked Events</h3>
                    <?php include '../page_content/booked_events.php'; ?>

                    <h3 class="ps-3"><i class="fa-solid fa-book-open"></i> Transaction History</h3>
                    <?php include '../page_content/transaction_history.php'; ?>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                // initialize table for booking details
                $('#booking_details').DataTable({
                    responsive: {
                        details: true
                    }
                });
                // putting unique id for booking details
                $('#booking_details_filter input[type="search"]').attr('id', 'booking_searchInput');

                $('#no_operator_booking').DataTable({
                    responsive: {
                        details: true
                    }
                })
                $('#no_operator_booking_filter input[type="search"]').attr('id', 'no_operator_booking_searchInput');

                $('#transaction_details').DataTable({
                    responsive: {
                        details: true
                    }
                });
                // putting unique id for booking details
                $('#transaction_details_filter input[type="search"]').attr('id', 'transaction_searchInput');
            });
            
        </script>
    </body>
</html>
