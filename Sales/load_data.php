<?php

require_once ('db.php');
require_once ('functions.php');

 if(isset($_POST['user']) && isset($_POST['branch']))
 {
    $username = $_POST['user'];
    $branch = $_POST['branch'];

    $order = create_order($db, $username, $branch);
    $date = (mysqli_fetch_all(get_date("date","orders","order_no",$order) , MYSQLI_ASSOC))[0]['date'];
    

      echo  "<ul class='list-group'>
      <li class='order-no list-group-item active'>$date</li>
      <li class='order-date list-group-item '>ORDER NO.$order</li>
        <li class='order-branch list-group-item '>BRANCH:$branch</li>
        <li class='order-user list-group-item '>USER:$username</li>
        </ul>";
 }