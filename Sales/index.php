<?php

session_start();

require_once ('db.php');
require_once ('query_functions.php');
require_once ('functions.php');

//echo test();

if(!isset($_SESSION["active"]))
   {
    session_start();
    session_unset();
    session_destroy();
    header("location: Login.php");
   }
?>


<!doctype html>
<html lang="en">
  <head>
    <title>Sales</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
  </head>
  <body>
      
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
       
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
        <script src="jscript/global.js"></script>
        <script src="jscript/trap_focus.js"></script>
        <script src="jscript/functions.js"></script>
        
        <script>
              
           
           
        </script>

        <style>

        .vat-display{
           /* display:none;  */
        }
        
        </style>
    
        <div class="main container-fluid vh-100" style="background:#204b6d">

        <div class="modal modal" id="itemsModal">
                        <div class="modal-dialog modal-dialog-centered" aria-modal="true">
                            <div class="modal-content">
                                <div class="modal-header text-light" style="background:#204b6d">
                                    <h3 class="modal-title">item description</h3>
                                    <button type="button" class="close"><span>&times;</span></button>
                                </div><!--modal-header-->
                                    <div class="row modal-body justify-content-center">
                                        <div class="col-3">
                                            <div><label for="fprice">Price:</label><input id="fprice"type = "number" class="w-100" step="1" autofocus></input></div>
                                            
                                        </div>
                                        <div class="col-3">
                                            <div><label for="fqty">Qty:</label><input id="fqty"type = "number" value=1 class="w-100 fqty" step="1"></input></div>
                                            
                                        </div>
                                        <div class="my-auto col-1">
                                        <span id="fuom" class="modal-uom w-100"></span>
                                        </div>
                                        
                                        <div class="row col-3 form-check item-sizes">


                                            <label class="col form-check-label">
                                                <input type="radio" class="form-check-input" name="optradio" value="small" checked>SMALL
                                            </label>
                                           
                                            <label class="col form-check-label">
                                                <input type="radio" class="form-check-input" name="optradio" value="medium">MEDIUM
                                            </label>
                                            
                                            <label class="col form-check-label">
                                                <input type="radio" class="form-check-input" name="optradio" value="large">LARGE
                                            </label>

                                        </div>
                                    </div><!--modal-body-->
                                <div class="modal-footer">
                                    <button class="btn-confirm btn text-light" style="background:#204b6d">
                                            Confirm 
                                    </button>
                                </div><!--modal-footer-->
                            </div><!--modal-content-->
                        </div><!--modal-dialog-->
                    </div><!--modal-->

                <nav class="navbar navbar-expand-md navbar-dark" style="background:#204b6d">

                     <a class="navbar-brand" href="#">MMS |</a>   
                     <span  class="navbar-text text-white"><strong>Meat Management |</strong> </span>   
                     
                    <span class="navbar-text"><?php echo ("<p  style = 'text-transform:uppercase;' id='user-data' data-username='".$_SESSION["uid"]."' data-branch='".$_SESSION["branch"]."'>".$_SESSION["name"]."</p>"); ?></span>
                    <a class="nav-link" href="includes/logout.inc.php">Log out</a>

                </nav>

            <div class="row sales-section bg-light justify-content-around" style="margin:auto, height:90vh">

                <div class="row col-3  justify-content-around items-section bg-light" id="menu" style="height:90vh; border-right:10px solid; border-color:#204b6d">
                    <?php

                        create_buttons();
                        
                    ?>
                </div><!--item-section-->

                

                <div class="col-9  order-section">

                        <div class="row col-12 order-buttons  justify-content-between btn-group btn-group-sm bg-light w-100" role="group" aria-label="Basic example">

                            <button type="button" class="new btn  col-2" >NEW</button>
                            <button type="button" class="clear btn col-2"  >CLEAR</button>
                            <button type="button" class="btn  col-2 save" >SAVE</button>
                            <button type="button" class="print btn  col-2"  >PRINT</button>
                            <button type="button" class="save-print btn col-2"  >SAVE&PRINT</button>

                        </div><!--order-buttons-->
                            
                        <div class="row invoice" style="margin-top:10px;">

                            <div class="col-9  items-table table-responsive" style="height:600px;">

                                <table id="tbody" class="table table-dark table-striped table-bordered table-hover" style="visibility:hidden; ">
                                    <thead class="text-light" style="background:#204b6d">
                                        <tr>
                                        <th scope="col"></th>
                                        <th scope="col">ITEM CODE</th>
                                        <th scope="col">ITEM DESCRIPTION</th>
                                        <th scope="col">QTY</th>
                                        <th scope="col">UOM</th>
                                        <th scope="col">SIZE</th>
                                        <th scope="col">PRICE</th>
                                        <th scope="col" class="vat-display">VAT</th>
                                        <th scope="col" class="vat-display">TOTAL(V)</th>
                                        <th scope="col">TOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>

                               
                            </div><!--items-table-->
                            
                            <div class="col-3 invoice-header" id="invoice-header" style="display:none;  border-left:10px solid; border-color:#204b6d">
                                 <ul class='list-group list-group'>
                                <li class='order-user list-group-item text-light' style="background:#204b6d"><h4>Order details</h4></li>
                                
                                <li class='order-no list-group-item'><b></b></li>
                                <li class='order-branch list-group-item'>BRANCH ID: <b><?php echo $_SESSION['branch']?></b></li>
                                <li class='order-branch-name list-group-item'>BRANCH: <b><?php echo(mysqli_fetch_all(get_branch_name($_SESSION['branch']), MYSQLI_ASSOC))[0]['name'];?></b></li>
                                <li class='order-user-name list-group-item'>USER: <b><?php echo $_SESSION['name'] ?></b></li>
                                <li class='order-user list-group-item'>USER ID: <b><?php echo $_SESSION['uid'] ?></b></li>
                                <li class='order-user list-group-item active text-light' style="background:#204b6d"><h4>Invoice details</h4></li>
                                <li class='invoice-number list-group-item'><b></b></li>
                                <li class='invoice-status list-group-item text-danger'><b></b></li>
                                <li class='inv-wt list-group-item  vat-display'>TOTAL(Without VAT): <span class='invoice-twv font-weight-bold'></span></li>
                                <li class='invvat list-group-item vat-display'>VAT: <span class='invoice-v font-weight-bold'></span></li>
                                <li class='inv-total list-group-item'>TOTAL: <span class='invoice-tv font-weight-bold'></span></li>

                                <li class='list-group-item' style="background:#204b6d"><div class='form-check-inline text-light'><input class='form-check-input text-light' type='radio' name='payment-opt' value='cash' checked>cash</input> 
                                </div>
                                
                                <div class='form-check-inline text-light'><input class='form-check-input' type='radio' name='payment-opt' value='atm'>atm</input>
                                </div></li></ul>
                                </div><!--invoice-header-->
                                

                 </div><!--invoice-->
                </div><!--order-section-->

               
            </div><!--sales-section-->  
      
        </div><!--main-->
        
    </body>
</html>