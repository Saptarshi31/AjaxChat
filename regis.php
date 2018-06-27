<?php

$conn = mysqli_connect("localhost","root","");
mysqli_select_db($conn,"ajax");

$regis_name = $_POST['regis_name'];
$regis_user_name = $_POST['regis_user_name'];
$regis_email = $_POST['regis_email'];
$regis_password = $_POST['regis_password'];

// Query to check if user name exist
$query_user_name = "SELECT `user_name` FROM `user` WHERE `user_name` LIKE '$regis_user_name'";
// Query to check if email exists
$query_email = "SELECT * FROM `user` WHERE `email` LIKE '$regis_email'";
//Query for the insertion
$query_insert = "INSERT INTO `user`(`user_id`,`name`,`user_name`,`email`,`password`,`online`) VALUES(null,'$regis_name','$regis_user_name','$regis_email','$regis_password',0)";
//Query to check if insertion was made
$query_check = "SELECT * FROM `user` WHERE `user_name` LIKE '$regis_user_name' AND `email` LIKE '$regis_email' AND `password` LIKE '$regis_password'";

$res_user_name = mysqli_query($conn,$query_user_name);
$res_email = mysqli_query($conn,$query_email);

//Check if username is unique
if(mysqli_num_rows($res_user_name) == 0){
  //Check if email is unique
  if(mysqli_num_rows($res_email) == 0){
    //Perform insertion
    mysqli_query($conn, $query_insert);
    //Check if one row is returned
    if(mysqli_num_rows(mysqli_query($conn, $query_check)) == 1){
      //Sign Up success
      exit('registered');
    }
    else{
      exit('failed');
    }
  }
  else{
    exit('useremail');
  }
}
else{
  exit('usererror');
}

?>