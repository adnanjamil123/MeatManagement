<?php

require_once ('db.php');
require_once ('functions.php');

 if(isset($_POST['user']) && isset($_POST['branch']))
 {
    $username = $_POST['user'];
    $branch = (int)$_POST['branch'];

    $order = create_order($db, $username, $branch);
   // $date = (mysqli_fetch_all(get_date("date","orders","order_no",$order) , MYSQLI_ASSOC))[0]['date'];
    
  
    echo $order;
     
 }

 if(isset($_REQUEST['qr']))
 {
   
    $dataArray= array();
    $data= explode(",",$_REQUEST['qr']);

    for($x = 0; $x < 3; $x++){

      switch($x){
        case 0:{
          $dataArray["name"] = $data[$x];
        }
        case 1:{
          $dataArray["vatRegistration"] = $data[$x];
        }
        case 2:{
          $dataArray["invoice"] = $data[$x];
        }
      
      }

    }
    
    $invoiceData=getInvoiceData($dataArray["invoice"]);

    $seller = getTVLforValue("01", $dataArray["name"]);
    $vatReg = getTVLforValue("02", $dataArray["vatRegistration"]);
    $timestamp = getTVLforValue("03",  $invoiceData["created_at"]);
    $invoiceTotal = getTVLforValue("04",  $invoiceData["invoice_total"]);
    $vatTotalBuff = getTVLforValue("05",  $invoiceData["vat_amount"]);

    $allArray = array($seller,$vatReg,$timestamp,$invoiceTotal,$vatTotalBuff);
    $dataToBase = implode("", $allArray);
   print_r($dataToBase);

    
     
 }

 function getTVLforValue($tag, $value)
 {
  $tagUtf = $tag<17?"0".dechex($tag):dechex($tag);
  $valueLengthUtf = strlen($value)<17?"0".dechex(strlen($value)):dechex(strlen($value));
  $valueUtf = bin2hex($value);

  $UtfArray = array($tagUtf,$valueLengthUtf,$valueUtf);
  return implode("",$UtfArray);
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
      $sql = "UPDATE meat_orders SET payment_method = 'CREDIT/DEBIT CARD' WHERE id = $order_no";
     
     // echo "CREDIT/DEBIT CARD";
    }else{
      $sql = "UPDATE meat_orders SET payment_method = 'CASH' WHERE id = $order_no";
    }
    mysqli_query($db , $sql);

  }

  if(isset($_POST['invoice_total']) && isset($_POST['invoice_wv']))
  {
    global $db;

    $invoice_total = $_POST['invoice_total'];
    $invoice_wv = $_POST['invoice_wv'];
    $order_no = $_POST['order_no'];
    $invoice_vat = $_POST['invoice_v'];
    $discount = $_POST['discount'];

    

    $invoice_no = (int)create_invoice($db, $order_no, $invoice_wv, $invoice_vat, $invoice_total, $discount );

    

    $sql2="UPDATE meat_orders SET invoice_no = $invoice_no, status = 'invoiced' WHERE id = $order_no";

    if(mysqli_query($db , $sql2)){
      echo $invoice_no;
    }else
    {
      echo "failed";
    }
    
  }
  
  if(isset($_GET['q']))
  {
    echo expenses();
  }

  if(isset($_POST['date']) && isset($_POST['amount'])&& isset($_POST['expense']))
  {
    $date = $_POST['date'];
    $amount = $_POST['amount'];
    $expense = $_POST['expense'];
    $remark = $_POST['remark'];
    $seller = $_POST['seller'];

    insert_expense($db,$date,$amount,$expense,$remark,$seller);
  }