<?php

	session_start();
	require_once 'db_connect.php';

   // echo 'je suis la';
    if(isset($_POST['username'])){
	$login=$_POST['username'];
	$password1=$_POST['password1'];
	$password1 = sha1($password1);
	$password2=$_POST['password2'];
	$password2 = sha1($password2);
	$telephone=$_POST['telephone'];
       // echo $telephone;
	if ($password1==$password2){
        	$_SESSION['login']=$client->login;
        	$query  = "UPDATE promoteur set password='".$password1."', telephone='".$telephone."' where login='$login' LIMIT 1";
        	$result = mysqli_query($conn,$query);

     	        echo "  <script type=\"text/javascript\">alert(\"Mot de passe mofifié avec succés\");
                 	location =\"./index.php?id=7\"
			</script>";

	}
	else{
	    echo "  <script type=\"text/javascript\">alert(\"Mot de passe non conform.\");
                	 location =\"./index.php?id=7\"
                	</script>";
    	}
    }
?>
