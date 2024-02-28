<?php
$servername="127.0.0.2:3307";
$username="root";
$password="";
$database="dbamit1";

$conn=mysqli_connect($servername,$username,$password,$database);

if(!$conn)
{
    die("sorry connection did'nt established".mysqli_connect_error()); 
}
else
echo "";
