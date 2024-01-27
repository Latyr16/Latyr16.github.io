<?php
	session_start();
	//$id_agent = $_SESSION['id_agent'];
	//echo $id_agent;
	session_destroy();
	header("Location: ../index.php?id=1");
?>
