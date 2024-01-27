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
        $query = "SELECT * FROM agent WHERE id_agent = '".$column[0]."'";
        $querycheck = mysqli_query ($conn,$query);
        $countrows = mysqli_num_rows($querycheck);
	$id_promoteur = $_GET['id']; 
        if($countrows==1)
        {
                echo "  <script type=\"text/javascript\">alert(\"Agent  $column[$countrows] existe déjà\");
                 location =\"./ajouterAgent.php?id=66\"
                </script>";
        }
        else{
                $query  = "insert into agent(id_promoteur,id_agent,prenom,nom,cni,email,telephone,password) values ('".$id_promoteur."','".$column[0]."', '".$column[1]."', '".$column[2]."','".$column[3]."','".$column[4]."','".$column[5]."', '".md5($column[6])."')";

                $result = mysqli_query($conn,$query);
                if($result){
                        echo "  <script type=\"text/javascript\">alert(\"Agent ajouté avec success\");
                                 location =\"./ajouterAgent.php?id=66\"
                                </script>";
                }
                else{
                   echo "       <script type=\"text/javascript\">alert(\"erreur d'ajout agent\");
                         location =\"./ajouterAgent.php?id=3\"
                        </script>";
                }

        }
      }
    }
    else {
        header('Location: ajouterAgent.php?id=74');
    }
  }
?>
