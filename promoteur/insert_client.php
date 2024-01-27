<?php

	session_start();
	require_once 'db_connect.php';

        $id_agent = $_SESSION['id_agent'];
        if(!isset($id_agent)){
            header('Location: index.php?id=12');
            exit();
        }

	$error = "";
	if(!empty($_POST)){
	     $prenom = $_POST['prenom'];
	     $nom = $_POST['nom'];
	     $date_naissance = $_POST['date_naissance'];
	     $lieu_naissance = $_POST['lieu_naissance'];
	     $date_delivrance = $_POST['date_delivrance'];
	     $date_dexpiration = $_POST['date_expiration'];
	     $identification_carte = $_POST['MSISDN'];
	     $numero_cni = $_POST['numero_cni'];
	     $telephone = $_POST['telephone'];
	     $id_promoteur = $_GET['id_promoteur'];
	    // $photo_cni_recto = $id_agent.'_'.$_POST['photo_recto'];
	    // $photo_cni_verso = $id_agent.'_'.$_POST['photo_verso'];
	    

		$message = ''; 
		if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload')
		{
		 // if ((isset($_FILES['photo_recto'])) && (isset($_FILES['photo_verso'] )) && ($_FILES['photo_recto']['error'] === UPLOAD_ERR_OK) && ($_FILES['photo_verso']['error'] === UPLOAD_ERR_OK))
		//  {
		    // get details of the uploaded file
		    $fileTmpPath = $_FILES['photo_recto']['tmp_name'];
		    $fileName = $_FILES['photo_recto']['name'];
		    $fileSize = $_FILES['photo_recto']['size'];
		    $fileType = $_FILES['photo_recto']['type'];


		    $fileTmpPath1 = $_FILES['photo_verso']['tmp_name'];
                    $fileName1 = $_FILES['photo_verso']['name'];
                    $fileSize1 = $_FILES['photo_verso']['size'];
                    $fileType1 = $_FILES['photo_verso']['type'];


		    $fileNameCmps = explode(".", $fileName);
		    $fileExtension = strtolower(end($fileNameCmps));
		    $fileNameCmps1 = explode(".", $fileName1);
                    $fileExtension1 = strtolower(end($fileNameCmps1));

		    // sanitize file-name
		    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
		    $newFileName1 = md5(time() . $fileName1) . '.' . $fileExtension1;
	 
		    // check if file has one of the following extensions
		    $allowedfileExtensions = array('jpg', 'png', 'jpeg');
	 
		    if ((in_array($fileExtension, $allowedfileExtensions)) && (in_array($fileExtension1, $allowedfileExtensions)))
		    {
   					    
		      // directory in which the uploaded file will be moved
		        $uploadFileDir = './images_carte/';

	     		$newFileName=$id_agent.'_'.$newFileName;	  
			$newFileName1=$id_agent.'_'.$newFileName1;	  

		      $dest_path = $uploadFileDir . $newFileName;
		      $dest_path1 = $uploadFileDir . $newFileName1;
 	
		      if((move_uploaded_file($fileTmpPath, $dest_path)) && (move_uploaded_file($fileTmpPath1, $dest_path1))) 
		      {
		        $message ='File is successfully uploaded.';
		      }
	      		else
	      			{
	        		$message = 'upload image';
	      			}
	    	    }
		    else
    			{
      			$message = 'Extension image non supportée ' . implode(',', $allowedfileExtensions);
    		  	}
  	/*	}
  		else
  		{
  		  $message = 'Impossible envoi image<br>';
  		  $message .= 'Error:' . $_FILES['photo_recto']['error'].' '. $_FILES['photo_verso']['error'];
		}

		    */
	     $query = "SELECT * FROM clients WHERE numero_cni = '".$numero_cni."'";
             $querycheck = mysqli_query ($conn,$query);
             $countrows = mysqli_num_rows($querycheck);
             if($countrows>=3)
              {
                    echo "  <script type=\"text/javascript\">alert(\"Cette carte d'identité est utilisée plus de 3 fois\");
                     location =\"./formulaire.php?id='".$id_agent."'\"
                     </script>";
              }
              else{
	     	$query  = "insert into attente (id_promoteur,prenom_client,nom_client,date_naissance,lieu_naissance,date_delivrance,date_expiration,numero_cni,MSISDN,telephone,photo_recto,photo_verso) values ('".$id_promoteur."','".$prenom."', '".$nom."', '".$date_naissance."', '".$lieu_naissance."', '".$date_delivrance."','".$date_dexpiration."','".$numero_cni."','".$identification_carte."','".$telephone."','".$newFileName."','".$newFileName1."')";
	     	$query1  = "insert into clients(id_promoteur,prenom_client,nom_client,date_naissance,lieu_naissance,date_delivrance,date_expiration,numero_cni,MSISDN,telephone,photo_recto,photo_verso) values ('".$id_promoteur."','".$prenom."', '".$nom."', '".$date_naissance."', '".$lieu_naissance."', '".$date_delivrance."','".$date_dexpiration."','".$numero_cni."','".$identification_carte."','".$telephone."','".$newFileName."','".$newFileName1."')";
	     	$result1 = mysqli_query($conn,$query1);
	     	$result = mysqli_query($conn,$query);
	     	if($result && $result1){
	
	     	   echo "  <script type=\"text/javascript\">alert(\"Données envoyées avec success\");
	                 location =\"./formulaire.php?id=$id_agent\"
	                </script>";
	    		} 
	    		else{
				echo "	<script type=\"text/javascript\">alert(\"erreur d'ajout du client\");
				 location =\"./formulaire.php?id=$id_agent\"
				</script>";
		        }
	      }
		}

	}

	else {
		header("Location: ./formulaire.php?id='".$id_agent."'");
	}
?>
