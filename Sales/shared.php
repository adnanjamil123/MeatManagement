<?php
session_start();

if (!isset($_SESSION["active"])) {
    session_start();
    session_unset();
    session_destroy();
    header("location: Login.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales</title>

     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/4859d08ded.js"></script>
    <link rel="stylesheet" href="font-awesome.css">
</head>

<body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="jscript/language.js"></script>
    <script src="jscript/global.js"></script>
     <script src="jscript/functions.js"></script>
    <script src="jscript/xmlRequets.js"></script>
    <script src="jscript/configuration.js"></script>




    <nav class="navbar navbar-expand-md navbar-dark p-0" style="background:#204b6d">

        <a class="navbar-brand" href="./index.php" style="color:orange">AS |</a>
        <span class="navbar-text text-white user-select-none d-none d-sm-inline" data-key="lng-logo"><strong>Meat Management |</strong> </span>
        <div class="ml-auto mr-5 dropdown">
            <span class="navbar-text dropdown-toggle" type="button" data-toggle="dropdown"><?php echo ("<p class='d-inline text-white m-0 font-weight-bold' style = 'text-transform:uppercase;' id='user-data' 
                data-username='" . $_SESSION["name"] . "' data-uid='" . $_SESSION["uid"] . "' data-branch='" . $_SESSION["branch"] . "'>" . $_SESSION["name"] . "</p>"); ?></span>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="background:lightgray">

                <li class="dropdown-item text-center exp-btn">
                   
                    <span class="pl-2 m-2">
                        <a href="./index.php">
                            Home
                        </a>
                    </span>

                </li>
                <li class="dropdown-item text-center exp-btn">
                   
                    <span class="pl-2 m-2">
                        <a href="./purchase.php">
                            Purchase
                        </a>
                    </span>

                </li>
                <br>
                <li class="dropdown-item text-center p-0" style="background-color:white;cursor:default">
                    <i class="fa fa-user-times"></i>
                    <a class="text-center" href="includes/logout.inc.php" data-key="lng-log">Log out</a>
                </li>
            </ul>
        </div>
        <button class="btn btn-primary d-md-none d-block bg-white text-dark ml-5" data-toggle="collapse" data-target="#menu" data-key="lng-item"></button>


    </nav>

</body>

</html>