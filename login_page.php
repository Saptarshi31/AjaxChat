<?php
session_start();
if(isset($_SESSION['name'])){
	header('Location: body.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login-Page</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Grand+Hotel" rel="stylesheet">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Noto+Serif" rel="stylesheet">
</head>
<body>

	<div id="email-box"></div>

	<div id="Login-Form-to-hide" class="login" style="display: none;">
		<img src="css/user.png" style="position: absolute; top: -70px; left: 29%;">
		<div id="response" style="font-family: Consolas; position: absolute; top: 65px; left: 40px; "></div>
		<div style="padding: 100px 20px 10px 20px;">
			<form>
			  <div class="form-group">
			    <input type="email" class="form-control" id="email" placeholder="Email Id">
			  </div>
			  <div class="form-group">
			    <input type="password" class="form-control" id="password" placeholder="Password">
			  </div>
			  <button id="login" type="button" class="btn btn-info btn-block">Log In</button>
			</form>
		</div>
		<br>
		<div style="margin-left: 75px;">
			<h3 style="color: white; opacity: 0.8;">Not Registered?</h3>
			<button id="the-register-button" style="margin-left: 37px;" type="button" class="btn btn-success">Sign Up Here</button>
		</div>
	</div>

	<div id="Regis-Form-to-Hide" style="top: 160px;" class="login" style="display: block;">
		<img style="height: 130px; width: 130px; position: absolute; top: -70px; left: 30%;" src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ec/Circle-icons-pencil_2.svg/512px-Circle-icons-pencil_2.svg.png">

		<div style="font-family: Consolas; color: red; position: absolute; top: 11%; left: 40px;" id="response2"></div>

		<div style="font-family: Consolas; color: red; position: absolute; top: 13.5%; left: 40px;" id="response1"></div>

		<div style="padding: 100px 20px 10px 20px;">

			<form>
				<div class="form-group">
			    <input type="text" class="form-control" id="regis_name" placeholder="Name">
			  </div>
			  <div class="form-group">
			    <input type="text" class="form-control" id="regis_user_name" placeholder="User Name">
			  </div>
			  <div class="form-group">
			    <input type="email" class="form-control" id="regis_email" placeholder="Email">
			  </div>
			  <div class="form-group">
			    <input type="password" class="form-control" id="regis_password" placeholder="Password">
			  </div>
			  <div class="form-group">
			    <input type="password" class="form-control" id="regis_password_2" placeholder="Confirm Password">
			  </div>
			  <button id="registration" type="button" class="btn btn-success btn-block">Sign Up</button>
			</form>

		</div>
		<br>
		<div style="margin-left: 60px;">
			<h3 style="color: white; opacity: 0.8;">Already Registered?</h3>
			<button id="the-login-button" style="margin-left: 60px;" type="button" class="btn btn-info">Log In Here</button>
		</div>
	</div>

	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/alternate.js"></script>
	<script type="text/javascript" src="js/login_ajax.js"></script>
	<script type="text/javascript" src="js/regis_ajax.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#regis_user_name').on('input',function(){
				var input_val = $("#regis_user_name").val();
				$.ajax({
					url: 'user_name.php',
					method: 'POST',
					data: {
						input: input_val,
					},
					success: function(response) {
						if(response.indexOf("empty") >= 0){
							document.getElementById("response2").innerHTML = "";
						}
						else if(response.indexOf("yes") >= 0){
							document.getElementById("response2").innerHTML = "<p style='color: green;'>User Name Available</p>";
						}
						else if (response.indexOf("no") >= 0) {
							document.getElementById("response2").innerHTML = "<p>User Name Not Available</p>";
						}
					},
					dataType: 'text',
				});
			});
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#regis_email').on('input',function(){
				var vale = $("#regis_email").val();
				$.ajax({
					url: 'email_check.php',
					method: 'POST',
					data: {
						input: vale,
					},
					success: function(response) {
						if(response.indexOf("empty") >= 0){
							$("#email-box").hide();
						}
						else if(response.indexOf("yes") >= 0){
							$("#email-box").show();
							document.getElementById("email-box").innerHTML = "<span style='color: green;'>Email Available</span>";
						}
						else if (response.indexOf("no") >= 0) {
							$("#email-box").show();
							document.getElementById("email-box").innerHTML = "<span style = 'color: red;'>Email Not Available</span>";
						}
					},
					dataType: 'text',
				});
			});
		});
	</script>

</body>
</html>
