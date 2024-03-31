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
        <title>Expenses</title>

        <link rel="stylesheet" href="../../assets/style/admin_style.css">
    </head>

    <body>
        <div class="container-fluid">
            <div class="row">
                <div id="sidebar_content" class="col-lg-2">
                    <?php include '../../navigation/admin_sidebar.php'; ?>
                </div>
                <div id="admin_content" class="col py-3">
                    <h3 id="analytics" class="ps-3"><i class="fa-solid fa-money-bill-wave"></i> Expenses</h3>
                    <section class="my-2">
                        <div class="mx-3">
                            <button class="btn btn-midnight-blue" data-bs-toggle="modal" data-bs-target="#add_cosumable_goods"><i class="fa-solid fa-basket-shopping"></i> Consumable Goods</button>
                        </div>
                        <div class="mx-3 mt-2 px-3 border shadow">
                            <h4>Consumable Goods Table</h4>
                            <?php
                                $sql = "SELECT * FROM expenses WHERE expenses_as = 'consumable_goods' AND remarks = 'pending'";
                                $result = mysqli_query($conn, $sql);
                                if($result) {
                            ?>
                                    <table id="consumable_goods_table_pending" class="table table-sm nowrap table-striped compact table-hover">
                                        <thead class="table-primary">
                                            <tr>
                                                <th>Action</th>
                                                <th>Item Name</th>
                                                <th>Unit</th>
                                                <th>Unit Price</th>
                                                <th>Quantity</th>
                                                <th>Total</th>
                                                <th>Date Purchase</th>
                                                <th>Remarks</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                            <?php
                                            while($row = mysqli_fetch_assoc($result)) {
                            ?>
                                                <tr>
                                                    <td>
                                                        <button class="border btn-midnight-blue" data-bs-toggle="modal" data-bs-target="#paid_expenses_modal_<?php echo $row['id']; ?>">
                                                            Paid
                                                        </button>
                                                    </td>
                                                    <td><?php echo $row['item_name']; ?></td>
                                                    <td><?php echo $row['unit']; ?></td>
                                                    <td>&#8369; <?php echo $row['unit_price']; ?></td>
                                                    <td><?php echo $row['quantity']; ?></td>
                                                    <td>&#8369; <?php echo $row['total']; ?></td>
                                                    <td><?php echo $row['date_purchase']; ?></td>
                                                    <td class="text-danger"><?php echo $row['remarks']; ?></td>
                                                </tr>
                            <?php
                                            }
                            ?>
                                        </tbody>
                                    </table>
                            <?php
                                }
                            ?>

                            <?php
                                $sql = "SELECT * FROM expenses WHERE expenses_as = 'consumable_goods' AND remarks = 'paid'";
                                $result = mysqli_query($conn, $sql);
                                if($result) {
                            ?>
                                    <table id="consumable_goods_table_paid" class="table table-sm nowrap table-striped compact table-hover">
                                        <thead class="table-primary">
                                            <tr>
                                                <th>Item Name</th>
                                                <th>Unit</th>
                                                <th>Unit Price</th>
                                                <th>Quantity</th>
                                                <th>Total</th>
                                                <th>Date Purchase</th>
                                                <th>Remarks</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                            <?php
                                            while($row = mysqli_fetch_assoc($result)) {
                            ?>
                                                <tr>
                                                    <td><?php echo $row['item_name']; ?></td>
                                                    <td><?php echo $row['unit']; ?></td>
                                                    <td>&#8369; <?php echo $row['unit_price']; ?></td>
                                                    <td><?php echo $row['quantity']; ?></td>
                                                    <td>&#8369; <?php echo $row['total']; ?></td>
                                                    <td><?php echo $row['date_purchase']; ?></td>
                                                    <td class="text-success"><?php echo $row['remarks']; ?></td>
                                                </tr>
                            <?php
                                            }
                            ?>
                                        </tbody>
                                    </table>
                            <?php
                                }
                            ?>
                        </div>

                        <div class="mx-3 mt-2 px-3 border shadow">
                            <h4>Other Expenses Table</h4>
                            <table id="other_expenses_table" class="table table-sm nowrap table-striped compact table-hover">
                                <thead class="table-primary">
                                    <tr>
                                        <th>Expenses</th>
                                        <th>Total</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sql = "SELECT * FROM expenses WHERE expenses_as = 'other'";
                                        $result = mysqli_query($conn, $sql);
                                        if($result) {
                                            while($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                                <tr>
                                                    <td><?php echo $row['item_name']; ?></td>
                                                    <td><?php echo $row['total']; ?></td>
                                                    <td><?php echo $row['date_purchase']; ?></td>
                                                </tr>
                                    <?php
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $('#other_expenses_table').DataTable({
                    responsive: {
                        details: true
                    }
                });
                $('#consumable_goods_table_pending').DataTable({
                    responsive: {
                        details: true
                    }
                });
                $('#consumable_goods_table_paid').DataTable({
                    responsive: {
                        details: true
                    }
                });
            });
        </script>
    </body>
</html>