<?php
	session_start();
	if(!(isset($_SESSION['name']))) {
    header("Location: login_page.php");
  }
	$user_id_sender= $_SESSION['user_id'];
	$user_id_receiver= $_GET['user_id'];
	$name_sender= $_SESSION['name'];
	$name_receiver= $_GET['name'];
?>

<!DOCTYPE html>
<html lang="eng">
<head>

	<meta charset="utf-8">
	<title>Chat Room</title>
	<link rel="stylesheet" type="text/css" href="css/private.css">
	<link href="https://fonts.googleapis.com/css?family=Grand+Hotel" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Acme|Grand+Hotel" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Risque" rel="stylesheet">

</head>

<body>

	<input hidden id="my_id" type="text" value="<?php echo $user_id_sender; ?>">
	<input hidden id="their_id" type="text" value="<?php echo $user_id_receiver; ?>">
	<input hidden id="my_name" type="text" value="<?php echo $name_sender;?>">
	<input hidden id="their_name" type="text" value="<?php echo $name_receiver; ?>">

	<div class="navbar">
		<div class="nav-header">
			<h1 class="Name-tag text-dark">
				<a href="body.php" style="text-decoration: none; color: black;">
					<?php echo 'Welcome: '.$_SESSION['name'].''; ?>
				</a>
			</h1>
		</div>
		<!-- <div class="Logout">
			<form action="logout.php">
				<input class="btn btn-info Logout-button" type="Submit" name="LogOut" value="LogOut">
			</form>
		</div> -->
	</div>

	<input hidden id="logout_id" value="<?php echo $user_id ?>" name="user_id">

	<div class="row">
		<!-- Chat box -->
		<div class="col-lg-10 col-md-12">
			<div class="chat-box">
				<div class="chat-header text-light">Chat with <?php echo $name_receiver ?></div>

				<div id="chat-body" class="chatt-body"></div>

				<div class="chat-footer">
					<form>
						<input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" id="input-message" type="text" class="form-control" placeholder="Type a Message..">
					</form>
				</div>

			</div>
		</div>

		<div class="col-lg-2 col-md-12 active-people">
			<div class="nav-active text-light text-left">
				<h3>ONLINE</h3>
			</div>
			<br><br>
			<div class="text bg-light">
				<div style="color: black; text-decoration: none; height: 500px; width: 100%; float: left; overflow-y: auto; word-break:break-all;" id="active-names" class="bg-light col-lg-12 text-dark"></div>
			</div>
		</div>

	</div>

	<script>
		function Active() {
		    $("#active-names").load("active_user.php").show();
		  }
	  setInterval('Active()', 1000);
	</script>

	<script>
		$(document).ready(function() {
			$("#input-message").keypress(function(e) {
				if(e.which == 13){
				e.preventDefault();
				var msg = $("#input-message").val();
				var my_name = $("#my_name").val();
				var my_id = $("#my_id").val();
				var their_name = $("#their_name").val();
				var their_id = $("#their_id").val();
				document.getElementById('input-message').value = '';

				if(msg != '') {
					$.ajax({
						url: 'private_msg.php',
						method: 'POST',
						data:{
							msg: msg,
							my_name: my_name,
							my_id: my_id,
							their_name: their_name,
							their_id: their_id,
						},
						success: function(response) {
							if(response.indexOf("went")>=0){
								console.log("Sent");
							}
						},
						dataType: 'text',
					});
					$("#chat-body").animate({ scrollTop: $('#chat-body').prop("scrollHeight")}, 1000);
				}

			}
			});
		});
	</script>

	<script>
		function masgs() {
		    $("#chat-body").load("view_msg.php?receiver_id=<?php echo $user_id_receiver ?>").show();
		  }
	  setInterval('masgs()', 1000);
	</script>

</body>
</html>
