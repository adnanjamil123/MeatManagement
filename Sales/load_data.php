<?php

require_once ('db.php');
require_once ('functions.php');

 if(isset($_POST['user']) && isset($_POST['branch']))
 {
    $username = $_POST['user'];
    $branch = $_POST['branch'];

    $order = create_order($db, $username, $branch);
    $date = (mysqli_fetch_all(get_date("date","orders","order_no",$order) , MYSQLI_ASSOC))[0]['date'];
    
  
    echo $order;
     
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
      echo "atm";
    }else{
      echo "cash";
    }
  }

  if(isset($_POST['invoice_total']) && isset($_POST['invoice_wv']))
  {
    global $db;

    $invoice_total = $_POST['invoice_total'];
    $invoice_wv = $_POST['invoice_wv'];
    $order_no = $_POST['order_no'];
    $invoice_vat = $_POST['invoice_v'];

    

    $invoice_no = (int)create_invoice($db, $order_no, $invoice_wv, $invoice_vat, $invoice_total );

    

    $sql2="UPDATE orders SET invoice_no = $invoice_no, status = 'invoiced' WHERE order_no = $order_no";

    if(mysqli_query($db , $sql2)){
      echo $invoice_no;
    }else
    {
      echo "failed";
    }
    
  }