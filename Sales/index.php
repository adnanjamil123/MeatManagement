
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

<html lang="ar">
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
        <script src="jscript/language.js"></script>
        <script src="jscript/global.js"></script>
        <script src="jscript/trap_focus.js"></script>
        <script src="jscript/functions.js"></script>
        
       
        
        <script>
              
             
           
        </script>

        <style>

        .vat-display{
           /* display:none;  */
        }
        .list-group-item{
            padding: .25rem 1rem;
            background:azure;
        }
        </style>
    
        <div class="main container-fluid" style="background:#204b6d;height:97vh">

        <div class="modal" id="itemsModal">
                        <div class="modal-dialog modal-dialog-centered" aria-modal="true">
                            <div class="modal-content">
                                <div class="modal-header text-light" style="background:#204b6d">
                                    <h3 class="modal-title">item description</h3>
                                    <button type="button" data-dismiss="modal" class="close text-white"><span>&times;</span></button>
                                </div><!--modal-header-->
                                    <div class="row modal-body justify-content-center">
                                        <div class="col-3">
                                            <div><label for="fprice" data-key="lng-price">Price:</label><input id="fprice"type = "number" class="w-100" step="1" autofocus></input></div>
                                            
                                        </div>
                                        <div class="col-3">
                                            <div><label for="fqty" data-key="lng-qty">Qty:</label><input id="fqty"type = "number" value=1 class="w-100 fqty" step="1"></input></div>
                                            
                                        </div>
                                        <div class="col-1 pt-4">
                                        <span id="fuom" class="modal-uom" data-key="lng-kilo"></span>
                                        </div>
                                        
                                        <div class="row col-5 form-check item-sizes pl-5">


                                            

                                        </div>
                                    </div><!--modal-body-->
                                <div class="modal-footer">
                                    <button class="btn-confirm btn text-light" style="background:#204b6d" data-key="lng-add">
                                            Confirm 
                                    </button>
                                </div><!--modal-footer-->
                            </div><!--modal-content-->
                        </div><!--modal-dialog-->
                    </div><!--modal-->

                <nav class="navbar navbar-expand-md navbar-dark" style="background:#204b6d">

                     <a class="navbar-brand" href="#">MMS |</a>   
                     <span  class="navbar-text text-white" data-key="lng-logo"><strong>Meat Management |</strong> </span>   
                     
                  
                       <p class="ml-auto">
                            <span class="navbar-text"><?php echo ("<p class='text-white' style = 'text-transform:uppercase;' id='user-data' 
                            data-username='".$_SESSION["name"]."' data-uid='".$_SESSION["uid"]."' data-branch='".$_SESSION["branch"]."'>".$_SESSION["name"]."</p>"); ?>
                            <a class="nav-link" href="includes/logout.inc.php" data-key="lng-log">Log out</a></span>
                       </p>
                 

                </nav>

            <div class="row sales-section bg-light justify-content-around" style="margin:auto, height:90vh, background:aliceblue;">

                <div class="row col-3 justify-content-center items-section" id="menu" style="height:90vh; border-right:10px solid;background:aliceblue; border-color:#204b6d">
                    
                <div class="col-12 row justify-content-between" style="margin-top:5px" >
                        
                            <div class="dropdown col-5 ">
                            <button class="item-dropdown  btn dropdown-toggle w-100 text-light" data-toggle="dropdown" style="background:#204b6d" data-key="lng-more">More</button>
                            <ul class="dropdown-menu pl-2  overflow-auto" role="menu" aria-labelledby="dLabel" style="max-height:600px; background:lightgray">            
                                    
                            <?php
                                // arguements category(general or special), optional limit, optional offset, optional grid column
                                create_buttons(1, 50, 15, 11,"white","text-black");

                            ?>
                                
                            </ul>
                            </div>   
                        
                            <div class="dropdown col-5">
                            <button class="item-dropdown  btn dropdown-toggle w-100 text-light" data-toggle="dropdown" style="background:#204b6d" data-key="lng-special">Special</button>
                            <ul class="dropdown-menu pl-2 overflow-auto" role="menu" aria-labelledby="dLabel"  style="max-height:600px; background:lightgray">            
                                 <?php
                                    // arguements category(general or special), optional limit, optional offset, optional grid column
                                    create_buttons(2,50,0,11,"white","text-black");
                                ?>
                                
                            </ul>
                            </div>   
                       
                </div>

                    <?php
                        // arguements category(general or special), optional limit, optional offset, optional grid column
                        create_buttons(1);
                        
                    ?>


                </div><!--item-section-->

                

                <div class="col-9  order-section">

                        <div class="row col-12 order-buttons justify-content-between btn-group btn-group-sm bg-light w-100" role="group" aria-label="Basic example" style="margin-top:10px">

                            <button type="button" class="new btn  col-2 text-light" data-key="btn-new" style="background:#204b6d">NEW</button>
                            <button type="button" class="clear btn col-2 text-light" data-key="btn-clear" style="background:#204b6d">CLEAR</button>
                            <button type="button" class="btn  col-2 save text-light" data-key="btn-save" style="background:#204b6d">SAVE</button>
                            <button type="button" class="print btn  col-2 text-light" data-key="btn-print" style="background:#204b6d">PRINT</button>
                            <!-- <button type="button" class="save-print btn col-2" data-key="btn-sp"  >SAVE & PRINT</button> -->

                        </div><!--order-buttons-->
                            
                        <div class="row invoice" style="margin-top:10px;">

                            <div  class="col-9  items-table table-responsive" style="height:600px;">

                                <table id="tbody" class="table table-dark table-striped table-bordered table-hover" style="visibility:hidden;">
                                   
                                    <thead class="text-light" style="background:#204b6d">
                                        <tr>
                                        <th scope="col"></th>
                                        <th scope="col" data-key="lng-code">ITEM CODE</th>
                                        <th scope="col" data-key="lng-desc">ITEM DESCRIPTION</th>
                                        <th scope="col" data-key="lng-qty">QTY</th>
                                        <th scope="col"  data-key="lng-uom">UOM</th>
                                        <th scope="col" data-key="lng-size">SIZE</th>
                                        <th scope="col" data-key="lng-price">PRICE</th>
                                        <th scope="col" class="vat-display" data-key="lng-vat">VAT</th>
                                        <th scope="col" class="vat-display" data-key="lng-wvat">TOTAL(V)</th>
                                        <th scope="col" data-key="lng-total">TOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>

                               
                            </div><!--items-table-->
                            
                            <div class="col-3 invoice-header" id="invoice-header" style="display:none;  border-left:10px solid; border-color:#204b6d; height:600px;">
                                 <ul class='list-group list-group'>
                                <li class='order-user list-group-item text-light' style="background:#204b6d" data-key="lng-orderdetails"><h4>Order details</h4></li>
                                
                                <li class='order-no list-group-item' ><b></b></li>
                                <li class='order-branch list-group-item' style='display:none'>id<b><?php echo $_SESSION['branch']?></b></li>
                                <li class='order-branch-name list-group-item'><span data-key="lng-branch">Branch</span><br><b><?php echo(mysqli_fetch_all(get_branch_name($_SESSION['branch']), MYSQLI_ASSOC))[0]['name'];?></b></li>
                                <li class='order-user-name list-group-item'><span data-key="lng-user">USER:</span><br><b><?php echo $_SESSION['name'] ?></b></li>
                                <li class='order-user list-group-item' style='display:none'>USER ID: <b><?php echo $_SESSION['uid'] ?></b></li>
                                <li class='order-user list-group-item active text-light' style="background:#204b6d" data-key="lng-invoicedetails"><h4>Invoice details</h4></li>
                                <li class='invoice-number list-group-item'><b></b></li>
                                <li class='invoice-status list-group-item text-danger'><b></b></li>
                                <li class='inv-wt list-group-item  vat-display'><span data-key="lng-wvat">TOTAL(Without VAT)</span>&#58;&nbsp;<br><span class='invoice-twv font-weight-bold'></span></li>
                                <li class='invvat list-group-item vat-display'><span data-key="lng-vat">VAT</span>&#58;&nbsp;<br><span class='invoice-v font-weight-bold'></span></li>
                                <li class='inv-total list-group-item'><span data-key="lng-total">TOTAL</span>&#58;&nbsp;<br><span class='invoice-tv font-weight-bold'></span></li>

                                <li class='list-group-item' style="background:#204b6d"><div class='form-check-inline text-light'><input class='form-check-input text-light'  type='radio' name='payment-opt' value='cash' checked><span data-key="lng-cash">cash</span></input> 
                                </div>
                                
                                <div class='form-check-inline text-light'><input class='form-check-input' type='radio' name='payment-opt' value='atm'><span data-key="lng-atm">atm</span></input>
                                </div></li></ul>
                                </div><!--invoice-header-->
                                

                 </div><!--invoice-->
                </div><!--order-section-->

               
            </div><!--sales-section-->  
      
        </div><!--main-->
        <footer class="text-center text-lg-start" style="height:3vh;background:#204b6d">
  <!-- Copyright -->
  <div class="text-center text-light" style="background-color: rgba(0, 0, 0, 0.2)">
        <span class="internet-status"><script></script></span>
     </div>
  <!-- Copyright -->
</footer>
    </body>
    
</html>