<?php
if ($_SERVER['SCRIPT_NAME']!="/blog/pesenta/save.php"){
	header('location:index.html');
	exit;
}

session_start();

require("con-fi-g.php");

if(count($_POST)<4){
	header('location:index.html');
	exit;
}
if($_POST['q_ebook']=="" && $_POST['q_pbook']==""){
	header('location:index.html');
	exit;
}
	function safe( $value ) {
		$value = str_replace('<','|',$value);
		$value = str_replace('>','|',$value);
		htmlentities( $value, ENT_QUOTES, 'utf-8' );
		return mysql_real_escape_string( $value );
	}
$fld_name=safe($_POST['fld_name']);
$fld_mail=safe($_POST['fld_mail']);
$fld_msg=safe($_POST['fld_msg']);
if (isset($_POST['q_ebook'])) {
	$fld_eb=intval($_POST['q_ebook']);
}
else {
	$fld_eb=0;
}
if (isset($_POST['q_pbook'])) {
	$fld_pp=intval($_POST['q_pbook']);
}
else {
	$fld_pp=0;
}
$sql="INSERT INTO info".
	"(name,mail,message,ebook,xbook)".
	"VALUES".
	"('$fld_name','$fld_mail','$fld_msg','$fld_eb','$fld_pp')";

mysql_query($sql) or die(mysql_error());
$_SESSION['ura']="Y";
print_r($_POST);
print_R(count($_POST));
header('location:ura-zapisani.php');

?>