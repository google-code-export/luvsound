$(document).ready(function() {	
	$("#UserForgotPasswordForm").validate(
		rules: {
			"data[User][username]": {
				required: true,
				email: true,
				remote: "/users/check/username"
			}
		},
		messages: {
				"data[User][username]": {
				required: "Please enter a valid email address.",
				remote: "This username has been taken."
			}
		}
	);
});