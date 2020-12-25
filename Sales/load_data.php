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
        <li class='order-date list-group-item'><b>$date</b></li>
        <li class='order-no list-group-item'><b>$order</b></li>
        <li class='order-branch list-group-item'>BRANCH: <b>$branch</b></li>
        <li class='order-user list-group-item'>USER: <b>$username</b></li><br><br>
        <li class='order-user list-group-item active'><h4>Invoice details</h4></li>
        <li class='invoice-number list-group-item'><b></b></li>
        <li class='inv-wt list-group-item  vat-display'>TOTAL(Without VAT): <span class='invoice-twv font-weight-bold'></span></li>
        <li class='invvat list-group-item vat-display'>VAT: <span class='invoice-v font-weight-bold'></span></li>
        <li class='inv-total list-group-item'>TOTAL: <span class='invoice-tv font-weight-bold'></span></li>

        <li class='list-group-item active'><div class='form-check-inline'><input class='form-check-input' type='radio' name='payment-opt' value='cash' checked>cash</input> 
        </div>
        
        <div class='form-check-inline'><input class='form-check-input' type='radio' name='payment-opt' value='atm'>atm</input>
        </div></li></ul>";
 }

 if(isset($_POST['item_id']) && isset($_POST['order_no']))
 {
    $order_no = $_POST['order_no'];
    $item_id = $_POST['item_id'];
    $item_uom = $_POST['item_uom'];
    $item_qty= $_POST['item_qty'];
    $item_size = $_POST['item_size'];
    $item_price= $_POST['item_price'];
    $item_vat = $_POST['item_vat'];
    $item_price= $_POST['item_price'];
    $item_without_vat = $_POST['item_wv'];
    $item_total= $_POST['item_total'];
    $item_text= $_POST['item_text'];
    // $payment_method = $_POST['payment_method'];

    insert_items($db, $order_no, $item_id,$item_text, $item_uom, $item_qty, $item_size, $item_price, $item_vat ,$item_without_vat,$item_total);

    
    
  }

  if(isset($_POST['payment_method']))
  {
    $payment_method = $_POST['payment_method'];
    $order_no = $_POST['order_no'];

    if($payment_method == "atm")
    {
      $sql = "UPDATE orders SET payment_type = 'atm' WHERE order_no = $order_no";
      mysqli_query($db , $sql);
      echo "success";
    }else{
      echo "failed";
    }
  }