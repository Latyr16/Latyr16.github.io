<?php

	session_start();
	require_once 'db_connect.php';

        $id_superviseur = $_SESSION['id_superviseur'];
        if(!isset($id_agent)){
            header('Location: index.php?id=12');
            exit();
        }

	    
	 $id_agent = $_GET['id_agent'];
	 $tel = $_GET['tel'];


	     $query = "SELECT * FROM attente WHERE telephone = '".$tel." and id_agent='".$id_agent."''";
             $querycheck = mysqli_query ($conn,$query);
             if (mysqli_num_rows($querycheck)){
	     	while ($client = mysqli_fetch_object($querycheck)){
			$prenom=$client->prenom_client;
			$nom=$client->nom_client;
			$date_naissance=$client->date_naissance;
			$lieu_naissance=$client->lieu_naissance;
			$date_delivrance=$client->date_delivrance;
			$date_expiration=$client->date_expiration;
			$numero_cni=$client->numero_cni;
			$photo_recto=$client->photo_recto;
			$photo_verso=$client->photo_verso;
		}
	     	$query1  = "insert into clients (id_agent,prenom_client,nom_client,date_naissance,lieu_naissance,date_delivrance,date_expiration,numero_cni,telephone,photo_recto,photo_verso) values ('".$id_agent."','".$prenom."', '".$nom."', '".$date_naissance."', '".$lieu_naissance."', '".$date_delivrance."','".$date_dexpiration."','".$numero_cni."','".$tel."','".$photo_recto."','".$photo_verso."')";
		$query11  = "insert into client_valider (id_agent,id_superviseur,telephone,photo_recto,photo_verso) values ('".$id_agent."','".$id_superviseur."', '".$tel."','".$photo_recto."','".$photo_verso."')";

		$result11 = mysqli_query($conn,$query11);

	     	$result1 = mysqli_query($conn,$query1);
	     	if($result1){
	
	     	   echo "  <script type=\"text/javascript\">alert(\"Données envoyées avec success\");
	                 location =\"./form/index.php?id=23\"
	                </script>";
	    		} 
	    		else{
				echo "	<script type=\"text/javascript\">alert(\"erreur d'ajout apprenant \");
				 location =\"./form/index.php?id=23\"
				</script>";
		        }
		}

?>
