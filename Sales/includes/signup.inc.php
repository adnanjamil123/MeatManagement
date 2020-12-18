<?php

if(isset($_POST["submit"])){

    $name = $_POST["name"];
    $username = $_POST["uid"];
    $branch = $_POST["branch"];
    $pwd = $_POST["pwd"];
    $pwdrepeat = $_POST["pwdrepeat"];


    require_once ('../db.php');
    require_once ('errors.inc.php');

    $db = db_connect();

    if(emptyInputSignup($name, $username, $branch, $pwd, $pwdrepeat) !== false)
    {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    if(invalidUid($username) !== false)
    {
        header("location: ../signup.php?error=invaliduid");
        exit();
    }
    if(pwdMatch($pwd, $pwdrepeat) !== false)
    {
        header("location: ../signup.php?error=passwordsdontmatch");
        exit();
    }
    if(uidExists($db , $username) !== false)
    {
        header("location: ../signup.php?error=usernametaken");
        exit();
    }

   // create_user($name, $username, $branch, $pwd);
}
else
{
    header("location: ../signup.php");
    exit();
}