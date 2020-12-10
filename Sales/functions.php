<?php

require_once ('db.php');
require_once ('query_functions.php');
                    
    function create_buttons()
    {   
        $posts = mysqli_fetch_all(query_items() , MYSQLI_ASSOC);
                    
        foreach ($posts as $post) {

            $id = $post['item_code'];
            $description = $post['item_description'];
            $uom = $post['uom'];
            $price = $post['selling_price']>0 ? $post['selling_price'] : 0.00;

            // echo "<button id='item_clicked' data-uom='$uom' 'value='$price' name='$description'  style='margin:2px;' class='col-5 btn btn-success'>".$post['item_description']."</button></br>";
        
            echo "<button id='item_clicked' data-uom='$uom' 'value='$price' name='$description' data-toggle='modal' data-target='#itemsModal' style='margin:2px;' class='col-5 btn btn-success'>".$post['item_description']."</button></br>";
        }
    }                
 ?>