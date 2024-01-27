<?
	session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Page login! | </title>

  <!-- Bootstrap core CSS -->

  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="css/custom.css" rel="stylesheet">
  <link href="css/icheck/flat/green.css" rel="stylesheet">


  <script src="js/jquery.min.js"></script>

  <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<body style="background:#FF56DS;">

  <div class="">
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>

    <div id="wrapper">
      <div id="login" class="animate form">
        <section  class="login_content">
          <form method="post" action="authentification.php">
            <h1>Login Page</h1>
            <!--div>
                <label>Votre profile</label>
                <label>
                        <select name="role" class="form-control" style="width:130%" required="">
                            <option value="agent">Agent</option>
                            <option value="superviseur">Superviseur</option>
                        </select>
                 </label>
            </div-->
            <div>
              <input type="text" class="form-control" placeholder="identifiant" name="username" required="" />
            </div>
            <div>
              <input type="password" class="form-control" placeholder="password" name="password" required="" />
            </div>
		<br/>
		<br/>
            <div>
		<button type="reset" class="btn btn-default submit" >Cancel</button>
		<button type="submit" class="btn btn-default submit" >Login</button>
                <!--a class="reset_pass" href="#">password oublié?</a-->
	    </div>
            <!--div class="form-group">
                      <div class="col-md-9 col-md-offset-3">
                        <button type="reset" class="btn btn-primary">Cancel</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                      </div>
            </div-->
            <div class="clearfix"></div>
            <div class="separator">

              <p class="change_link">  
                <a href="#toregister" class="to_register">Mot de passe oublié !!!</a>
              </p>
              <div class="clearfix"></div>
              <br />
              <div>
                <!--h1><i class="fa fa-paw" style="font-size: 26px;"></i> Administrateur </h1-->

                <p>©2021 Promobile copyritch </p>
              </div>
            </div>
          </form>
          <!-- form -->
        </section>
        <!-- content -->
      </div>
      <div id="register" class="animate form">
        <section class="login_content">
          <form method="post" action ="authenmodifier.php">
            <h1>Modification du compte</h1>
            <!--div>
              <input type="text" class="form-control" placeholder="Username" name="nom" required="" />
            </div-->
            <div>
              <input type="email" class="form-control" placeholder="Email" name="email" required="" />
            </div>
            <div>
              <input type="password" class="form-control" placeholder="Nouveau Password" name="password1" required="" />
            </div>
            <div>
              <input type="password" class="form-control" placeholder="Confirmé Password" name="password2" required="" />
            </div>
            <div>
              <input type="int" class="form-control" placeholder="telephone" name="telephone" required="" />
            </div>
	    <div>
                <button type="submit" class="btn btn-default submit">Sign In</button>
                <!--a class="reset_pass" href="#">password oublié?</a-->
            </div>
	    <!--div class="form-group">
                      <div class="col-md-9 col-md-offset-3">
                        <button type="reset" class="btn btn-primary">Cancel</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                      </div>
             </div-->
            <!--div>
              <a class="btn btn-default submit" href="authentification.php">Submit</a>
            </div-->
            <div class="clearfix"></div>
            <div class="separator">

              <p class="change_link">Je suis membre ?
                <a href="#tologin" class="to_register"> Sign In </a>
              </p>
              <div class="clearfix"></div>
              <br />
              <div>
                <h1><i class="fa fa-paw" style="font-size: 26px;"></i>Administrateur!</h1>
                <p>©2021 Promobile copyritch </p>
              </div>
            </div>
          </form>
          <!-- form -->
        </section>
        <!-- content -->
      </div>
    </div>
  </div>

</body>

</html>
