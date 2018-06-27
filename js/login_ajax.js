$(document).ready(function() {
	$("#login").on('click', function() {
		var email = $("#email").val();
		var password = $("#password").val();
		if(email=="" || password=="") {
			document.getElementById("response").innerHTML = "<span style = 'color:red; font-family: Consolas;'>Fill up all the field's</span>";
		}
		else {
			$.ajax({
				url: 'login.php',
				method: 'POST',
				data: {
					login: 1,
					email: email,
					password: password,
				},
				success: function(response) {
					if(response.indexOf('failed') >= 0)
						document.getElementById("response").innerHTML = "<span style = 'color:red; font-family: Consolas;'>Username or Password Incorrect</span>";
					if(response.indexOf('success') >= 0)
						window.location='body.php';
				},
				dataType: 'text',
			});
		}
	});
});



