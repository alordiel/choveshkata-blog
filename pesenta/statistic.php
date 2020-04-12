<?php 
	session_start();
	if (array_key_exists('error', $_SESSION)) {
		if ($_SESSION['error']==2) {
			$err="<p>ГРЕШКА! Брееей, май сте забравили паролата? Ако е тъй я драснете едно мейлче на <span class='mail'>alexander.dorn в gmail точка com</span> 
			да види бат Ал, да ви я препрати.</p>";
		}
		if ($_SESSION['error']==1) {
			$err="<p>ГРЕШКА! Чудно. Изглежда сте забравили да въведете я паролата, я потребителя</p>";
		}
		if($_SESSION['error']==3){
			$err="<p>ГРЕШКА! Или пътечка сте объркали или злосторник шпионин сте. За да докажете чистотата на вашите намерения се логнете подолу.</p>";
		}
}
?>
<!DOCTYPE html>
<html class="stat">
<head>
	<link rel="stylesheet" href="includes/css/style.css" type="text/css">
	<meta charset="UTF8">
	<title>Входна порта</title>
</head>
<body class="stat">
<div id="main_container_stat">
	<div id="second_container">	
		<div id="header_2"></div>
	</div>
	<div class="container_pass">
		<h2>Малко да видим как вървят поръчките, а?</h2>
		<h3>А я дайте едно име и парола да видим от наш'ти ли си.</h3>
		<div class="oops">
			<?php if(isset($err)){echo $err;}?>
		</div>
		<div class="login_box">
			<form action="login.php" method="post" class="formichka">
				<div class="control-group">
					<label for="username">Потребиелтско име</label>
					<input type="text" name="username" id="username">
				</div>
				<div class="control-group">
					<label for="password">Потребителски ключ</label>
					<input type="password" name="password" id="password">
				</div>
				<div class="control-submit">
					<button type="submit" class="btn">Влизай</button>
				</div>
			</form>
			<p style="text-align:center"><a href="index.html">Назад</a></p>
		</div>
	</div>
</div>
</body>
</html>