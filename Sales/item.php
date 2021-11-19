<?php
require_once ('config.php');
require_once ('query_functions.php');



if(isset($_REQUEST['a']))
{
    
    arabic_data();

    $item_code= $_REQUEST['a'];
    
    $result = item($item_code);


        $item = mysqli_fetch_all($result , MYSQLI_ASSOC);
        
    
        echo(json_encode($item));

   
    
   
}else
{
    echo "invalid data";
}


function item($code)
{
    global $db;


    $sql = "SELECT * FROM meat_sale_items WHERE id = $code";

   
    $results = mysqli_query($db , $sql);
    
    
   confirm_result_set($results);
        
        return $results;
  

   
}