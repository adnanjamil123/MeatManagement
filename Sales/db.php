<?php
require_once ('db_credentials.php');

// Make new db Connection
function db_connect()
{
    $connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
    confirm_db_connect();
    return $connection;
}

// Close Db Connection
function db_close($connection)
{
    if(isset($connection)){
        mysqli_close($connection);
    }
    
}

//database connect error
function confirm_db_connect()
{
    if(mysqli_connect_errno())
    {
        $msg = "Database connection failed: ";
        $msg .= mysqli_connect_error();
        $msg .= " (" . mysqli_connect_errno() . ")";
        exit($msg);
    }
}

//database query error
function confirm_result_set($result_set){

    if(!$result_set){
       exit("Database query Failed."); 
       
    }
    

}

//close connection

function close_connection($conn)
{
   
    mysqli_close($conn);

}


?>