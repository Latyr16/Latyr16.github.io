<?php
        session_start();
        $login = $_SESSION['login'];
        if(!isset($login)){
            header('Location: index.php?id=153');
            exit();
        }
        else {
                header("Location: promoteur.php?id=785");
        }
?>
