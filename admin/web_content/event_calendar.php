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
        <title>Event Calendar</title>
    </head>

    <body>
        <div class="container-fluid">
            <div class="row">
                <div id="sidebar_content" class="col-lg-2">
                    <?php include '../../navigation/admin_sidebar.php'; ?>
                </div>
                <div id="admin_content" class="col py-3">
                    <h3 class="ps-3"><i class="fa-solid fa-calendar-week"></i> Event Calendar</h3>
                    <section class="my-2">
                        <div id="calendar"></div>
                    </section>
                </div>
            </div>
        </div>

        <script src="../../assets/script/admin_script.js"></script>
        <script>
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
                                id: "event<?php echo $row['id']; ?>",
                                name: "<?php echo $row['name']; ?>",
                                date: "<?php echo $row['date']; ?>",
                                description: "Event Location:<?php echo $row['event_location']; ?><br> Event Starts at <?php echo $start_time; ?> to <?php echo $end_time; ?> <br> <h5><strong>Package inclusion: </><?php echo $row['package']; ?></h5>",
                                type: 'event',
                            },
                    <?php
                            }
                        }
                    ?>
                ]
            });
        </script>
    </body>
</html>