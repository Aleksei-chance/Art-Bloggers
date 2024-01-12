function login() {
	const login = document.getElementById("login").value;
	const pass = document.getElementById("pass").value;
	
	$.ajax({
        type: "POST",
        url: "/template/php/login.php",
        data: {login: login, pass: pass},
        success: function(html) {
			if(html.status === "succes") {
				location.reload();
			} else {
				alert(html.status);
			};
		},
	});
}