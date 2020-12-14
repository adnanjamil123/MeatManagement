<?php

require_once ('db.php');
require_once ('query_functions.php');
                    
    function create_buttons()
    {   
        $posts = mysqli_fetch_all(query_items() , MYSQLI_ASSOC);
                    
        foreach ($posts as $post) {

            
            $id = $post['item_code'];
            $description = $post['display_name'];
            $uom = $post['uom'];
            $price = ($post['selling_price']>0 ? $post['selling_price'] : 0.00);
            $show_sizes = ($post['item_size']>0 ? 'TRUE' : 'FALSE');
            $quantity_disable = ($post['quantity_fixed']>0 ? 'TRUE' : 'FALSE');

            echo "<button id='item_clicked' data-uom='$uom' data-qty-disable = '$quantity_disable' data-size = '$show_sizes' value='$price' name='$description' data-toggle='modal' data-target='#itemsModal' style='margin:1px; height:50px' class='col-5 btn btn-primary'>".$post['display_name']."</button></br>";
        }
    }                
 ?>