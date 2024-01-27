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
        $query = "SELECT * FROM superviseur WHERE id_superviseur = '".$column[0]."'";
        $querycheck = mysqli_query ($conn,$query);
        $countrows = mysqli_num_rows($querycheck);
        if($countrows==1)
        {
                echo "  <script type=\"text/javascript\">alert(\"Superviseur $column[$countrows] existe déjà\");
                 location =\"./ajouterSuperviseur.php?id=66\"
                </script>";
        }
        else{
                $query  = "insert into superviseur (id_superviseur,prenom,nom,cni,email,telephone,password) values ('".$column[0]."', '".$column[1]."', '".$column[2]."','".$column[3]."','".$column[4]."','".$column[5]."','".md5($column[6])."')";
                $result = mysqli_query($conn,$query);
                if($result){
                        echo "  <script type=\"text/javascript\">alert(\"Superviseur ajouté avec success\");
                                 location =\"./ajouterSuperviseur.php?id=66\"
                                </script>";
                }
                else{
                   echo "       <script type=\"text/javascript\">alert(\"erreur d'ajout superviseur \");
                         location =\"./ajouterSuperviseur.php?id=3\"
                        </script>";
                }
        }
      }
    }
    else {
        header('Location: ajouterSuperviseur.php?id=74');
    }
  }
?>
