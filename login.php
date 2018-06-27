<?php
session_start();

$conn = mysqli_connect("localhost","root","");
mysqli_select_db($conn,"ajax");

$email=$_POST['email'];
$password=$_POST['password'];

$query="SELECT * FROM `user` WHERE `email` LIKE '$email' AND `password` LIKE '$password'";

$query_login = "UPDATE `user` SET `online`= 1 WHERE `email` LIKE '$email'";

$result=mysqli_query($conn,$query);

$num_rows=mysqli_num_rows($result);

if($num_rows==1){
  $row=mysqli_fetch_assoc($result);
  mysqli_query($conn,$query_login);
  $_SESSION['name']=$row['name'];
  $_SESSION['user_id']=$row['user_id'];

  exit("success");
}
else{
  exit("failed");
}

?>
