<?php

	session_start();
	require_once 'db_connect.php';

        $id_superviseur = $_SESSION['id_superviseur'];
        $id_promoteur = $_GET['id_promoteur'];
        if(!isset($id_superviseur)){
            header('Location: ../index.php?id=12');
            exit();

	}
	else {

                $query  = "SELECT * FROM  attente where id_promoteur='".$id_promoteur."' ";
                $result = mysqli_query($conn,$query);
                if(mysqli_num_rows($result)){
                        $client = mysqli_fetch_object($result);
                        $prenom=$client->prenom_client;
                        $nom=$client->nom_client;
                        $date_naissance=$client->date_naissance;
                        $lieu_naissance=$client->lieu_naissance;
                        $date_delivrance=$client->date_delivrance;
                        $date_dexpiration=$client->date_expiration;
                        $numero_cni=$client->numero_cni;
                        $identification_carte=$client->MSISDN;
                        $telephone=$client->telephone;
                        $newFileName=$client->photo_recto;
                        $newFileName1=$client->photo_verso;
                }

		$date = date("Y-m-d");
		$mois = date("m");
		$annee = date("Y");
	     	$query  = "insert into client_valider (id_promoteur,id_superviseur,prenom,nom,date_naissance,lieu_naissance,date_delivrance,date_expiration,cni,MSISDN,telephone,photo_recto,photo_verso,date_validation,mois,annee) values ('".$id_promoteur."','".$id_superviseur."','".$prenom."', '".$nom."', '".$date_naissance."', '".$lieu_naissance."', '".$date_delivrance."','".$date_dexpiration."','".$numero_cni."','".$identification_carte."','".$telephone."','".$newFileName."','".$newFileName1."','".$date."','".$mois."','".$annee."')";
	     	$result = mysqli_query($conn,$query);

	     	if($result){
	
			$query1 = "delete from attente where MSISDN='".$identification_carte."'";
	     		$result1 = mysqli_query($conn,$query1);
	     		   echo "  <script type=\"text/javascript\">alert(\"Client Validé avec success\");
	        	         location =\"validation.php?id=$id_superviseur\"
	        	        </script>";
	    		} 
	    		else{
				echo "	<script type=\"text/javascript\">alert(\"erreur de validation du client\");
				 location =\"validation.php?id=$id_superviseur\"
				</script>";
		        }
	}
?>
