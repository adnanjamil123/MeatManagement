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

   
    <div class="container-fluid vh-100">

        <nav class="navbar navbar-dark bg-info">

            <h2 class="navbar-brand">Meat Management System</h2>
    
        </nav>
        

        <div class="row sales-section container-fluid" style="margin:auto">

            <div class="row col-4  justify-content-center items-section bg-dark" id="menu">
                <!-- <script>
                    for (let index = 0; index < items.length; index++) {
                        
                        document.getElementById("menu").innerHTML += "<button style='margin:2px; width:100%' class='col-5 btn btn-success' value=" + index + ">" + (index+1)+". " + items[index] + "</button> </br>";                 
                    }
                </script> -->

                <?php

                    create_buttons();
                    
                ?>


            </div>

               <div class="col-8  order-section">
                    <div class="col-12 row  justify-content-between btn-group btn-group-lg" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-secondary col-2">NEW</button>
                        <button type="button" class="btn btn-secondary col-2">CLEAR</button>
                        <button type="button" class="btn btn-secondary col-2">SAVE</button>
                        <button type="button" class="btn btn-secondary col-2">PRINT</button>
                        <button type="button" class="btn btn-secondary col-2">SAVE&PRINT</button>
                        </div>
                    
                </div>

        </div>
        
    </div>
  
  
  </body>
</html>