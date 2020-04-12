<!DOCTYPE html>
<?php 
	session_start();
	if (!isset($_SESSION['login_id'])) {
	 	$_SESSION['error']="3";
	 	header('Location:statistic.php');
	 } 
require("con-fi-g.php");

	function safe( $value ) {
		$value = str_replace('<','|',$value);
		$value = str_replace('>','|',$value);
		htmlentities( $value, ENT_QUOTES, 'utf-8' );
		return mysql_real_escape_string( $value );
}
	//gets the total amount of the users submited
	$sql_count="SELECT COUNT(name) as total FROM info";
	$res_count1=mysql_fetch_array(mysql_query($sql_count));
	$res_count=$res_count1['total'];
	
	//gets the total amount of e-books
	$sql_sum_eb="SELECT SUM(ebook) as sumeb FROM info";
	$res_sum_eb1=mysql_fetch_array(mysql_query($sql_sum_eb));
	$res_sum_eb=$res_sum_eb1['sumeb'];
	
	//gets the total amount of x-books
	$sql_sum_pb="SELECT SUM(xbook) as sumpb FROM info";
	$res_sum_pb1=mysql_fetch_array(mysql_query($sql_sum_pb));
	$res_sum_pb=$res_sum_pb1['sumpb'];
	
	//gets the amounts of books that were paid
	$sql_sum_paid_e="SELECT SUM(ebook) as epaid FROM info WHERE paid IS NOT NULL";
	$sql_sum_paid_x="SELECT SUM(xbook) as xpaid FROM info WHERE paid IS NOT NULL";
	$res_sum_paid_e=mysql_fetch_array(mysql_query($sql_sum_paid_e));
	$res_sum_paid_x=mysql_fetch_array(mysql_query($sql_sum_paid_x));
	$res_sum_paid_e=$res_sum_paid_e['epaid'];
	$res_sum_paid_x=$res_sum_paid_x['xpaid'];
	$res_sum_paid=$res_sum_paid_x+$res_sum_paid_e;
	
	$sql="SELECT * FROM info";
	$results=mysql_query($sql);

	if (isset($_POST['submit'])) {
		# unset any session variables
		$_SESSION = array();
		# expire cookie
		if (!empty($_COOKIE[session_name()])){
			setcookie(session_name(), "", time() - 42000);
		}
		# destroy session
		session_destroy();
        header("location:statistic.php");
	}

?>
<html class="stat">
<head>
	<link rel="stylesheet" href="includes/css/style.css" type="text/css">
	
	<script type="text/javascript" src="includes/js/functions.js"></script>
	<script type="text/javascript" src="includes/js/jquery-1.9.1.js"></script>
	<!--<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->
			
	<meta charset="UTF8">
	<title>Статистика за поръчки до момента</title>
</head>
<body class="stat">
<div id="main_container_stat">
	<div id="second_container">	
		<div id="header_2"></div>
	</div>
	<div class="third_container">
		<h1>Статистика за поръчки до момента</h1>
		<p style="text-align:center; padding-bottom:20px;">Като разгледате данните не забравяйте да излезете като цъкнете бутончето най-долу.</p>
		<p style="text-align:center; padding-bottom:20px;">Всяка промяна по "Управление плащания" се отразява върху базата данни.</p>
		<table>
			<thead>
				<tr>
				<th class="ime">Име</th>
				<th class="poshta">е-поща</th>
				<th class="komentar">Коментар</th>
				<th class="eknigi">брой е-книги</th>
				<th class="xknigi">брой х-книги</th>
				<th class="paid">Платени?</th>
				<th class="manage_paid">Управление плащания</th>
				</tr>
			</thead>
			<?php
				$options=array("не платени","платени - кеш","платени - paypal","платени - ePay","платени - банков път");

				while ( $row = mysql_fetch_array($results)) {
					extract($row);
					$sel2="";
					$sel1="";
					for($i=0;count($options)>$i;$i++){
						if($options[$i]==$paid){
							$sel2=$sel2."<option selected>".$options[$i]."</option>";
						}
						elseif($options[$i]=="не платени" && $paid==""){
							$sel2=$sel2."<option selected>".$options[$i]."</option>";
						}
						else {
							$sel2=$sel2."<option>".$options[$i]."</option>";
						}
					}
					$sel1 = "<select onchange='change_status(this)' id='$id' name='$id'>".$sel2.'</select>';

					echo "<tr>";
					echo 	"<td>".safe($name)."</td>";
					echo 	"<td>".safe($mail)."</td>";
					echo 	"<td>".safe($message)."</td>";
					echo 	"<td id='ebook.$id'>".safe($ebook)."</td>";
					echo 	"<td id='xbook.$id'>".safe($xbook)."</td>";
					echo 	"<td id='paid.$id'>".safe($paid)."</td>";
					echo 	"<td>".$sel1."</td>";
					echo "</tr>";
				};
			?>
			<tfoot>
				<tr>
					<td>Бр. записални: <?php echo $res_count;?></td>
					<td>Остават още: <?php echo (700-($res_sum_pb+$res_sum_eb));?></td>
					<td>Всичко: <?php echo ($res_sum_pb+$res_sum_eb);?> от 700</td>
					<td>е-книги: <?php echo $res_sum_eb;?></td>
					<td>x-книги: <?php echo $res_sum_pb;?></td>
					<td id="tot_books">платени: <?php echo $res_sum_paid;?></td>
					<td></td>
				</tr>
			</tfoot>
		</table>
		<form style="text-align:center;" method="post" class="container_pass">
			<input type="submit" name="submit" class="btn" value="Чао(т.е. излез)" id="submit">
		</form>
	</div>
</div>
</body>
</html>