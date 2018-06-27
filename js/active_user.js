var user_id = $("#need_user_id").val();

$.ajax({
	url: 'active_user.php?msg'=user_id,
	method: 'POST',
	data: {
		user: 1,
		user_id_need: user_id,
	},

	success: function(response) {
		if(response.indexOf('success') >= 0)
			console.log('win');
	},

	dataType: 'text',

});