<?php
require_once ('db.php');
require_once ('config.php');

function arabic_data(){

    global $db;

    $SQL1 = 'SET CHARACTER SET utf8'; 

    mysqli_query($db , $SQL1);

}

function query_items(){

    global $db;

    arabic_data();

    
    // $sql = "SELECT * FROM items ORDER BY display_serial ASC";
    $sql = "SELECT * FROM items";
   
    $results = mysqli_query($db , $sql);

    confirm_result_set($results);

    close_connection($db);

        return $results;
}
// function query_all_accounts_byID($ID){

//     global $db;
//     global $EMAIL;
   
//     $sql = "SELECT * FROM account_info ";
//     $sql .= "WHERE email_id = '$EMAIL' ";
//     $sql .= "ORDER BY field(account_id,'$ID',account_id)";

//     $results = mysqli_query($db , $sql);
//     confirm_result_set($results);
//     return $results;
// }

// function query_open_positions_atStart(){

//     global $db;
//     global $EMAIL;

//         $sql = "SELECT * FROM positions 
//         WHERE account = (SELECT account_id from account_info
//         WHERE email_id = '$EMAIL' AND status = 'open'
//         ORDER BY account_id ASC LIMIT 1)" ;

//         $result = mysqli_query($db, $sql);
//         confirm_result_set($result);
//         return $result;
      
// }

// function insert_position($id,$market,$direction,$entry,$size, $stop, $take)
// {
//     global $db;
//     $stopLoss = $stop==0?0:$stop;
//     $takeProfit = $take==0?0:$take;

//     $sql = "INSERT INTO positions ";
//     $sql .= "(account, market, direction, entry, size, status,stop_limit,take_profit) ";
//     $sql .= "VALUES ('$id','$market','$direction','$entry','$size', 'open',$stopLoss,$takeProfit)";

//     $result = mysqli_query($db, $sql);
//     confirm_result_set($result);
    
// }
// function close_order($ID, $closing_Price, $gross, $net, $expenses,$result)
// {
//     global $db;

//     $sql = "UPDATE positions SET ";
//     $sql .= "closed_price= '".$closing_Price."', ";
//     $sql .= "gross= '".$gross."', ";
//     $sql .= "net= '".$net."', ";
//     $sql .= "closing_time= now(), ";
//     $sql .= "status= 'invoice', ";
//     $sql .= "commission= '".$expenses."', ";
//     $sql .= "balance= '".$result."' ";
//     $sql .= "WHERE position_id='".$ID."' ";
//     $sql .= "LIMIT 1";

//     $result = mysqli_query($db, $sql);
//     confirm_result_set($result);
//     return $result;
    
// }

// function load_orders($ID)
// {
//     global $db;
//     global $pHeader;

//     $output = $pHeader;

//     $sql = "SELECT * FROM positions 
//           WHERE account = $ID AND status = 'open'";
    
//           $result = mysqli_query($db, $sql);
//           confirm_result_set($result) ;

//           if(mysqli_num_rows($result)>0)
//           {
//             while($data = mysqli_fetch_assoc($result))
//             {
             
//               $size = number_format($data['size']);
              
            
//               $output .=   "<tr name=$data[position_id] class=$data[market]><td>$data[created]</td>
//                 <td id='mark'>$data[market]</td><td id='pos-size'>$size</td><td>$data[direction]</td><td>$data[entry]</td>
//                 <td>$data[take_profit]</td><td>$data[stop_limit]</td>
//                 <td id='gross'></td><td id='price'></td></tr>";
//             }
//             return $output;
//           }
// }





?>