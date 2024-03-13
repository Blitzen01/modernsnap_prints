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
        <title>Inventory</title>

        <link rel="stylesheet" href="../../assets/style/admin_style.css">
    </head>
    
    <body>
        <div class="container-fluid">
            <div class="row">
                <div id="sidebar_content" class="col-lg-2">
                    <?php include '../../navigation/admin_sidebar.php'; ?>
                </div>
                <div id="admin_content" class="col py-3">
                    <h3 class="ps-3">Inventory</h3>
                    <button class="btn btn-success ms-5" data-bs-toggle="modal" data-bs-target="#invetory_new_item_modal"><i class="fa-solid fa-square-plus"></i> New Item</button>
                    <button class="btn btn-danger ms-3" data-bs-toggle="modal" data-bs-target="#remove_item_modal"><i class="fa-solid fa-trash"></i> Remove Item</button>
                    <section>
                        <div class="row mb-5 p-4 text-center">
                        <?php
                            $sql = "SELECT * FROM inventory";
                            $result = mysqli_query($conn, $sql);

                            if($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                    <div class="col-lg-2 col-md-6 col-sm-12 mb-2">
                                        <div class="card shadow">
                                            <?php echo $row['item']; ?>
                                            <span><strong class="fs-4"><?php echo $row['quantity']; ?></strong></span>
                                            <button class="border btn-midnight-blue" id="update_item<?php echo $row['id']; ?>" data-bs-toggle="modal" data-bs-target="#update_item<?php echo $row['id']; ?>_modal">
                                                update item
                                            </button>
                                        </div>
                                    </div>
                        <?php
                                }
                            }
                        ?>
                        </div>
                    </section>
                </div>
            </div>
        </div>

        <script>
            function increase(itemId) {
                var number = document.getElementById("number_" + itemId);
                var currentValue = parseInt(number.innerText);
                number.innerText = currentValue + 1;
            }

            function decrease(itemId) {
                var number = document.getElementById("number_" + itemId);
                var currentValue = parseInt(number.innerText);
                if (currentValue > 0) {
                    number.innerText = currentValue - 1;
                }
            }


            function itemSaveChange(itemId) {
                var id = itemId;
                var quantity = document.getElementById("number_" + itemId).textContent;

                // Log the data being sent
                console.log("Sending data to server: id =", id, "quantity =", quantity);

                // Create a form element
                var form = document.createElement("form");

                // Set the form attributes
                form.method = "POST";
                form.action = "../../assets/php_script/update_quantity.php";

                // Create input elements for id and quantity
                var idInput = document.createElement("input");
                idInput.type = "hidden";
                idInput.name = "id";
                idInput.value = id;

                var quantityInput = document.createElement("input");
                quantityInput.type = "hidden";
                quantityInput.name = "quantity";
                quantityInput.value = quantity;

                // Append input elements to the form
                form.appendChild(idInput);
                form.appendChild(quantityInput);

                // Append the form to the document body
                document.body.appendChild(form);

                // Submit the form
                form.submit();
            }


        </script>
    </body>
</html>