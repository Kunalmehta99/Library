<?php
 include "connection.php";include "navbar.php";

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books</title>
    

     <!--style CSS-->
     <link rel="stylesheet" type="text/css" href="style_project.css">
     <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style type="text/css">
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
  color: #f1f1f1;
  background-color:magenta;
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
  <div style="color:white;margin-left:65px;font-size:25px;">
            <?php
            if(isset($_SESSION['login_user'])){
            echo "<img class='img-circle profile_img' height=120 width=120 src='images/".$_SESSION['pic']."'>";
            echo "</br>";
            
            echo "Welcome ".$_SESSION['login_user'];
                        }            ?>
            </div>
  
            <div class="h"><a href="books.php">Books</a></div>
            <div class="h"> <a href="request.php">Book Request</a></div>
            
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

     <!--------------------------------search bar------------------------------------------->
   <div class="srch" >
       <form class="navbar-form" method="post" name="form1">
           <input class="form-control"  type="text" name="search" placeholder="search books..." required="">
           <button style="background-color:#6db6b9e6;" type="submit" name="submit" class="btn btn-default">
           <span class="glyphicon glyphicon-search"></span>
</button>
</form>
</div>
<!-----------------------------------------request a book----------------------------------->
<div class="srch1" >
       <form class="navbar-form" method="post" name="form1">
           <input class="form-control"  type="text" name="bid" placeholder="Enter Book ID">
           <button style="background-color:#6db6b9e6;width:80px;" type="submit" name="submit1" class="btn btn-default">
           Request
</button>
</form>
</div>

<h2 style="padding-left:630px;">LIST OF BOOKS</h2>
<?php
if(isset($_POST['submit'])){
    $q=mysqli_query($db,"SELECT * from books where name like '%$_POST[search]%'");
    if(mysqli_num_rows($q)==0){
        echo "Sorry! No book found. Try searching again.";
    }
    else{
        echo "<table class='table table-bordered table-hover'>";
echo "<tr style='background-color:#6db6b9e6;'>";
       echo "<th>";echo "ID"; echo"</th>";
       echo "<th>";echo "Book Name"; echo"</th>";
       echo "<th>";echo "Authors Name"; echo"</th>";
       echo "<th>";echo "Edition"; echo"</th>";
       echo "<th>";echo "Status"; echo"</th>";
       echo "<th>";echo "Quantity"; echo"</th>";
       echo "<th>";echo "Department"; echo"</th>";
    echo"</tr>" ;
    
    while($row=mysqli_fetch_assoc($q)){
    echo "<tr>";

    echo "<td>";echo $row['bid']; echo"</td>";
    echo "<td>";echo $row['name']; echo"</td>";
    echo "<td>";echo $row['authors']; echo"</td>";
    echo "<td>";echo $row['edition']; echo"</td>";
    echo "<td>";echo $row['status']; echo"</td>";
    echo "<td>";echo $row['quantity']; echo"</td>";
    echo "<td>";echo $row['department']; echo"</td>";
    echo "</tr>";

    }
    
echo "</table>";
    }
}
/*-----------------------------------if button is not pressed------------------*/
else{
$res=mysqli_query($db,"SELECT * FROM `books` ORDER BY `books`.`name` ASC;");
echo "<table class='table table-bordered table-hover'>";
echo "<tr style='background-color:#6db6b9e6;'>";
       echo "<th>";echo "ID"; echo"</th>";
       echo "<th>";echo "Book Name"; echo"</th>";
       echo "<th>";echo "Authors Name"; echo"</th>";
       echo "<th>";echo "Edition"; echo"</th>";
       echo "<th>";echo "Status"; echo"</th>";
       echo "<th>";echo "Quantity"; echo"</th>";
       echo "<th>";echo "Department"; echo"</th>";
    echo"</tr>" ;
    
    while($row=mysqli_fetch_assoc($res)){
    echo "<tr>";

    echo "<td>";echo $row['bid']; echo"</td>";
    echo "<td>";echo $row['name']; echo"</td>";
    echo "<td>";echo $row['authors']; echo"</td>";
    echo "<td>";echo $row['edition']; echo"</td>";
    echo "<td>";echo $row['status']; echo"</td>";
    echo "<td>";echo $row['quantity']; echo"</td>";
    echo "<td>";echo $row['department']; echo"</td>";
    echo "</tr>";

    }
    
echo "</table>";
}

if(isset($_POST['submit1'])){
  if(isset($_SESSION['login_user'])){
    
    mysqli_query($db,"INSERT INTO issue_book Values('$_SESSION[login_user]','$_POST[bid]','','','');");
    ?>
  <script type="text/javascript">
     window.location="request.php";
     </script>
     
    <?php

  }
  else{
    ?>
  <script type="text/javascript">
     alert("You need to login to Request a book .");
     </script>
     
    <?php
  }
}
?>

</div>
</body>
</html>