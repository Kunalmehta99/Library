<?php
 include "connection.php";include "navbar.php";

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Message</title>
     <style type="text/css">
     body{
         background-color:red;
         background-image:url("images/msg.png");
     }
     .wrapper{
         height:600px;
         width:550px;
         background-color:black;
         opacity:.8;
         color:white;
         margin:10px auto;
         padding:10px;
         text-align:center;
     }
     .form-control{
         height:47px;
         width:76%;
     }
     .msg{
         height:450px;
         overflow-y:scroll;
         
     }
     .chat{
         display:flex;
         flex-flow:row wrap;
     }
     .user .chatbox{
         height:50px;
         width:440px;
         padding:13px 10px;
         background-color:#6e076e;
         border-radius:10px;
         order:-1;
         color:white;
     }
     .admin .chatbox{
         height:50px;
         width:440px;
         padding:13px 10px;
         background-color:#ca3333;
         color:white;
         border-radius:10px;
         order:1;
     }
     </style>
 </head>
 <body>
 <?php
     if(isset($_POST['submit'])){
         mysqli_query($db,"INSERT into `library`.`message` VALUES ('','$_SESSION[login_user]','$_POST[msg]','no','student');");
         $res=mysqli_query($db,"SELECT * from message where username ='$_SESSION[login_user]'");
     }
     else{
         $res=mysqli_query($db,"SELECT * from message where username ='$_SESSION[login_user]'");
     }
     ?>
     <div class="wrapper">
     <div style="height:70px; width:100%;background-color:#2eac8b;">
     <h3 style="margin-top:-5px;padding-top:13px;">Admin</h3>
     </div>
     <div class="msg">
     <br>
     <?php
          while($row=mysqli_fetch_assoc($res)){
              if($row['sender']=='student')
                 {
          
     ?>
     <br>
     <!-------------------------------student--------------------------->
     <div class="chat user">
     <div style="float:left;paddding-top:4px;">
     &nbsp 
     <?php
                echo "<img class='img-circle profile_img' height=42 width=42 src='images/".$_SESSION['pic']."'>";
                
            ?>
            &nbsp
     </div>
     <div class="chatbox" style="float:left;text-align:left;">
     
     <?php
     echo $row['msg'];

     ?>
     </div>
     </div>
     <?php
                 }
                 else{

                 ?>
     </br>
     <!-----------------------------admin-------------------------------->
     <div class="admin chat">
     <div style="float:right;paddding-top:4px;">
     &nbsp 
     <img style="height:40px;width:40px;border-radius:50%;" src="images/p.jpg">
            &nbsp
     </div>
     <div class="chatbox" style="float:left;text-align:left;">
     <?php
     echo $row['msg'];

     ?>
     </br>
     </div>
     </div>
     <?php
          }
        }
          ?>
     </div>
     
     <div style="height:100px;padding-top:10px;">
     <form action ="" method="post">
     <input type="text" name="msg" class="form-control" required="" placeholder="Write Message..." style="float:left">
     <button class="btn btn-defaut btn-info btn-lg" type="submit" name="submit"
     style="text-align:center;"><span class="glyphicon glyphicon-send"></span> &nbsp Send</button>
     </form>
     </div>
     

 </body>
 </html>