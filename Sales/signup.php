<!doctype html>
<html lang="en">
  <head>
    <title>Sign Up</title>
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
 
 <section class="signup-form container-fluid">
    <h2>Sign Up</h2>
    
    <form action="includes/signup.inc.php" method = "post">
        <input type="text" name="name" placeholder = "Full Name.."><br>
        <input type="text" name="uid" placeholder = "Username.."><br>
        <input type="text" name="branch" placeholder = "Branch.."><br>
        <input type="password" name="pwd" placeholder = "password.."><br>
        <input type="password" name="pwdrepeat" placeholder = "Repeat password.."><br>
        <button type="submit" name="submit">Sign Up</button>
    </form>
 
    <?php

        if(isset($_GET["error"]))
        {
            if($_GET["error"]=="emptyinput")
            {
                echo "<div class='alert alert-primary w-50' role='alert'>
                Please fill form, there are empty fields.
                </div>";
            }else if($_GET["error"]=="invaliduid")
            {
                echo "<div class='alert alert-warning w-50' role='alert'>
                Username is Invalid, please use proper username.
            </div>";
            
            }else if($_GET["error"]=="passwordsdontmatch")
            {
                echo "<div class='alert alert-warning w-50' role='alert'>
                passwords dont match.
            </div>";
            
            }else if($_GET["error"]=="usernametaken")
            {
                echo "<div class='alert alert-warning w-50' role='alert'>
            Username already Taken.
            </div>";
            
            }else if($_GET["error"]=="none")
            {
                echo "<div class='alert alert-success w-50' role='alert'>
            Signup Succesfully!.
            </div>";
            
            }else if($_GET["error"]=="stmtfailed")
            {
                echo "<div class='alert alert-danger w-50' role='alert'>
            Sonething went Wrong
            </div>";
            
            }
        }
?>
 </section>
 
  </body>
</html>