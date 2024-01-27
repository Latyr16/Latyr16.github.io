<?php
   echo sha1('passer');

    try
    {
         $bdd = new PDO('mysql:host=localhost;dbname=ec2lt', 'root', 'passer');
    }
    catch (Exception $e)
    {
       die('Erreur : '.$e->getMessage());
    }

   // echo 'je suis la';
    if(isset($_POST['email'])){
	$email=$_POST['email'];
	$password1=$_POST['password1'];
	$password1 = sha1($password1);
	$password2=$_POST['password2'];
	$password2 = sha1($password2);
	$telephone=$_POST['telephone'];
       // echo $telephone;
	$req = $bdd->prepare("UPDATE superadmin SET password='$password1', telephone='$telephone' WHERE email= '$email'");

	//$req = $bdd->prepare('UPDATE superadmin SET password = :password1, telephone = :telephone  WHERE email = :email ');
		
	$req->execute(array( 
			'password' => $password1,
			'telephone' => $telephone
	));	

        echo 'données modifiées';
	echo sha1('passer');
	if ($password1==$password2){
		header('Location: login1.html');
	}
	else{
		//echo $password;
		header('Location: login.html');
    	}
    }
?>
