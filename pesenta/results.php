<?php
if (!isset($_COOKIE['verybadpractice']) || $_COOKIE['verybadpractice'] !== 'loggedin') {
	header('Location:statistic.php');
}

function safe($value) {
	$value = str_replace(array('<', '>'), '|', $value);
	return htmlentities($value, ENT_QUOTES, 'utf-8');
}

require_once 'con-fi-g.php';
//gets the total amount of the users submitted
$queried = $mysqli->query('SELECT COUNT(name) as total FROM info');
$res_count1 = $queried->fetch_array(MYSQLI_ASSOC);
$res_count = $res_count1['total'];

//gets the total amount of e-books
$sql_sum_eb = $mysqli->query('SELECT SUM(ebook) as sumeb FROM info');
$res_sum_eb1 = $sql_sum_eb->fetch_array(MYSQLI_ASSOC);
$res_sum_eb = $res_sum_eb1['sumeb'];

//gets the total amount of x-books
$sql_sum_pb = $mysqli->query('SELECT SUM(xbook) as sumpb FROM info');
$res_sum_pb1 = $sql_sum_pb->fetch_array(MYSQLI_ASSOC);
$res_sum_pb = $res_sum_pb1['sumpb'];

//gets the amounts of books that were paid
$sql_sum_paid_e = $mysqli->query('SELECT SUM(ebook) as epaid FROM info WHERE paid IS NOT NULL');
$sql_sum_paid_x = $mysqli->query('SELECT SUM(xbook) as xpaid FROM info WHERE paid IS NOT NULL');
$res_sum_paid_e = $sql_sum_paid_e->fetch_array(MYSQLI_ASSOC);
$res_sum_paid_x = $sql_sum_paid_x->fetch_array(MYSQLI_ASSOC);
$res_sum_paid = (int)$res_sum_paid_e['epaid'] + (int)$res_sum_paid_x['xpaid'];

$results = $mysqli->query('SELECT * FROM info');
$result_rows = $results->fetch_all(MYSQLI_ASSOC);
$mysqli->close();


?>
<!DOCTYPE html>
<html class='stat' lang="bg_BG">
	<head>
		<link rel='stylesheet' href='includes/css/style.css' type='text/css'>

		<script type='text/javascript' src='includes/js/functions.js'></script>
		<script type='text/javascript' src='includes/js/jquery-1.9.1.js'></script>

		<meta charset="UTF8">
		<title>Статистика за поръчки до момента</title>
		<script type='text/javascript' src='includes/js/jquery-1.9.1.js'></script>
	</head>
	<body class="stat">
		<div id="main_container_stat">
			<div id="second_container">
				<div id="header_2"></div>
			</div>
			<div class="third_container">
				<h1>Статистика за поръчки до момента</h1>
				<p style="text-align:center; padding-bottom:20px;">Като разгледате данните не забравяйте да излезете като
					цъкнете бутончето най-долу.</p>
				<p style="text-align:center; padding-bottom:20px;">Всяка промяна по "Управление плащания" се отразява върху
					базата данни.</p>
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
					$options = array('не платени', 'платени - кеш', 'платени - paypal', 'платени - ePay', 'платени - банков път');

					foreach ($result_rows as $row) {
						$sel2 = '';
						$sel1 = '';
						for ($i = 0, $iMax = count($options); $iMax > $i; $i++) {
							if ($options[$i] === $row['paid']) {
								$sel2 .= '<option selected>' . $options[$i] . '</option>';
							} elseif ($options[$i] === 'не платени' && $row['paid'] === '') {
								$sel2 .= '<option selected>' . $options[$i] . '</option>';
							} else {
								$sel2 .= '<option>' . $options[$i] . '</option>';
							}
						}
						$sel1 = "<select onchange='change_status(this)' id='" . $row["id"] . "' name='" . $row["id"] . "'>" . $sel2 . '</select>';

						echo '<tr>';
						echo '<td>' . safe($row['name']) . '</td>';
						echo '<td>' . safe($row['mail']) . '</td>';
						echo '<td>' . safe($row['message']) . '</td>';
						echo '<td id="ebook' . $row["id"] . '">' . safe($row['ebook']) . '</td>';
						echo '<td id="xbook' . $row["id"] . '">' . safe($row['xbook']) . '</td>';
						echo '<td id="paid' . $row["id"] . '">' . safe($row['paid']) . '</td>';
						echo '<td>' . $sel1 . '</td>';
						echo '<td class="del" title="Delete entry" data-id="'.$row["id"].'">(delete)</td>';
						echo '</tr>';
					}
					?>
					<tfoot>
					<tr>
						<td>Бр. записални: <?php echo $res_count; ?></td>
						<td>Остават още: <?php echo(700 - ($res_sum_pb + $res_sum_eb)); ?></td>
						<td>Всичко: <?php echo($res_sum_pb + $res_sum_eb); ?> от 700</td>
						<td>е-книги: <?php echo $res_sum_eb; ?></td>
						<td>x-книги: <?php echo $res_sum_pb; ?></td>
						<td id="tot_books">платени: <?php echo $res_sum_paid; ?></td>
						<td></td>
					</tr>
					</tfoot>
				</table>

				<input type="submit" name="submit" class="btn" value="Изход" id="submit-exit">

			</div>
		</div>

		<script type='text/javascript' src='includes/js/functions.js'></script>
	</body>
</html>
