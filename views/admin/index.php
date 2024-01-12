<?php if(empty($_COOKIE['admin'])): ?>

<html>
	<head>
		<title>Art Bloggers Admin</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
        
        <link rel="stylesheet" href="/artbloggers/css/fonts_ini.css"> 
        <link rel="stylesheet" href="/template/css/login.css">
        
        <script src="/template/js/login.js"></script>
        <script src="/artbloggers/js/jquery-3.6.0.min.js"></script> 
	</head>
	<body class="page">
		<img src="/template/img/logo.svg" alt="logo" class="logo">
		<div class="content">
			<input type="text" placeholder="login" class="input" id="login">
			<input type="password" placeholder="pass" class="input" id="pass">
			<button onclick="login()" class="btn">login </button>
		</div>
	</body>
</html>

<?php elseif(empty($_COOKIE['isset'])): ?>

<html>
	<head>
		<title>Art Bloggers Admin</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
        
        <link rel="stylesheet" href="/artbloggers/css/fonts_ini.css"> 
        <link rel="stylesheet" href="/template/css/admin.css">
        
        <script src="/template/js/admin_page.js"></script>
        <script src="/artbloggers/js/jquery-3.6.0.min.js"></script> 
	</head>
	<body id="page">
		<div class="headef">
			<img src="/template/img/logo.svg" alt="logo" class="logo">
			<div class="headerZone">
				<button onclick="bloggers()" class="btn">bloggers</button><br>
				<button onclick="header()" class="btn">header</button><br>
				<button onclick="advantages()" class="btn">advantages</button><br>
				<button onclick="cases()" class="btn">cases</button><br>
			</div>
			
		</div>
		<div class="inputsZone">
			<div id="input" class="inputZone">
			
			</div>
			<div id="input2" class="inputZone2">

			</div>
		</div>
		
	</body>
</html>


<?php endif; ?>

<?php