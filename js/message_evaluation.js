$(document).ready(function() {
	$("#send_button").on("click", function() {

		var message = $("#sending-message").val();
		var sender_id = $("#hidden-user-id").val();
		
		// $.ajax({
		// 	url: 'send_msg.php',
		// 	method: 'POST',
		// 	data:{
		// 		sender_id: ,
		// 		receiver_id: ,
		// 		message: message,
		// 	},

		// });
	});
});
