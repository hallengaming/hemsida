<?php
session_start();
// if request is not secure, redirect to secure url
/*if (!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) {
    $url = 'https://' . $_SERVER['HTTP_HOST']
                      . $_SERVER['REQUEST_URI'];

    header('Location: ' . $url);
    exit;
}*/
// if request is not secure, redirect to secure url

   include("config.php");

   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form
      if(isset($_POST['username']) && !empty($_POST['username']) AND isset($_POST['password']) && !empty($_POST['password'])){
      $username = mysqli_real_escape_string($db,$_POST['username']);
      $password = mysqli_real_escape_string($db, md5($_POST['password']));

      $sql = "SELECT username, password, active FROM users WHERE username='".$username."' AND password='".$password."' AND active='1'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];

      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {

				$_SESSION['login_user']= $username;
				header("location: hem.php");

      } else {
         $msg = "Ditt användarnamn eller lösenord är ogilitgt!";
      }

			}
   }
?>
<!DOCTYPE html>
<!--[if IE 7]><html class="ie lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html class="ie lt-ie9"><![endif]-->
<!--[if IE 9]><html class="ie"><![endif]-->
<!--[if (gte IE 9)|!(IE)]<!-->
<html>
<!--<![endif]-->

<head>
  <meta content="text/html; charset=utf-8" http-equiv="Content-type" />
  <title>Hällens Gaming</title>
  <link rel="shortcut icon" type="image/x-icon" href="img/H1.png">
  <link href="../css/loggain.css" media="screen" rel="stylesheet" type="text/css" />
  <script src="../js/common.js" type="text/javascript"></script>
  <script src="../js/modernizr.min.js" type="text/javascript"></script>
  <meta content="width=device-width, initial-scale=1" name="viewport" />
</head>

<body>
  <div class="page-wrap gradient-primary">
    <div class="container">
      <h1 class="logo"><a href="../index.php" title="Hällen Gaming">Hällen Gaming</a></h1>
      <div class="content">
        <div class="panel" id="login">
          <h3>Logga in på ditt konto</h3>
          <form action="" method="post" role="form">
            <div class="form-group">
              <label for="email">Användarnamn</label>
              <div class="input-icon icon-username"></div>
              <input autofocus="true" class="form-control" id="name" name="username" placeholder="Användaramn" tabindex="1" type="text" />
            </div>
            <div class="form-group">
              <label for="password">Lösenord</label>
              <div class="input-icon icon-password"></div>
              <input autocomplete="off" class="form-control password" id="password" name="password" placeholder="Lösenord" tabindex="2" type="password" />
            </div>
						<div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php if(isset($msg)){ echo $msg; } ?></div>
            <button class="btn btn-primary btn-lg btn-block" name="commit" tabindex="3" type="submit" value="Log In">Logga in</button>
          </form><a class="panel-footer" href="skapakonto.php">Ny? &nbsp;<span>Skapa ett konto</span></a></div><a href="forgotpassword.php">Glömt ditt lösenord?</a></div>
    </div>
  </div>
  <footer class="logo-sfdc"><a href="http://astely.com" title="Astely.com">Made with some friends from <span></span></a></footer>
</body>

</html>
