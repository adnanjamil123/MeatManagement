<!doctype html>
<html lang="en">
  <head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  
  <style>
      
      input{
          padding:10px;
          width:310px;
      }
      
      button {
           padding:10px;
          width:400px;
      }
      
  </style>
  <body>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
  <center>
    <div class="id_frm container-fluid">
    
    <h2 style="background:black; color:white; padding:10px;">Login as a Cashier</h2>
    <br/>
    <form action="includes/login.inc.php" method ="POST" class="container-fluid">
        <p> 
            <label for="username">Username:</label> &nbsp;
            <input type="text" id="username" name="username" placeholder= "Username" required/>            
        </p>
        <p> 
            <label for="username">Password:</label>  &nbsp;
            <input type="password" id="password" name="pwd" placeholder= "Password" required/>            
        </p>
        <p>
            <button type="submit" name="submit">Log In</button>     
        </p>
    </form>
    
   
    <?php

if(isset($_GET["error"]))
{
    if($_GET["error"]=="emptyinput")
    {
        echo "<div class='alert alert-primary w-50' role='alert'>
        Please fill form, there are empty fields.
        </div>";
    }else if($_GET["error"]=="wrongpassword")
    {
        echo "<div class='alert alert-warning w-50' role='alert'>
        Wrong password Entered.
    </div>";
    
    }else if($_GET["error"]=="wronglogin")
    {
        echo "<div class='alert alert-warning w-50' role='alert'>
        Wrong Username Entered.
    </div>";
    } 
    else if($_GET["error"]=="inactiveusername")
    {
        echo "<div class='alert alert-danger w-50' role='alert'>
        User is inactive.
    </div>";
    } 
}
?>
</div>
  </center>
  </body>
</html>