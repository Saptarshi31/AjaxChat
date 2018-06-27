<?php

session_start();
$conn = mysqli_connect("localhost","root","");
mysqli_select_db($conn,"ajax");

$user_id_sender= $_SESSION['user_id'];
$user_id_receiver= $_GET['receiver_id'];

$query = "SELECT * FROM `private` WHERE `sender_id` LIKE '$user_id_sender' AND `receiver_id` LIKE '$user_id_receiver'
UNION
SELECT * FROM `private` WHERE `sender_id` LIKE '$user_id_receiver' AND `receiver_id` LIKE '$user_id_sender'
ORDER BY `message_id` ASC";

$res= mysqli_query($conn,$query);

while($row = mysqli_fetch_assoc($res)) {

	$sender_name = $row['sender_name'];
	$message=$row['message'];
	$sender_id=$row['sender_id'];
	$time=$row['time'];
	$receiver_name=$row['receiver_name'];

	if($sender_id == $user_id_sender){
?>

<div style="padding-bottom: 20px; width: 100%; color: white; word-wrap: break-word; font-family: Consolas; float: left;">
	<div style="width: 70%; float: right;">
		<p style="color: black;"><?=$sender_name?>:</p>
		<p style="padding:10px 20px; border-radius: 20px; background-color: #fb5858 ;"><?=$message?></p>
		<p style="font-size: 14px; margin-left: 135px; color: black; font-family: Arial;">Sent: <?=date("j/m/Y g:i A", strtotime($time))?></p>
	</div>
</div>

<?php
	}
	else{
?>
<div style="padding-bottom: 20px; width: 100%;color: black; word-wrap: break-word; font-family: Consolas; float: left;">
	<div style="width: 70%; float: left;">
		<p><?=$sender_name?>:</p>
		<p style="padding:10px 20px; border-radius: 20px; background-color: #aabedd;"><?=$message?></p>
		<p style="font-size: 14px; margin-left: 135px; color: black; font-family: Arial;">Sent: <?=date("j.m.Y g:i A", strtotime($time))?></p>
	</div>
</div>
<?php
	}
}
?>
