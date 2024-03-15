<section class="my-2">
    <div class="ms-3">
        <button class="btn btn-midnight-blue" data-bs-toggle="modal" data-bs-target="#add_operator_modal"><i class="fa-solid fa-plus"></i> Add Operator</button>
        <button class="btn btn-danger ms-3" data-bs-toggle="modal" data-bs-target="#remove_operator_modal"><i class="fa-solid fa-trash"></i> Remove Operator</button>
    </div>

    <div class="mx-5 my-3">
        <table class="border table table-sm nowrap table-striped compact table-hover bg-midnight-blue">
            <thead class="table-primary">
                <tr>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Contact Number</th>
                    <th>Permission</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM account";
                    $result = mysqli_query($conn, $sql);

                    if($result) {
                        while($row = mysqli_fetch_assoc($result)) {
                ?>
                            <tr>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo $row['contact_number']; ?></td>
                                <td><?php echo $row['permission']; ?></td>
                            </tr>
                <?php
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</section>