$(document).ready(function() {
	$("#btnLogin").on("click", function() {
		login_now();
	});
});

function login_now() {
	$.ajax({
		url: "http://localhost/rest-api-server/api/anggota",
		type: "GET",
		dataType: "json",
		data: {
			username: $("#usernameField").val(),
			password: $("#passwordField").val()
		},
		success: function(data) {
			console.log(data);
		}
	});
}
