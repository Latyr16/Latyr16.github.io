<?php
	session_start();
	$id_agent = $_SESSION['id_agent'];
        if(!isset($id_agent)){
            header('Location: ../index.php?id=25');
            exit();
        }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Formulaires</title>
	<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet"  href="font-awesome/css/font-awesome.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/ratchet/2.0.2/css/ratchet.css" rel="stylesheet"/>

        <style>
            div.scroll {
                margin:4px, 4px;
                padding:4px;
                background-color: green;
                width: 1024px;
                height: 1024px;
                overflow-x: hidden;
                overflow-y: auto;
                text-align:justify;
            }
        </style>
    </head>
</head>
<body>
	<!-- Entête -->
      <div class="nav-head  sticky-top">
        <div class="row">
            <div class="col-12 col-lg-6">
                <p class="head-contact">
                     <span> </span><a href="../deconnexion.php">SE DECONNECTER</a>
                </p>
            </div>
        </div>


        <?php
                require_once '../db_connect.php';
                $query  = "SELECT * FROM agent where id_agent='".$id_agent."' ";
                $result = mysqli_query($conn,$query);
                if(mysqli_num_rows($result)){
                        $client = mysqli_fetch_object($result);
                        $id_promoteur=$client->id_promoteur;
                }
        ?>




      </div>
    <div align="center">
      <div class="scroll"> 
	  <div class="forms-box">
		<div align="center">
	  		<div class="col-4 col-lg-12 news_6">
			<form   enctype="multipart/form-data" method="post" action="../insert_client.php?id_agent=<?php echo $id_agent;?>&id_promoteur=<?php echo $id_promoteur ;?>" name="formulaire" onsubmit="return valider ();">
	  				<div class="form-content">
		  				<h4>Formulaire d'inscription</h4>
		  				<div class="form-row">
		  					<div class="col">
								<label>Votre prénom </label>
							    	<input type="text" name="prenom" class="form-control" placeholder="Votre nom">
		  					</div>
		  					<div class="col">
								<label>Votre nom </label>
							    	<input type="text" name="nom" class="form-control" placeholder="Votre nom">
		  					</div>
						</div>
                                                <div class="form-row">
                                                        <div class="col">
								<label for="datenaissance">Date de naissance</label>
                                                                <input type="date" id="datenaissance" name="date_naissance" class="form-control" placeholder="Date de naissance">
                                                        </div>
                                                        <div class="col">
								<label>Lieu naissance </label>
                                                            	<input type="text" name="lieu_naissance" class="form-control" placeholder="Lieu de naissance">
                                                        </div>
                                                </div>
                                                <div class="form-row">
                                                        <div class="col">
								<label>Date délivrance carte </label>
                                               		        <input type="date" name="date_delivrance" class="form-control" placeholder="date délivrance">
                                                        </div>
                                                        <div class="col">
								<label>Date d'expiration carte </label>
                                                            	<input type="date" name="date_dexpiration" class="form-control" placeholder="date d'expiration">
                                                        </div>
                                                </div>
                                                <div class="form-row">
                                                        <div class="col">
								<label>Numéro CNI </label>
                                                            	<input type="text" name="numero_cni" class="form-control" placeholder="Numero CNI">
                                                        </div>
                                                </div>
						<div class="form-row">
                                                        <div class="col">
                                                                <label>Numéro téléphone </label>
                                                                <input type="text" name="telephone" class="form-control" placeholder="numero téléphone">
                                                        </div>
							<div class="col">
                                                                <label>MSISDN </label>
                                                                <input type="text" name="MSISDN" class="form-control" placeholder="msisdn">
                                                        </div>
                                                </div>
		  				<div class="form-row">
                                                        <div class="col">
								<label for="imageUpload1" class="btn-primary btn-block btn-outlined">Photo carte CNI recto</label>
								<input type="file" id="imageUpload1" name="photo_recto" accept="image/*" capture style="display: none">
                                                	</div>
                                                        <div class="col">
								<label for="imageUpload2" class="btn-primary btn-block btn-outlined">Photo carte CNI verso</label>
								<input type="file" id="imageUpload2" name="photo_verso" accept="image/*" capture style="display: none">
                                                	</div>
                                                </div>
		  				<div class="form-row">
		  					<div class="col">
		  						<button name="uploadBtn"  value="Upload" class="btn">Envoyer</button>
		  					</div>
		  				</div>
	  				</div>
	  			</form>

	  		</div>
	  	</div>
	   </div>

	  </div>
	<!-- body -->
    
    <!-- Pied de page -->
      <!--div class="nav-head">
        <div class="row">
            <div class="col-12 col-lg-6">
                <p class="head-contact">
                     <span> ME CONTACTER : </span><a href="mailto:contact@bootstrap-top-design.com">Contact@bootstrap-top-design.com </a>
                </p>
            </div>
            <div class="col-12 col-lg-6">
                <p class="head-gram">
                   <a href="https://web.facebook.com/Bootstrap-Top-Design-108847570455750/" target="_blank" class="fa-fb"><i class="fa fa-facebook"></i></a> <a href="https://web.facebook.com/Bootstrap-Top-Design-108847570455750/" target="_blank">Likez la page Facebook du blog</a>  
                </p>
            </div>
        </div>
      </div-->
	<!-- Pied de page -->
    <script src="dist/jquery/jquery.min.js"></script>
    <script src="dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
