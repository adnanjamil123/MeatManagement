<?php
setcookie("lang", $_POST['language'], 2147483647, '/');
//header("Location: index.php");
echo $_COOKIE['lang'];