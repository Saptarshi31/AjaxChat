<?php

	//session_start();
	$conn = mysqli_connect("localhost","root","");
	mysqli_select_db($conn,"ajax");

	$email = $_POST["input"];

	if($email == ''){
		exit('empty');
	}
	else{
		$query = "SELECT `email` FROM `user` WHERE `email` LIKE '$email'";

		$result = mysqli_query($conn, $query);

		if(mysqli_num_rows($result) == 0){
			exit("yes");
		}

		else{
			exit("no");
		}
	}

?>
