<?php
require_once ('config.php');
require_once ('query_functions.php');

if(isset($_REQUEST['pass']))
{
        createItem($_REQUEST);
        echo true;
}

function createItem($items)
{
    Global $db;
    $barcode =$items["barcode"];
    $itemName =$items["itemName"];
    $itemPrice =$items["itemPrice"];
    $unitType =1;
    $priceStatus =1;
    $optionStatus =1;
    $weightStatus =1;
    $salesCatId =1;
    $isAllow =0;

    $sql = "INSERT INTO meat_sale_items (item_barcode, name, price, unit_type, price_status, options_status, weight_status, sale_cat_id, is_allow) VALUES 
            (?, ?, ?, ?, ?, ?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($db);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ./purchase.php?status=fail");
        exit();
    }

    

    mysqli_stmt_bind_param($stmt, "isdiiiiii", $barcode,$itemName,$itemPrice,$unitType,$priceStatus,$optionStatus,$weightStatus,$salesCatId,$isAllow);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    //header("location: ./purchase.php?status=success");
}

if(isset($_REQUEST["barcode"]) && isset($_REQUEST["itemName"]) && isset($_REQUEST["itemPrice"])){
    
 $msg =  ValidateItem($_REQUEST);
  
if(!ValidateItem($_REQUEST))
{
    echo "invalid";
}else
{
    createItem($_REQUEST);
}
  
   
}

function ValidateItem($items){

    foreach($items as $key => $val) {

        if($key == "barcode")
        {
            if($val =="" || !is_numeric($val)){
                return false;
                exit;
            }
        }
        if($key == "itemName")
        {
            if($val =="" || is_numeric($val)){
                return false;
                exit;
            }
        }
        if($key == "itemPrice")
        {
            if($val =="" || !is_numeric($val)){
                return false;
                exit;
            }
        }
    }

    return true;
}

if(isset($_REQUEST['a']))
{
    
    arabic_data();

    $item_code= $_REQUEST['a'];
    
    $result = item($item_code);


        $item = mysqli_fetch_all($result , MYSQLI_ASSOC);
        
    
        echo(json_encode($item));
   
}


function item($code)
{
    global $db;


    $sql = "SELECT * FROM meat_sale_items WHERE $code IN(id,item_barcode) LIMIT 1";

   
    $results = mysqli_query($db , $sql);
    
    
   confirm_result_set($results);
        
        return $results;
  

   
}