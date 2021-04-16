<?php
$db=mysqli_connect("localhost","root","","library");  /* servername,username,password,database name*/
if(!$db){
    die("connection failed: " . mysqli_connect_error());
}
echo "connected successfully";
  ?>