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

<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background-image: url('login bg.jpg');
        }

        .login-card {

            width: 400px;
            background-color: #47474784;
            margin: 0px auto;
            border-radius: 9px;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            min-height: 440px;

        }

        .log_head {
            background: rgba(21, 160, 131, 255);
            width: 400px;
            height: 120px;
            border-radius: 9px 9px 0 0px;
        }

        .login-card h1 {
            text-align: center;
            font-family: open Sans;
            color: #FFFFFF;
            font-weight: 700px;
            font-size: 20px;
            line-height: 27px;
            padding-top: 51px;

        }

        .lock {
            padding-left: 181px;
            width: 30px;
            height: 37px;
            padding-top: 10px;
        }

        .log_body {
            padding: 40px 20px 20px 20px;
        }

        .log_user {
            background: #FEFEFE;
            color: #999999;
            border-radius: 10px;
            width: 349px;
            height: 31px;
            padding: 5px;
            font-family: open Sans;
            font-weight: 700px;
            font-size: 15px;
            border: none;
        }

        .log_Pass {
            background: #FEFEFE;
            color: #999999;
            border-radius: 10px;
            width: 349px;
            height: 31px;
            padding: 5px;
            font-family: open Sans;
            font-weight: 700px;
            font-size: 15px;
            border: none;
        }


        .login-submit {
            background: rgba(21, 160, 131, 255);
            border: none;
            border-radius: 10px;
            width: 359px;
            height: 36px;
            cursor: pointer;
            font-family: open Sans;
            font-weight: 700px;
            font-size: 15px;
            color: #FFFFFF;
        }
    </style>
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

    <br />
    <br />

    <div class="login-card">
        <div class="log_head">
            <h1><b>LOGIN FORM</b></h1>

        </div>

        <div class="log_body">
            <form action="#" method="get">
                <table width="200" border="0" align="center">
                    <tr>
                        <td><input placeholder="User Name" type="text" name="loginid" class="log_user"></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td><input placeholder="Password" type="password" name="pass" class="log_Pass"></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td><input name="remember" type="checkbox" value="Remember Me"> Keep me logged in</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="login" class="login-submit" value="SIGN IN"></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Don't have an account ? <a href="register.html" rel="register">Sign Up</a></td>
                    </tr>
                </table>

            </form>
        </div>