<?php
 include "connection.php";include "navbar.php";

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Approve Request</title>
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
    width:1100px;
    padding:0px;
}
.form-control{
    width:400px;
    
}
.approve{
    
    margin-left:350px;
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
<div class="container">
<h3 style="text-align:center;">APPROVE REQUEST</h3>
</br>
</br>
<form class="Approve" method="post" name="form1">
           <input class="form-control"  type="text" name="approve" placeholder="Approve or Not" required=""></br>
           <input class="form-control"  type="text" name="issue" placeholder="Issue Date yyyy-mm-dd" required="" style="margin-top:10px"></br>
           <input class="form-control"  type="text" name="return" placeholder="Return Date yyyy-mm-dd" required="" style="margin-top:10px"></br>
           <button style="background-color:white;margin-left:150px;width:70px;" type="submit" name="submit" class="btn btn-default">
           Submit
</button>
</br>
</br>
</form>
</div>
<?php
if(isset($_POST['submit'])){
    
    mysqli_query($db,"UPDATE `issue_book` SET `approve` ='$_POST[approve]',`issue` ='$_POST[issue]',`return`='$_POST[return]' WHERE username='$_SESSION[name]' and bid='$_SESSION[bid]';");
    mysqli_query($db,"UPDATE books SET quantity =quantity-1 where bid= '$_SESSION[bid]';");

    $res=mysqli_query($db,"SELECT quantity from books where bid= '$_SESSION[bid]';");
    while($row=mysqli_fetch_assoc($res)){
        if($row['quantity']==0){
            mysqli_query($db,"UPDATE books SET status ='not-available' where bid= '$_SESSION[bid]';");
        }
    }
    ?>
    <script type=text/javascript>
    window.location("request.php");
    </script>
    <?php
}
?>
</body>
</html>