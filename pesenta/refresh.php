<?php
require_once('con-fi-g.php');

if (isset($_POST['id'])) {
	$id_form = $_POST['id'];
} else {
	return false;
}
if (isset($_POST['value'])) {
	$paid_form = $_POST['value'];
	if ($paid_form === "не платени") {
		$sql = "UPDATE info SET paid=null WHERE id='$id_form'";
	} else {
		$sql = "UPDATE info SET paid='$paid_form' WHERE id='$id_form'";
	}
	$mysqli->query($sql);
} else {
	return false;
}
require_once 'con-fi-g.php';

$sql_sum_paid_e = $mysqli->query("SELECT SUM(ebook) as epaid FROM info WHERE paid IS NOT NULL");
$sql_sum_paid_x = $mysqli->query("SELECT SUM(xbook) as xpaid FROM info WHERE paid IS NOT NULL");
$res_sum_paid_e = $sql_sum_paid_e->fetch_array(MYSQLI_ASSOC);
$res_sum_paid_x = $sql_sum_paid_x->fetch_array(MYSQLI_ASSOC);
$res_sum_paid_e = $res_sum_paid_e['epaid'];
$res_sum_paid_x = $res_sum_paid_x['xpaid'];
$res_sum_paid = $res_sum_paid_x + $res_sum_paid_e;

print json_encode($res_sum_paid);
