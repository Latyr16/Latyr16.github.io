
<?php

session_start();
require_once 'db_connect.php';

$error = "";
if(!empty($_POST)){
     $login = $_POST['username'];
     $password = md5($_POST['password']);
        $query  = "SELECT * FROM administrateur WHERE login='$login' AND password= '$password' LIMIT 1";
        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result)){
          $client = mysqli_fetch_object($result);

          $_SESSION['login']=$client->login;

          header('Location: accueil.php?id=11');
        }
        else{

        echo "  <script type=\"text/javascript\">alert(\"login ou password incorrect.\");

                 location =\"./index.php?id=7\"

                </script>";
        }
}
else {
        header('Location: index.php?id=145');
}
?>

