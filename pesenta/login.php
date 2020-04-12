<?php
session_start(); 
require("con-fi-g.php");

if (isset($_POST['username']) && isset($_POST['password'])) {
	$login_id=$_POST['username'];
	$password2=$_POST['password'];

	if($login_id === 'chobitche'){

			if ($password2 == 'p_b_t@mzin'){
				echo "Password verified!";            
				$_SESSION['login_id']='Y';
				unset($_SESSION['error']);
				unset($_POST);
				header('Location:results.php');
			}
			else{
				$_SESSION['error']="2";
				header('Location:statistic.php');
			}

	}
	else{
		if (array_key_exists('error', $_SESSION)) {
			unset($_SESSION['error']);
		}
		unset($_POST);
		$_SESSION['error']="2";
		header('Location:statistic.php');
	}
}
else{
	$_SESSION['error']="1";
	header('Location:statistic.php');
}

?>