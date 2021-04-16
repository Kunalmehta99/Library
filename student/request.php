<?php
 include "connection.php";include "navbar.php";

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Request</title>
 <style>
 .navbar{
    position: relative;
    min-height: 50px;
    margin-bottom: 0px;
    border: 1px solid transparent;
    background-color: black;
}
.navbar-nav>li>a {
    padding-top: 75px;
    padding-bottom: 15px;

}
.srch{
    padding-left:1100px;
    margin-top:25px;
}
.srch1{
  padding-left:1100px;
}
.btn{
    margin:0px 0px;
    width:40px;
}
body {
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
  height:800px;
}

.sidenav {
    margin-top:204px;
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: black;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
    background-color:magenta;
  color: #f1f1f1;
  margin-left:30px;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.img-circle{
    margin-left:15px;
}
.h:hover{
    background-color:#6db6b9e;
    width:300px;
    color:white;
    height:50px;
}

</style>
 </head>
 <body>
     <!----------------------------------side nav----------------------------------------------->
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div style="color:white;margin-left:70px;font-size:25px;">
            <?php
            if(isset($_SESSION['login_user'])){
            echo "<img class='img-circle profile_img' height=120 width=120 src='images/".$_SESSION['pic']."'>";
            echo "</br>";
            
            echo "Welcome ".$_SESSION['login_user'];
                        }            ?>
            </div>
  
 <div class="h"> <a href="books.php">Books</a></div>
 <div class="h"><a href="request.php">Book Request</a></div>
 <div class="h"><a href="expired.php">Expired List</a></div>
</div>

<div id="main">
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "400px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>
<?php

if(isset($_SESSION['login_user'])){
    $q=mysqli_query($db,"SELECT * from issue_book where username = '$_SESSION[login_user]' and approve=''  ;");
    if(mysqli_num_rows($q)==0){
        echo "There is no pending request.";
    }
    else{
        echo "</br></br>";
        echo "</br></br>";
        echo "<table class='table table-bordered table-hover'>";
echo "<tr style='background-color:#6db6b9e6;'>";
       echo "<th>";echo "Book-ID"; echo"</th>";
       echo "<th>";echo "Approve Status"; echo"</th>";
       echo "<th>";echo "Issue Date"; echo"</th>";
    
       echo "<th>";echo "Return Date"; echo"</th>";
     
    echo"</tr>" ;
    
    while($row=mysqli_fetch_assoc($q)){
    echo "<tr>";

    echo "<td>";echo $row['bid']; echo"</td>";
    echo "<td>";echo $row['approve']; echo"</td>";
    echo "<td>";echo $row['issue']; echo"</td>";
    echo "<td>";echo $row['return']; echo"</td>";
   
    echo "</tr>";

    }
    echo "</table>";
}}
else {
    echo "</br></br></br>";
    echo "<h2><b>";

    echo "Please Login First To See The Request.";
    echo "<h2><b>";
}
    ?>
 </body>
 </html>