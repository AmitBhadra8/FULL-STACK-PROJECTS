<?php 
$login=false;
$showerr=false;
if($_SERVER["REQUEST_METHOD"]=="POST")
{
  require 'partials/_dbconnect.php';
  $username=$_POST["username"];
  $password=$_POST["Password1"];
  
  $sql="Select * from loginform where username='$username' AND password='$password' ";
  $result=mysqli_query($conn,$sql);
  $num=mysqli_num_rows($result);

  if($num==1){
  $login=true;
  $_SESSION['loggedin']=true;
  $_SESSION['username']=$username;
  header("location: welcome.php");
    }

  else 
  {
    $showerr="passwords do not match";
  }
}
   

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Login</title>
    
  </head>
  <body>
    <?php require 'partials/_navbar.php'; ?>
    <?php
    if($login){
      echo '<div class="alert alert-success" role="alert">
      YOU ARE LOGGED IN!!!
  </div>';
    }
    if($showerr){
      echo '<div class="alert alert-danger" role="alert">
      ERROR! INVALID CREDENTIALS TRY AGAIN
    </div>';
    }
     
?>
    <div><h2 class="text-center">SIGN UP TO OUR WEBSITE</h2></div>
    <div>
    <form action="/AMITPROGRAMS/logsys/login.php" method="POST">
  <div class="form-group col-md-6 ">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
   
  </div>
  <div class="form-group  col-md-6 ">
    <label for="Password1" class="form-label">Password</label>
    <input type="password" class="form-control" id="Password1" name="Password1">
  </div>
  
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>