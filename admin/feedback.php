<?php
 include "connection.php";
 include "navbar.php";
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Feedback</title>
    

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

.box4{
    width:600px;
    height:520px;
    opacity:0.7;
    background-color:black;
    color:white;
    padding:10px;
    margin:5px auto;
}
.form-control{
    height:70px;
    width: 80%;
    margin-left:60px;
}
.scroll{
    width:100%;
    height:300px;
    overflow:auto;
    

}
section .feed_img {
    background-image: url(images/66.jpg);
    background-size: 100%;
    height: 600px;
}
</style>
</head>
<body> 
    <section>
          <div class="feed_img">
          <br><br><br>
          <div class="box4">
            <br>
            <h4 >   &nbsp &nbsp &nbsp       If you have any suggestions or questions please comment below:</h4>
            <form style="" action="" method="post">
                <input class="form-control" type="text" name="comment" placeholder="Write something..." ><br>
                    <input class ="btn btn-default"type="submit" name="submit" value="comment" style="width: 100px;height:35px; margin-left:210px;">
            </form>
    <div class="scroll">
     <?php 
        if(isset($_POST['submit'])){
        $sql="INSERT INTO `comment` VALUES('','Admin','$_POST[comment]');";
        if(mysqli_query($db,$sql)){
            $q="SELECT * FROM `comment` ORDER BY `comment`.`id` DESC";
            $res=mysqli_query($db,$q);
            echo "<table class='table table-bordered'>";
               while($row = mysqli_fetch_assoc($res)){
                echo "<tr>";
                echo "<td style='color:white;'>";
                echo $row['username']; echo "</td>";
                echo "<td style='color:white';>";
                echo $row['comment']; echo "</td>"; echo "</tr>";
            }

        }
        
        }
        else{
            $q="SELECT * FROM `comment` ORDER BY `comment`.`id` DESC";
            $res=mysqli_query($db,$q);
            echo "<table class='table table-bordered'>";
            while($row=mysqli_fetch_assoc($res)){
                echo "<tr>";
                echo "<td style='color:white;'>";
                echo $row['username']; echo "</td>";
                echo "<td style='color:white;'>";
                echo $row['comment']; echo "</td>"; echo "</tr>";
            }

        }
    
    ?>
</div>
          </div>
          </div>
    </section>


    </body>
    </html>