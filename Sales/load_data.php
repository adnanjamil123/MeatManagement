<?php

require_once ('db.php');
require_once ('functions.php');

 if(isset($_POST['user']) && isset($_POST['branch']))
 {
    $username = $_POST['user'];
    $branch = $_POST['branch'];

    $order = create_order($db, $username, $branch);

      echo  "<p class='invoice-no'>ORDER NO.$order</p>
        <p class='invoice-branch'>BRANCH:$branch</p>
        <p class='invoice-user'>USER:$username</p>";
 }