<?php

  session_start();
    
  $conn = mysqli_connect("localhost","root","");
  mysqli_select_db($conn,"ajax");
  
  $email=$_SESSION["user_id"];

  $query = "UPDATE `user` SET `online`= 0 WHERE `user_id` LIKE '$email'";
  
  mysqli_query($conn,$query);

  session_destroy();
  
  header("Location: login_page.php");

?>
