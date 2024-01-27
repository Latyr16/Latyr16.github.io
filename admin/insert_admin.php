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
        $query = "SELECT * FROM administrateur WHERE id_administrateur = '".$column[0]."'";
        $querycheck = mysqli_query ($conn,$query);
        $countrows = mysqli_num_rows($querycheck);
	if($countrows>=1)
	{
                	echo "  <script type=\"text/javascript\">alert(\"Administrateur $column[$countrows] existe déjà\");
                	 location =\"./ajouterAdmin.php?id=66\"
               		 </script>";
        }
        else{
                $query  = "insert into administrateur(id_administrateur, prenom,nom,email,telephone,login,password) values ('".$column[0]."', '".$column[1]."', '".$column[2]."', '".$column[3]."', '".$column[4]."','".$column[5]."','".md5($column[6])."')";

                $result = mysqli_query($conn,$query);
                if($result){

                        echo "  <script type=\"text/javascript\">alert(\"Administrateur ajouté avec success\");
                                 location =\"./ajouterAdmin.php?id=66\"
                                </script>";
                }
                else{
                        echo "  <script type=\"text/javascript\">alert(\"erreur d'ajout administrateur \");
                         location =\"./ajouterAdmin.php?id=3\"
                        </script>";
                }
        }
      }
    }
    else {
        header('Location: ajouterAdmin.php?id=74');
    }
  }
?>
