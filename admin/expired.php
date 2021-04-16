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
    background-color:violet;
  color: #f1f1f1;
  margin-left:5px;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 0px;
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
.scroll{
    width:100%;
    
    overflow:auto;
}
.srch{
    margin-left:900px;
    margin-top:10px;
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

<?php
if(isset($_SESSION['login_user'])){
    ?>
    <div style="float:left;padding:25px;">
    <form method="post" action="">
    <button name="submit2" type="submit" class="btn btn-default" style="background-color:red;color:white;">RETURNED</button> &nbsp &nbsp
    <button name="submit3" type="submit" class="btn btn-default" style="background-color:green;color:white;">EXPIRED</button>
    </form>
   </div>
   
    <div class="srch" >
       <form class="navbar-form" method="post" name="form1">
           <input class="form-control"  type="text" name="username" placeholder="Username" required=""></br>
           <input class="form-control"  type="text" name="bid" placeholder="BID" required="" style="margin-top:10px"></br>
           <button style="background-color:#6db6b9e6;width:70px;margin-top:10px;margin-left:50px;" type="submit" name="submit" class="btn btn-default">
           Submit
</button>
</form>
</div>
    <?php

    if(isset($_POST['submit'])){
      $res=mysqli_query($db,"SELECT * FROM `issue_book` where username='$_POST[username]' and bid='$_POST[bid]' ;");
      
      while($row=mysqli_fetch_assoc($res))
      {
        $d= strtotime($row['return']);
        $c= strtotime(date("Y-m-d"));
        $diff= $c-$d;
1
        if($diff>=0)
        {
          $day= floor($diff/(60*60*24)); 
          $fine= $day*.10;
        }
      }
          $x= date("Y-m-d"); 
          mysqli_query($db,"INSERT INTO `fine` VALUES ('$_POST[username]', '$_POST[bid]', '$x', '$day', '$fine','not paid') ;");




        $var1='<p style="color:yellow;background-color:green;">RETURNED</p>';
        mysqli_query($db,"UPDATE issue_book SET approve='$var1' where username='$_POST[username]'and bid='$_POST[bid]';");
        mysqli_query($db,"UPDATE books SET quantity = quantity+1 where bid='$_POST[bid]';");

    }
}
?>
<h3 style="text-align:center;">Date Expired List</h3>
<?php
$c=0;
 if(isset($_SESSION['login_user'])){
    $ret='<p style="color:yellow;background-color:green;">RETURNED</p>';
    $exp='<p style="color:yellow;background-color:red;">EXPIRED</p>';
    $sql="SELECT student.username,roll,books.bid,name,authors,edition,approve,issue,issue_book.return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve !='' and issue_book.approve !='Yes'  ORDER BY `issue_book`.`return` DESC";
    

    if(isset($_POST['submit2'])){
        $sql="SELECT student.username,roll,books.bid,name,authors,edition,approve,issue,issue_book.return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve ='$ret'  ORDER BY `issue_book`.`return` DESC";
        $res=mysqli_query($db,$sql);
    }
   
   else if (isset($_POST['submit3'])){
    $sql="SELECT student.username,roll,books.bid,name,authors,edition,approve,issue,issue_book.return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve ='$exp'  ORDER BY `issue_book`.`return` DESC";
    $res=mysqli_query($db,$sql);
   }
   
   else{
    $sql="SELECT student.username,roll,books.bid,name,authors,edition,approve,issue,issue_book.return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve !='' and issue_book.approve !='Yes'  ORDER BY `issue_book`.`return` DESC";
    $res=mysqli_query($db,$sql);
   }

    
 echo " </br>";
 echo "<div class='scroll'>";
 echo "<table class='table table-bordered table-hover'>";
 
 echo "<tr style='background-color:#6db6b9e6;color:black;'>";
echo "<th>";echo " Username"; echo"</th>";
echo "<th>";echo "RollNo."; echo"</th>";
echo "<th>";echo "BID"; echo"</th>";
echo "<th>";echo "Book Name"; echo"</th>";
echo "<th>";echo "Authors Name"; echo"</th>";
echo "<th>";echo "Edition"; echo"</th>";
echo "<th>";echo "Status"; echo"</th>";
echo "<th>";echo "Issue Date"; echo"</th>";
echo "<th>";echo "Return Date"; echo"</th>";


echo"</tr>" ;

while($row=mysqli_fetch_assoc($res)){
    

echo "<tr style='background-color:#e79b66;color:black;'>";

echo "<td>";echo $row['username']; echo"</td>";
echo "<td>";echo $row['roll']; echo"</td>";
echo "<td>";echo $row['bid']; echo"</td>";
echo "<td>";echo $row['name']; echo"</td>";
echo "<td>";echo $row['authors']; echo"</td>";
echo "<td>";echo $row['edition']; echo"</td>";
echo "<td>";echo $row['approve']; echo"</td>";
echo "<td>";echo $row['issue']; echo"</td>";
echo "<td>";echo $row['return']; echo"</td>";

echo "</tr>";

}

echo "</table>";
echo "</div>";
 }
 else{
     ?>
     <h3 style="text-align:center;">Login To See The Issue Information</h3>
     <?php
 }

?>
</div>
</body>
</html>