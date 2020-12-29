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

            echo "<button disabled id='item_clicked' data-id='$id' data-vat='$vat' data-uom='$uom' data-qty-disable = '$quantity_disable' data-size = '$show_sizes' value='$price' name='$description'
             data-toggle='modal' data-target='#itemsModal' style='margin:1px; height:50px; background:#204b6d' 
             class='col-12 item-buttons btn text-light'>".$post['display_name']."</button></br>";
        }
    } 
    
    function create_order($db, $username, $branch)
    {
        
        $sql = "INSERT INTO orders (user, branch) VALUES 
            (?, ?);";

        $stmt = mysqli_stmt_init($db);

        if(!mysqli_stmt_prepare($stmt, $sql)){
           // header("location: ../signup.php?error=datainsertfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "is", $username, $branch);
        mysqli_stmt_execute($stmt);

        $order_number = mysqli_insert_id($db);
        return $order_number;

        mysqli_stmt_close($stmt);
       // header("location: ../signup.php?error=none");

       echo "";
        }

        // function test()
        // {
            
        //     global $db;

        //      $sql = "SELECT * FROM users WHERE username = 'admin' ";

        //     $results = mysqli_query($db , $sql);

        //     confirm_result_set($results);

        //     while($row= mysqli_fetch_row($results))
        //     {
        //         echo $row[0]. "<br>";
        //         echo $row[1]. "<br>";
        //         echo $row[2]. "<br>";
        //         echo $row[3]. "<br>";
        //         echo $row[4]. "<br>";
        //         echo $row[5]. "<br>";
        //         echo $row[6]. "<br>";
               

        //     }

        // }
     
        function insert_items($db, $order_no, $item_id,$item_text, $item_uom, $item_qty, $item_size, $item_price, $item_vat ,$item_without_vat,$item_total)
        {   
            arabic_data();

            $sql = "INSERT INTO sales (order_no,	item,	item_description,	quantity,	price,	amount,	vat,	amount_vat,	size,	uom	) VALUES 
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

         $sql = "INSERT INTO invoice (order_no,	total_wvat,	vat,total) VALUES 
         (?, ?, ?, ?);";

            $stmt = mysqli_stmt_init($db);
                    
            if(!mysqli_stmt_prepare($stmt, $sql)){
                echo"failed";
                exit();
            }
            mysqli_stmt_bind_param($stmt, "iddd", $order_no, $invoice_wv, $invoice_vat, $invoice_total);

            if(mysqli_stmt_execute($stmt)) { 
                $invocie_number = mysqli_insert_id($db);
                return "$invocie_number";
             } else {
                echo "failed";
             }
          
            mysqli_stmt_close($stmt);
       };

       
        
