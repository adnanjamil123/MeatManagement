<?php
require "shared.php"
?>

<div class="row m-auto">

    <div class="item-purchase col-7 justify-content-center">
        <h4>Add New Item</h4>

        <form action="">

            <input type="text" class="form-control" placeholder="Purchase Order No">
            <input type="text" class="form-control" placeholder="Customer Name">
            <input type="text" class="form-control" placeholder="Item Price">
            <input type="text" class="form-control" placeholder="Unit Type">

            <button class="btn-primary form-control">Submit</button>


        </form>
    </div>

    <div class="add-Newitem col-4">

        <h4>Add New Item</h4>

        <form method="post" action="./item.php">

            <span id="message"></span>
            <input type="text" class="form-control" name="barcode" placeholder="Barcode">
            <input type="text" class="form-control" name="itemName" placeholder="Item Name">
            <input type="text" class="form-control" name="itemPrice" placeholder="Item Price">

            <button type="submit" class="btn-primary form-control">Add New Item</button>


        </form>
    </div>


</div>