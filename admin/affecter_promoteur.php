<?php

	session_start();
	require_once 'db_connect.php';

        $login = $_SESSION['login'];
        if(!isset($login)){
            header('Location: index.php?id=2');
            exit();
        }


     $id_promoteur = $_GET['id_promoteur'];
     $id_superviseur = $_GET['id_superviseur'];

     $query = "SELECT * FROM affectation_agent WHERE id_promoteur = '".$id_promoteur."'";
     $querycheck = mysqli_query ($conn,$query);
     $countrows = mysqli_num_rows($querycheck);
     if($countrows==1)
     {
                echo "  <script type=\"text/javascript\">alert(\"Promoteur déjà attribué\");
                 location =\"./affectationPromoteur.php?id=66\"
                </script>";
     }
     else{
         $query  = "insert into affectation_agent(id_superviseur, id_promoteur) values ('".$id_superviseur."', '".$id_promoteur."')";
         $result = mysqli_query($conn,$query);

         $query0  = "delete from promoteurbis where id_promoteur='".$id_promoteur."'";
         $result0 = mysqli_query($conn,$query0);
         if($result and $result0 ){
                echo "  <script type=\"text/javascript\">alert(\"Attribution effectuée avec success\");
                     location =\"./affectationPromoteur.php?id=36\"
                    </script>";
         }
         else{
                echo "  <script type=\"text/javascript\">alert(\"erreur d'attribution  \");
                         location =\"./affectationPromoteur.php?id=35\"
                        </script>";
        }
     }

?>

