<!DOCTYPE html>
<html class="stat">
<head>
	<link rel="stylesheet" href="includes/css/style.css" type="text/css">
	<meta charset="UTF8">
	<title>Входна порта</title>
	<script type='text/javascript' src='includes/js/jquery-1.9.1.js'></script>
</head>
<body class="stat">
<div id="main_container_stat">
	<div id="second_container">
		<div id="header_2"></div>
	</div>
	<div class="container_pass">
		<h2>Малко да видим как вървят поръчките, а?</h2>
		<h3>А я дайте едно име и парола да видим от наш'ти ли си.</h3>
		<div class="oops"></div>
		<div class="login_box">
			<form action="" class="formichka" onsubmit="return false" method="post" >
				<div class="control-group">
					<label for="username">Потребиелтско име</label>
					<input type="text" name="username" id="username">
				</div>
				<div class="control-group">
					<label for="password">Потребителски ключ</label>
					<input type="password" name="password" id="password">
				</div>
				<div class="control-submit">
					<button type="submit" id="login-in" class="btn">Влизай</button>
				</div>
			</form>
			<p style="text-align:center"><a href="index.php">Назад</a></p>
		</div>
	</div>

	<script type='text/javascript' src='includes/js/functions.js'></script>
</div>
</body>
</html>
