<?php

require_once ('db.php');
require_once ('query_functions.php');
                    
    function create_buttons()
    {   
        $posts = mysqli_fetch_all(query_items() , MYSQLI_ASSOC);
        $vat = (mysqli_fetch_all(get_vat() , MYSQLI_ASSOC))[0]['tax_value'];
        
        
        foreach ($posts as $post) {

            
            $id = $post['itemsid'];
            $description = $post['name'];
            // $uom = $post['uom'];
            $uom="NA";
            $price = round(($post['price']>0 ? $post['price'] : 0.00) * (1+$vat),2);
            $show_sizes = ($post['options_status']>0 ? 'TRUE' : 'FALSE');
            $quantity_disable = ($post['weight_status']>0 ? 'FALSE' : 'TRUE');

            echo "<button disabled id='item_clicked' data-id='$id' data-vat='$vat' data-uom='$uom' data-qty-disable = '$quantity_disable' data-size = '$show_sizes' value='$price' name='$description'
             data-toggle='modal' data-target='#itemsModal' style='margin:1px; height:50px; background:#204b6d' 
             class='col-5 item-buttons btn text-light'>".$post['name']."</button></br>";
        }
    } 

    function create_special_items_buttons()
    {   
        $posts = mysqli_fetch_all(query_special_items() , MYSQLI_ASSOC);
        $vat = (mysqli_fetch_all(get_vat() , MYSQLI_ASSOC))[0]['tax_value'];
        
        
        foreach ($posts as $post) {

            
            $id = $post['itemsid'];
            $description = $post['name'];
            // $uom = $post['uom'];
            $uom="NA";
            $price = round(($post['price']>0 ? $post['price'] : 0.00) * (1+$vat),2);
            $show_sizes = ($post['options_status']>0 ? 'TRUE' : 'FALSE');
            $quantity_disable = ($post['weight_status']>0 ? 'FALSE' : 'TRUE');

            echo "<button disabled id='item_clicked' data-id='$id' data-vat='$vat' data-uom='$uom' data-qty-disable = '$quantity_disable' data-size = '$show_sizes' value='$price' name='$description'
             data-toggle='modal' data-target='#itemsModal' style='margin:1px; height:50px; background:#204b6d' 
             class='item-buttons btn text-light w-100'>".$post['name']."</button></br>";
        }
    } 
    
    function create_order($db, $username, $branch)
    {
        
        $sql = "INSERT INTO meat_orders (seller_id, branch_id) VALUES 
            (?, ?);";

        $stmt = mysqli_stmt_init($db);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../signup.php?error=datainsertfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ii", $username, $branch);
        mysqli_stmt_execute($stmt);

        $order_number = mysqli_insert_id($db);
        return $order_number;

        mysqli_stmt_close($stmt);
       // header("location: ../signup.php?error=none");

        }

     
        function insert_items($db, $order_no, $item_id,$item_text, $item_uom, $item_qty, $item_size, $item_price, $item_vat ,$item_without_vat,$item_total)
        {   
            arabic_data();

            $sql = "INSERT INTO meat_items (order_id,	sale_item_id,	item_description,	qty,	price,	amount,	vat,	amount_vat,	size,	uom	) VALUES 
                    (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
        
            $stmt = mysqli_stmt_init($db);
        
            if(!mysqli_stmt_prepare($stmt, $sql)){
                echo"failed";
                exit();
            }

            

            mysqli_stmt_bind_param($stmt, "iisiddddss", $order_no,$item_id,$item_text,$item_qty,$item_price,$item_without_vat,$item_vat,$item_total,$item_size,$item_uom);
            // mysqli_stmt_execute($stmt);

            if(mysqli_stmt_execute($stmt)) { 
                echo "success";
             } else {
                echo "failed";
             }
          
            mysqli_stmt_close($stmt);

            
            
        };

       function create_invoice($db, $order_no, $invoice_wv, $invoice_vat, $invoice_total ){
         //invoice_no	order_no	date	status	total_wvat	vat	total

         arabic_data();

         $sql = "INSERT INTO meat_invoices (order_id,	total_wvat,	vat_amount,invoice_total) VALUES 
         (?, ?, ?, ?);";

            $stmt = mysqli_stmt_init($db);
                    
            if(!mysqli_stmt_prepare($stmt, $sql)){
                echo"statement failed";
                exit();
            }
            mysqli_stmt_bind_param($stmt, "iddd", $order_no, $invoice_wv, $invoice_vat, $invoice_total);

            if(mysqli_stmt_execute($stmt)) { 
                $invoice_number = mysqli_insert_id($db);
                return "$invoice_number";
             } else {
                echo "no invoice number";
             }
          
            mysqli_stmt_close($stmt);
       };

       
        
