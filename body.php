<?php
  session_start();
  if(!(isset($_SESSION['name']))) {
    header("Location: login_page.php");
  }
  $user_id = $_SESSION['user_id'];
  $my_name = $_SESSION['name'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Group Chat</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Acme|Grand+Hotel" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/body.css">
	<link href="https://fonts.googleapis.com/css?family=Supermercado+One" rel="stylesheet">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Supermercado+One" rel="stylesheet">
</head>
<body>

	<input hidden id="need_user_id" value="<?php echo ''.$_SESSION['user_id'].''; ?>"></input>
	<input hidden id="need_user_name" value="<?php echo ''.$_SESSION['name'].''; ?>"></input>

	<div class="navbar">
		<div class="nav-header">
			<h1 class="Name-tag text-light">
				<a href="body.php" style="text-decoration: none; color: white;">
					<?php echo 'Welcome: '.$_SESSION['name'].''; ?>
				</a>
			</h1>
		</div>
		<div class="Logout">
			<form action="logout.php?">
				<input class="btn btn-danger Logout-button" type="Submit" value="LogOut">
			</form>
		</div>
	</div>

	<input hidden id="logout_id" value="<?php echo $user_id ?>" name="user_id">

	<div class="row" style="margin: 0 0 20px 0;">

		<div class="col-lg-10">
			<div class="chat-box">
				<div class="chat-head">
					<h1 class="messages-header">Chat with Everyone</h1>
				</div>

				<div class="chat-body" id="chat-body">

						<p id="message-loader"></p>

				</div>

				<div class="chat-end">
					<form class="input-form">
						<input autocorrect="off" autocapitalize="off" spellcheck="false" autocomplete="off" id="message" type="text" class="form-control input-box" placeholder="Type a Message...">
					</form>
				</div>
			</div>
		</div>

		<div class="col-lg-2 active-people">
			<div class="nav-active text-light">
				<h3>ONLINE</h3>
			</div>
			<br><br>
			<div class="text-left bg-light">
				<div style="color: black; text-decoration: none; height: 700px; width: 100%; overflow-y: auto; word-break:break-all;" id="active-names" class="bg-light col-lg-12 text-dark"></div>
			</div>
		</div>

	</div>

	<!--Refresh Active people-->
	<script>
		function Active() {
		    $("#active-names").load("active_user.php").show();
		  }
	  setInterval('Active()', 1000);
	</script>

	<script type="text/javascript">
		$(document).ready(function() {
			$("#message").keypress(function(e) {
				if(e.which == 13){
				e.preventDefault();
				var message= $("#message").val();
				var user_id = $("#need_user_id").val();
				var name = $("#need_user_name").val();
				if(message != ""){
					$.ajax({
					url: 'send_msg.php',
					method: 'POST',
					data: {
						sent: 1,
						user_id: user_id,
						name: name,
						message: message,
					},
					success: function(response) {
						if(response.indexOf('failed')>=0) {
							console.log("failed");
						}
					},
					dataType: 'text',
				});
				$("#message").val("");
				$("#chat-body").animate({ scrollTop: $('#chat-body').prop("scrollHeight")}, 1000);
				}
			}
			});
		});
	</script>

	<!-- Refresh messages -->
	<script>
		function masgs() {
		    $("#message-loader").load("msg_load.php").show();
		  }
	  setInterval('masgs()', 1000);
	</script>

</body>
</html>
