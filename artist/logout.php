<?php
	require('../connect/connect.php');
	session_destroy();

	header('Location: ../index.php');
?>
