<?php

        session_start();
        $id_superviseur = $_SESSION['id_superviseur'];
        if(!isset($id_superviseur)){
            header('Location: ..index.php?id=55');
            exit();
        }
	else {
		require_once('header.php');
		require_once('header1.php');
		require_once('footer.php');
	}
?>

