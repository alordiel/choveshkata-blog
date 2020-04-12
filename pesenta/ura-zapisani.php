<?php 
session_start();
if (!isset($_SESSION['ura'])){
header('location:index.html');
}
$_SESSION = array();
session_destroy();
$_POST=array();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Питър Бийгъл "Песента на ханджията"</title>
	<link rel="stylesheet" href="includes/css/style.css" type="text/css">

</head>
<body>
<div id="main_container">
	<div id="second_container">
		<div id="header_1"></div>
		<h1 style="text-align:center">Чудесно! Вашата поръчка беше записана успешно.</h1>
		<h2 style="text-align:center">Щом съберем необходимия брой поръчки, ще се свържем с вас. Благодарим ви за подкрепата!</h2>
		<h4 style="text-align:right"><em>Екипът на Чоби:)</em></h4>
		<p><a href="index.html">Назад</a></p>
	</div><!-- end "second_container"-->
</div><!-- end "main_container"-->
</body>
</html>