<?php

 session_start();

 $conn = mysqli_connect("localhost","root","");
 mysqli_select_db($conn,"ajax");

 $query = "SELECT `message`,`sender_id`,`name`,`time` FROM `chat`";

 $user_id = $_SESSION['user_id'];

 // echo $user_id;

 $result = mysqli_query($conn,$query);

 while($row = mysqli_fetch_assoc($result)){
 	$name = $row['name'];
 	$message = $row['message'];
 	$time = $row['time'];
 	$sender_id = $row['sender_id'];

 	if($sender_id == $user_id){

?>

	<div style="width: 100%; float: left; ">
		<div style="width: 75%; float: right;">
			<div style="width: 75%; float: right;">
				<p style="font-family: Consolas; font-weight: bold;">
					<?=$name?>: 
				</p>
				<div>
					<p style="font-size: 18px; font-family: Consolas; padding: 10px; border-radius: 20px; color: white; background-color: #D2AB6F; word-wrap: break-word; font-family: Consolas;">
						<span><?=$message?></span>
					</p> 
				</div>
				<p style="margin-left: 200px; font-family: Arial;"><?=date("j/m/Y g:i A", strtotime($time))?></p>
			</div>
		</div>
	</div>

<?php
}

else{
?>
	<div style="width: 100%; float: left;">
		<div style="width: 75%; float: left;">
			<div style="width: 75%; float: left;">
				<p style="font-family: Consolas; font-weight: bold;">
					<?=$name?>: 
				</p>
				<div>
					<p style="font-size: 18px; font-family: Consolas; padding: 10px; border-radius: 20px; color: black; background-color: #aabedd; word-wrap: break-word; font-family: Consolas;">
						<span><?=$message?></span>
					</p> 
				</div>
				<p style="margin-left: 200px; font-family: Arial;"><?=date("j/m/Y g:i A", strtotime($time))?></p>
			</div>
		</div>
	</div>


<?php
}
}
?>