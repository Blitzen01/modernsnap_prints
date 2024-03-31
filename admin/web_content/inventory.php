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
                    <h3 class="ps-3"><i class="fa-solid fa-warehouse"></i> Inventory</h3>
                    <?php include '../page_content/inventory_list.php'; ?>
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