$(document).ready(function() {
	var usersJson = $('#users').val();
	var users = JSON.parse(usersJson);
	console.log(users);
});