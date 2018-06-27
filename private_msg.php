<?php

$conn = mysqli_connect("localhost","root","");
mysqli_select_db($conn,"ajax");

$my_id = $_POST["my_id"];
$my_name = $_POST["my_name"];
$their_name = $_POST["their_name"];
$their_id = $_POST["their_id"];
$msg = $_POST["msg"];

$query = "INSERT INTO `private`(`message_id`,`sender_id`,`sender_name`,`receiver_id`,`receiver_name`,`message`,`time`) VALUES(null,'$my_id','$my_name','$their_id','$their_name','$msg',CURRENT_TIMESTAMP)";

mysqli_query($conn,$query);

?>
