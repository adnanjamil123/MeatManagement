<?php

require_once ('db.php');
require_once ('query_functions.php');
                    
    function create_buttons()
    {   
        $posts = mysqli_fetch_all(query_items() , MYSQLI_ASSOC);
        $vat = (mysqli_fetch_all(get_vat() , MYSQLI_ASSOC))[0]['tax_value'];
        
        foreach ($posts as $post) {

            
            $id = $post['item_code'];
            $description = $post['display_name'];
            $uom = $post['uom'];
            $price = round(($post['selling_price']>0 ? $post['selling_price'] : 0.00) * (1+$vat),2);
            $show_sizes = ($post['item_size']>0 ? 'TRUE' : 'FALSE');
            $quantity_disable = ($post['quantity_fixed']>0 ? 'TRUE' : 'FALSE');

            echo "<button id='item_clicked' data-uom='$uom' data-qty-disable = '$quantity_disable' data-size = '$show_sizes' value='$price' name='$description'
             data-toggle='modal' data-target='#itemsModal' style='margin:1px; height:50px' 
             class='col-5 btn btn-primary h-auto'>".$post['display_name']."</button></br>";
        }
    }                
 ?>