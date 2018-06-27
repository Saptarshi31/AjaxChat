<?php

	$conn = mysqli_connect("localhost","root","");
	mysqli_select_db($conn,"ajax");

	$user_name = $_POST["input"];
	
	if($user_name == ''){
		exit('empty');
	}
	else{
		$query = "SELECT `user_name` FROM `user` WHERE `user_name` LIKE '$user_name'";

		$result = mysqli_query($conn, $query);

		if(mysqli_num_rows($result) == 0){
			session_destroy();
			exit("yes");
		}

		else{
			session_destroy();
			exit("no");
		}
	}

?>
