<?php

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
    $sql = "SELECT * FROM users WHERE username = ?;";
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