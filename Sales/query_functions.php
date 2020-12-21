<?php
require_once ('db.php');
require_once ('config.php');

function arabic_data(){

    global $db;

    $SQL1 = 'SET CHARACTER SET utf8'; 

    mysqli_query($db , $SQL1);

}

function query_items(){

    global $db;

    arabic_data();

    $sql = "SELECT *
    FROM items  JOIN  stock_cetegory ON items.cetegory_id = stock_cetegory.cetegory_id
    WHERE items.status = '1'
    ORDER BY items.display_name DESC";
   
    $results = mysqli_query($db , $sql);

    confirm_result_set($results);


        return $results;
}

function get_vat()
{
    global $db;

    $sql = "SELECT tax_value FROM tax
    LIMIT 1";

    $results = mysqli_query($db , $sql);

    confirm_result_set($results);

    close_connection($db);

        return $results;

}
function get_date($date,$table,$col,$id){

    global $db;

    $sql = "SELECT $date FROM $table
        WHERE $col = $id
    LIMIT 1";

    $results = mysqli_query($db , $sql);

    confirm_result_set($results);

    close_connection($db);

        return $results;

};

