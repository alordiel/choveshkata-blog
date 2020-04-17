<?php
if (empty($_POST['id'])) {
	echo 'Нема id';
	die();
}
$id = (int) $_POST['id'];
require_once 'con-fi-g.php';
/* create a prepared statement */
if ($stmt = $mysqli->prepare('DELETE FROM info WHERE id =?')) {
    $stmt->bind_param('i',  $id);
    $stmt->execute();
    $stmt->close();
}
$mysqli->close();
echo 1;
die();
