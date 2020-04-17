<?php
if ($_SERVER['SCRIPT_NAME'] !== '/blog/pesenta/save.php' && $_SERVER['SCRIPT_NAME'] !== '/pesenta/save.php') {
	header('location:index.php');
	exit;
}

require('con-fi-g.php');

if ($_POST['q_ebook'] === '' && $_POST['q_pbook'] === '') {
	header('location:index.php');
	exit;
}
function safe($value) {
	$value = str_replace(array('<', '>'), '|', $value);
	return htmlentities($value, ENT_QUOTES, 'utf-8');
}

$fld_name = safe($_POST['fld_name']);
$fld_mail = safe($_POST['fld_mail']);
$fld_msg = safe($_POST['fld_msg']);
if (isset($_POST['q_ebook'])) {
	$fld_eb = (int)$_POST['q_ebook'];
} else {
	$fld_eb = 0;
}
if (isset($_POST['q_pbook'])) {
	$fld_pp = (int)$_POST['q_pbook'];
} else {
	$fld_pp = 0;
}
$sql = $mysqli->query("INSERT INTO info (name,mail,message,ebook,xbook) VALUES ('$fld_name','$fld_mail','$fld_msg','$fld_eb','$fld_pp')");

header('location:ura-zapisani.php');
