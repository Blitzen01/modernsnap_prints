<section class="mx-3">
    <table id="no_operator_booking" class="table table-sm nowrap table-striped compact table-hover">
        <thead class="table-primary">
            <tr>
                <th>Action</th>
                <th>Name</th>
                <th>Contact Number</th>
                <th>Email</th>
                <th>Event Location</th>
                <th>Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Package</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT * FROM booking";
                $result = mysqli_query($conn, $sql);

                if($result) {
                    while($row = mysqli_fetch_assoc($result)) {
                        $formatted_date = date('F d, Y', strtotime($row['date']));
                        $formatted_start_time = date('h:i A', strtotime($row['start_time']));
                        $formatted_end_time = date('h:i A', strtotime($row['end_time']));
                        if($row['operator']  == null) {
                           
            ?>
                        <tr>
                            <td><button class="border btn-midnight-blue" data-bs-toggle="modal" data-bs-target="#booking_operator_<?php echo $row['id']; ?>">Add Operator</button></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['contact_number']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['event_location']; ?></td>
                            <td><?php echo $formatted_date; ?></td>
                            <td><?php echo $formatted_start_time; ?></td>
                            <td><?php echo $formatted_end_time; ?></td>
                            <td><?php echo $row['package']; ?></td>
                            <td><?php echo "&#8369;" . $row['total_price']; ?></td>
                        </tr>
            <?php 
                        }
                    }
                }
            ?>

        </tbody>
    </table>

    <table id="booking_details" class="table table-sm nowrap table-striped compact table-hover">
        <thead class="table-primary">
            <tr>
                <th>Action</th>
                <th>Name</th>
                <th>Contact Number</th>
                <th>Email</th>
                <th>Event Location</th>
                <th>Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Package</th>
                <th>Total Price</th>
                <th>Operator</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT * FROM booking";
                $result = mysqli_query($conn, $sql);

                if($result) {
                    while($row = mysqli_fetch_assoc($result)) {
                        $formatted_date = date('F d, Y', strtotime($row['date']));
                        $formatted_start_time = date('h:i A', strtotime($row['start_time']));
                        $formatted_end_time = date('h:i A', strtotime($row['end_time']));
                        if($row['operator'] != null){
            ?>
                        <tr>
                            <td><button class="border btn-midnight-blue" data-bs-toggle="modal" data-bs-target="#booking_<?php echo $row['id']; ?>">Finish</button></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['contact_number']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['event_location']; ?></td>
                            <td><?php echo $formatted_date; ?></td>
                            <td><?php echo $formatted_start_time; ?></td>
                            <td><?php echo $formatted_end_time; ?></td>
                            <td><?php echo $row['package']; ?></td>
                            <td><?php echo "&#8369;" . $row['total_price']; ?></td>
                            <td><?php echo $row['operator']; ?></td>
                        </tr>
            <?php
                        }
                    }
                }
            ?>

        </tbody>
    </table>
</section>