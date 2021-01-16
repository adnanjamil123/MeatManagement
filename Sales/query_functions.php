<?php
require_once ('db.php');
require_once ('config.php');

function arabic_data(){

    global $db;

    $SQL1 = 'SET CHARACTER SET utf8'; 

    mysqli_query($db , $SQL1);

}

function query_items($category_id, $limit = 20, $offset= 0){

    global $db;

    arabic_data();

    $sql = "SELECT *, meat_sale_items.id AS itemsid, meat_sale_items.name AS itemsname
    FROM meat_sale_items  JOIN  meat_sale_categories ON meat_sale_items.sale_cat_id = meat_sale_categories.id
    WHERE meat_sale_items.is_allow = '0' AND  sale_cat_id=$category_id
    ORDER BY meat_sale_items.id ASC LIMIT $limit OFFSET $offset";
   
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

  //  close_connection($db);

        return $results;

}
function get_date($date,$table,$col,$id){

    global $db;

    $sql = "SELECT $date FROM $table
        WHERE $col = $id
    LIMIT 1";

    $results = mysqli_query($db , $sql);

    confirm_result_set($results);

   // close_connection($db);

        return $results;

};

function get_branch_name($branch_id)
{
    global $db;

    $sql = "SELECT meat_branches.name FROM meat_branches JOIN meat_sellers ON meat_sellers.branch_id = meat_branches.id WHERE meat_sellers.branch_id = $branch_id;";

    $results = mysqli_query($db , $sql);

    confirm_result_set($results);

    //close_connection($db2);

        return $results;
};


