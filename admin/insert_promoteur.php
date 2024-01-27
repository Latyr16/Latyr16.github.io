<?php

session_start();
require_once 'db_connect.php';

        $login = $_SESSION['login'];
        if(!isset($login)){
            header('Location: index.php?id=2');
            exit();
        }

$error = "";

  if (isset($_POST["import"])) {

    $fileName = $_FILES["file"]["tmp_name"];

    if ($_FILES["file"]["size"] > 0) {

      $file = fopen($fileName, "r");

      while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
        $query = "SELECT * FROM promoteur WHERE id_promoteur = '".$column[0]."'";
        $querycheck = mysqli_query ($conn,$query);
        $countrows = mysqli_num_rows($querycheck);
        if($countrows==1)
        {
                echo "  <script type=\"text/javascript\">alert(\"Promoteur  $column[$countrows] existe déjà\");
                 location =\"./ajouterPromoteur.php?id=66\"
                </script>";
        }
        else{
                $query  = "insert into promoteur(id_promoteur,prenom,nom,telephone,cni,login,password) values ('".$column[0]."', '".$column[1]."', '".$column[2]."','".$column[3]."','".$column[4]."','".$column[5]."', '".md5($column[6])."')";
                $query1  = "insert into promoteurbis(id_promoteur,prenom,nom,telephone,cni,login,password) values ('".$column[0]."', '".$column[1]."', '".$column[2]."','".$column[3]."','".$column[4]."','".$column[5]."', '".md5($column[6])."')";

                $result1 = mysqli_query($conn,$query1);
                $result = mysqli_query($conn,$query);
                if($result1 && $result){
                        echo "  <script type=\"text/javascript\">alert(\"Promoteur ajouté avec success\");
                                 location =\"./ajouterPromoteur.php?id=66\"
                                </script>";
                }
                else{
                   echo "       <script type=\"text/javascript\">alert(\"erreur d'ajout du promoteur\");
                         location =\"./ajouterPromoteur.php?id=3\"
                        </script>";
                }

        }
      }
    }
    else {
        header('Location: ajouterPromoteur.php?id=74');
    }
  }
?>
