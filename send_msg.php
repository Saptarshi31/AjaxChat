<?php

	if(isset($_POST['sent'])){
		session_start();
		$conn = mysqli_connect("localhost","root","");
		mysqli_select_db($conn,"ajax");

		$sender_id = $_POST['user_id'];
		$msg = $_POST['message'];
		$name = $_POST['name'];

		$query="INSERT INTO `chat`(`message_id`,`sender_id`,`name`,`message`,`time`) VALUES(null,'$sender_id','$name','$msg',CURRENT_TIMESTAMP)";

		mysqli_query($conn, $query);
	}
	else{
		exit('failed');
	}

?>
