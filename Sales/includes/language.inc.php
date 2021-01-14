<?php
setcookie("lang", $_POST['language'], time()+3600, '/');
//header("Location: index.php");
echo $_COOKIE['lang'];