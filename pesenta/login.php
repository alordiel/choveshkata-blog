<?php
if (isset($_POST['user'], $_POST['pass'])) {
	if ($_POST['user'] === 'chobitche' && $_POST['pass'] === 'p_b_t@mzin') {
		echo 0;
	} else {
		echo 2;
	}
} else {
	echo 1;
}
die();
