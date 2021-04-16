<?php
include "connection.php";
include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style type="text/css">
    .wrapper{
        width:450px;
        height:600px;
        margin: 30px  auto;
        padding:20px;
        color:black;
        background-color:#be3232;
    }
    </style>
</head>
<body style="background-color:#E7BA4E ;">
    <div class="container">
    <form action=""  method="post">
    <button clas="btn btn-default" style="float:right;width:70px; margin-top:20px;" name="submit1">Edit</button>
    </form>
    <div class="wrapper">
    <?php
    if(isset($_POST['submit1'])){
        ?>
        <script type="text/javascript">
   window.location="edit.php";
   </script>
        <?php
    }
    
    $q=mysqli_query($db,"SELECT * FROM admin where username='$_SESSION[login_user]';");
    ?>
    <h1 style ="text-align:center;margin-top:40px;">My Profile</h1>
    <?php
    $row=mysqli_fetch_assoc($q);
    echo "<div style='text-align:center;'><img class='img-circle profile_img' height=110 width=120 src='images/".$_SESSION['pic']."'></div>"

    ?>
    <div style="text-align:center;"><b>Welcome</b>
    <h4>
    <?php
    echo $_SESSION['login_user'];?>
    </h4>
    </div>

    <?php  
    echo "<b>";
    echo "<table class='table'>";
   
    echo "<tr>";
    echo "<td>";
    echo "<b> First Name:</b>";
    echo "</td>";
    echo "<td>";
    echo $row['first'];
    echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>";
    echo "<b> last Name:</b>";
    echo "</td>";
    echo "<td>";
    echo $row['last'];
    echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>";
    echo "<b> Username:</b>";
    echo "</td>";
    echo "<td>";
    echo $row['username'];
    echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>";
    echo "<b> Password:</b>";
    echo "</td>";
    echo "<td>";
    echo $row['password'];
    echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>";
    echo "<b> Email:</b>";
    echo "</td>";
    echo "<td>";
    echo $row['email'];
    echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>";
    echo "<b> Contact:</b>";
    echo "</td>";
    echo "<td>";
    echo $row['phone'];
    echo "</td>";
    echo "</tr>";
    echo "</table>";
    echo "</b>";
    ?>
    </div>
    </div>
    </body>
</html>