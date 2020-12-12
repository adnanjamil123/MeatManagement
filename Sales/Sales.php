<?php

require_once ('db.php');
require_once ('query_functions.php');
require_once ('functions.php');
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="global.js"></script>

        <script>
              
           
           
        </script>
    
        <div class="main container-fluid vh-100">

                <nav class="navbar navbar-dark bg-info">

                    <h2 class="navbar-brand">Meat Management System</h2>
            
                </nav>

            <div class="row sales-section container-fluid" style="margin:auto">

                <div class="row col-4  justify-content-center items-section bg-dark" id="menu">
                    <?php

                        create_buttons();
                        
                    ?>
                </div><!--item-section-->

                <div class="modal modal" id="itemsModal">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header bg-info text-light">
                                    <h3 class="modal-title">item description</h3>
                                    <button type="button" class="close"><span>&times;</span></button>
                                </div><!--modal-header-->
                                    <div class="row modal-body justify-content-between">
                                        <div class="col-3">
                                            <div><label for="fprice">Price:</label><input id="fprice"type = "number" class="w-100" step="0.01" autofocus></input></div>
                                            
                                        </div>
                                        <div class="col-3">
                                            <div><label for="fqty">Qty:</label><input id="fqty"type = "number" value=1 class="w-100"></input></div>
                                            
                                        </div>
                                        <div class="my-auto col-3">
                                        <span id="fuom" class="modal-uom w-100"></span>
                                        </div>
                                        
                                        <div class="row col-3 form-check">

                                             <label class="col form-check-label">
                                                <input type="radio" class="form-check-input" name="optradio" checked>None
                                            </label>

                                            <label class="col form-check-label">
                                                <input type="radio" class="form-check-input" name="optradio">BIG
                                            </label>
                                           
                                            <label class="col form-check-label">
                                                <input type="radio" class="form-check-input" name="optradio">SMALL
                                            </label>
                                            
                                            <label class="col form-check-label">
                                                <input type="radio" class="form-check-input" name="optradio">LARGE
                                            </label>

                                        </div>
                                    </div><!--modal-body-->
                                <div class="modal-footer">
                                    <button class="btn btn-secondary">
                                            Confirm 
                                    </button>
                                </div><!--modal-footer-->
                            </div><!--modal-content-->
                        </div><!--modal-dialog-->
                    </div><!--modal-->

                <div class="col-8  order-section">

                        <div class="col-12 row  justify-content-between btn-group btn-group-lg" role="group" aria-label="Basic example">

                            <button type="button" class="btn btn-secondary col-2" onclick="updateDiv(event)">NEW</button>
                            <button type="button" class="btn btn-secondary col-2">CLEAR</button>
                            <button type="button" class="btn btn-secondary col-2">SAVE</button>
                            <button type="button" class="btn btn-secondary col-2">PRINT</button>
                            <button type="button" class="btn btn-secondary col-2">SAVE&PRINT</button>

                        </div><!--order-section-->
                        
                </div><!--order-section-->

            </div><!--sales-section-->  

        </div><!--main-->
    </body>
</html>