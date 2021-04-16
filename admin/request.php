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
    padding-left:900px;
    margin-top:25px;
}
.srch1{
  padding-left:1100px;
}

body {
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
  height:800px;
  background-color:maroon;
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
.container{
    color:white;
    opacity:.8;
    background-color:black;
    width:1300px;
    padding:0px;
}
.form-control{
    width:300px;
    
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
            <div class="h"><a href="add_book.php">Add Books</a></div>
 <div class="h"> <a href="books.php">Books</a></div>
 <div class="h"><a href="request.php">Book Request</a></div>
 <div class="h"><a href="issue_info.php">Issue Information</a></div>
 <div class="h"><a href="expired.php">Expired List</a></div>
</div>

<div id="main">
  
  <span style="font-size:30px;cursor:pointer;color:white;" onclick="openNav()">&#9776; open</span>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "400px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "maroon";
}
</script>
</br>
</br>
<div class="container">
<div class="srch" >
       <form class="navbar-form" method="post" name="form1">
           <input class="form-control"  type="text" name="username" placeholder="Username" required=""></br>
           <input class="form-control"  type="text" name="bid" placeholder="BID" required="" style="margin-top:10px"></br>
           <button style="background-color:#6db6b9e6;width:70px;margin-top:10px;margin-left:50px;" type="submit" name="submit" class="btn btn-default">
           Submit
</button>
</form>
</div>
<div class="container">
<h3 style="text-align:center;">Request Of Book</h3>
<?php
if(isset($_SESSION['login_user'])){
$sql="SELECT student.username,roll,books.bid,name,authors,edition,status FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve='' ";
$res= mysqli_query($db,$sql);
if(mysqli_num_rows($res)==0){
    echo "<h2><b>";
    echo "There is no pending request.";
    echo "<h2><b>";
}

else{
    echo " </br>";
        echo "<table class='table table-bordered table-hover'>";
        echo "<tr style='background-color:#6db6b9e6;color:black;'>";
       echo "<th>";echo "Student Username"; echo"</th>";
       echo "<th>";echo "RollNo."; echo"</th>";
       echo "<th>";echo "BID"; echo"</th>";
       echo "<th>";echo "Book Name"; echo"</th>";
       echo "<th>";echo "Authors Name"; echo"</th>";
       echo "<th>";echo "Edition"; echo"</th>";
       echo "<th>";echo "Status"; echo"</th>";
     
    echo"</tr>" ;
    
    while($row=mysqli_fetch_assoc($res)){
    echo "<tr style='background-color:green;color:black;'>";

    echo "<td>";echo $row['username']; echo"</td>";
    echo "<td>";echo $row['roll']; echo"</td>";
    echo "<td>";echo $row['bid']; echo"</td>";
    echo "<td>";echo $row['name']; echo"</td>";
    echo "<td>";echo $row['authors']; echo"</td>";
    echo "<td>";echo $row['edition']; echo"</td>";
    echo "<td>";echo $row['status']; echo"</td>";
   
    echo "</tr>";

    }
    echo "</table>";

}
}
else{
 ?>
 <h4 style="text-align:center;color:yellow;">You need to login to see request.</h4>
 
 <?php
}
if(isset($_POST['submit'])){
    $_SESSION['name']=$_POST['username'];
    $_SESSION['bid']=$_POST['bid'];

?>
<script type="text/javascript">
   window.location="approve.php";
   </script>
   
  <?php
}
    ?>
    </div>
 </body>
 </html>