<?php

	session_start();

	$user_id = $_SESSION['user_id'];

	$conn = mysqli_connect("localhost","root","");
	mysqli_select_db($conn,"ajax");

	$user_id = $_SESSION['user_id'];

	$query1 = "SELECT `name`,`online`,`user_id` FROM `user`";

	$res = mysqli_query($conn,$query1);

	while ($row = mysqli_fetch_assoc($res)) {
		
		$name = $row['name'];
		$user_id_row = $row['user_id'];
		$online = $row['online'];

		if($user_id_row != $user_id){
	
?>

	<div style="width: 100%; float: left; font-size: 15px; padding: 3px 0;">
		<a href="private.php?user_id=<?=$user_id_row?>&name=<?=$name?>" style="color: black; text-decoration: none; float: left;"><?=$name?></a>
		<span style="float: left;">&nbsp</span>

<?php
	if($online == 1){
?>

		<div style="margin-top: 6px; background: green; float: left; height: 13px; width: 13px; border-radius: 50%;"></div>
		</div>

<?php
}
	}
}
?>

