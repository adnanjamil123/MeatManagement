<?php

require_once ('../query_functions.php');

function emptyInputSignup($name, $username, $branch, $pwd, $pwdrepeat)
{
    $result;
    if(empty($name) || empty($username) || empty($branch) || empty($pwd) || empty($pwdrepeat))
    {
        $result = true;
    }else
    {
        $result = false;
    }
    return $result;
};

function invalidUid($username)
{
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username))
    {
        $result = true;
    }else
    {
        $result = false;
    }
    return $result;
};

function pwdMatch($pwd, $pwdrepeat)
{
    $result;
    if($pwd !== $pwdrepeat)
    {
        $result = true;
    }else
    {
        $result = false;
    }
    return $result;
};

function uidExists($db , $username)
{
    $sql = "SELECT * FROM meat_sellers WHERE username = ?;";
    $stmt = mysqli_stmt_init($db);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        
        return $row;
    }
    else
    {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
};

function create_user($db, $name, $username, $branch, $pwd)
{
    arabic_data();

    $sql = "INSERT INTO meat_sellers (name, username, password, branch_id) VALUES 
            (?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($db);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=datainsertfailed");
        exit();
    }

    $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $username, $hashedpwd, $branch);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
};

function emptyInputLogin($username, $pwd)
{
    $result;
    
    if(empty($username) || empty($pwd))
    {
        $result = true;
    }else
    {
        $result = false;
    }
    return $result;
};

function loginUser($db, $username, $pwd)
{
    arabic_data();

    
    
    $user_exist = uidExists($db , $username);

   //print_r($user_exist);

    if($user_exist === false)
    {
        header("location: ../Login.php?error=wronglogin");
        exit();
    }

    $pwdhashed = $user_exist["password"];
    $checkpwd = password_verify($pwd, $pwdhashed);
    
    if(!$user_exist["is_allow"])
    {
        header("location: ../Login.php?error=inactiveusername");
        exit();
    }

    if($pwdhashed === false)
    {
        header("location: ../Login.php?error=wrongpassword");
        exit();
    }
    else
    {
        
        session_start();
        $_SESSION["name"] = $user_exist["name"];
        $_SESSION["username"] = $user_exist["username"];
        $_SESSION["branch"] = $user_exist["branch_id"];
        $_SESSION["active"] = $user_exist["is_allow"];
        $_SESSION["uid"] = $user_exist["id"];
        $_SESSION["LAST_ACTIVITY"] = time();

        header("location: ../index.php");
        exit();
    }
};