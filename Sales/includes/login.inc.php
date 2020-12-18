<?php

if(isset($_POST["submit"]))
{
    $username= $_POST["username"];
    $pwd= $_POST["pwd"];

    require_once ('../config.php');
    require_once ('errors.inc.php');

    if(emptyInputLogin($username, $pwd) !== false)
    {
        header("location: ../Login.php?error=emptyinput");
        exit();
    }

    loginUser($db, $username, $pwd);
}