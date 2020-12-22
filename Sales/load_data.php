<?php

require_once ('db.php');
require_once ('functions.php');

 if(isset($_POST['user']) && isset($_POST['branch']))
 {
    $username = $_POST['user'];
    $branch = $_POST['branch'];

    $order = create_order($db, $username, $branch);
    $date = (mysqli_fetch_all(get_date("date","orders","order_no",$order) , MYSQLI_ASSOC))[0]['date'];
    

      echo  "<ul class='list-group'>
      <li class='order-user list-group-item active'><h4>Order details</h4></li>
      <li class='order-no list-group-item'><b>$date</b></li>
      <li class='order-date list-group-item'>ORDER NO: <b>$order</b></li>
        <li class='order-branch list-group-item'>BRANCH: <b>$branch</b></li>
        <li class='order-user list-group-item'>USER: <b>$username</b></li><br><br>
        <li class='order-user list-group-item active'><h4>Invoice details</h4></li>
        <li class='order-no list-group-item'><b></b></li>
        <li class='order-date list-group-item  vat-display'>TOTAL(Without VAT): <span class='invoice-twv'><b></b></span></li>
        <li class='order-branch list-group-item vat-display'>VAT: <span class='invoice-v'><b></b></span></li>
        <li class='order-branch list-group-item'>TOTAL: <span class='invoice-tv'><b></b></span></li>
        </ul>";
 }