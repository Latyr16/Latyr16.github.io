<?php

session_start();
require_once 'db_connect.php';
if(!empty($_POST)){
     $login = $_POST['username'];
     $password = md5($_POST['password']);

     	$query0  = "SELECT * FROM agent where id_agent='".$login."'";
     	$result0 = mysqli_query($conn,$query0);
     	if(mysqli_num_rows($result0)){
		$client0 = mysqli_fetch_object($result0);
         	$_SESSION['id_agent']=$client0->id_agent;
          	if (($login==$client0->id_agent) and ($password==$client0->password)){
          	      header("Location: promoteur/formulaire.php?id=$client0->id_agent");
		}
		else{
                     echo "  <script type=\"text/javascript\">alert(\"login ou password incorrect.\");
                             location =\"./index.php\"
                              </script>";
                }
	}
	else{
		$query1  = "SELECT * FROM superviseur where id_superviseur='".$login."'";
     		$result1 = mysqli_query($conn,$query1);
		if(mysqli_num_rows($result1)){
		     $client1 = mysqli_fetch_object($result1);
        	     $_SESSION['id_superviseur']=$client1->id_superviseur;
        	     if (($login==$client1->id_superviseur) and ($password==$client1->password)){
        	          header("Location: superviseur/superviseur.php?id=$client1->id_superviseur");
        	     }
        	     else{
        	         echo "  <script type=\"text/javascript\">alert(\"login ou password incorrect.\");
        	                    location =\"./index.php\"
        	            </script>";
        	     }
		}
		else{
			$query2  = "SELECT * FROM promoteur where login='".$login."'";
        		$result2 = mysqli_query($conn,$query2);
        		if(mysqli_num_rows($result2)){
        		     $client1 = mysqli_fetch_object($result2);
        		     $_SESSION['login']=$login;
        		     if (($login==$client1->login) and ($password==$client1->password)){
        		          header("Location: promoteur/promoteur.php?id=$client1->id_promoteur");
        		     }
        		     else{
                		 echo "  <script type=\"text/javascript\">alert(\"login ou password incorrect.\");
                		            location =\"./index.php\"
                		    </script>";
            	 	     }
			 }
			else {
				$query3  = "SELECT * FROM administrateur where login='".$login."'";
                        	$result3 = mysqli_query($conn,$query3);
                        	if(mysqli_num_rows($result3)){
                        	     $client1 = mysqli_fetch_object($result3);
                        	     $_SESSION['login']=$login;
                       		     if (($login==$client1->login) and ($password==$client1->password)){
                        	          header("Location: admin/admin.php?id=$client1->id_administrateur");
                        	     }
                        	     else{
                        	         echo "  <script type=\"text/javascript\">alert(\"login ou password incorrect.\");
                        	                    location =\"./index.php\"
                        	            </script>";
                        	     }
                        	 }
				else{
                 			echo "  <script type=\"text/javascript\">alert(\"login ou password incorrect.\");
                        			    location =\"./index.php\"
                    			</script>";
				}
			}
         	}
     	}
}

?>
