<?php

        session_start();
        $login = $_SESSION['login'];
        if(!isset($login)){
            header('Location: ../index.php?id=55');
            exit();
        }
	else {
		require_once('header.php');
		require_once('header1.php');
		require_once('footer.php');
	}
?>

