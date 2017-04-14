<?php
header("Location: http://hallengaming.se/loggain.php");
/*
session_start();

$username = $_POST["name"];
$password = $_POST["password"];

if ($username="styrelse" && $password="helloworld"){
  
  $_SESSION["username"] = "styrelsen";
  header("Location: http://hallengaming.se/loggain.php");
  
} else {
  header("Location: http://hallengaming.se/loggain.php");
}
*/
?>
<p>
  Redirecting...
</p>

<?php
session_start();

// if request is not secure, redirect to secure url
if (!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) {
    $url = 'https://' . $_SERVER['HTTP_HOST']
                      . $_SERVER['REQUEST_URI'];

    header('Location: ' . $url);
    exit;
}
// if request is not secure, redirect to secure url


if(!isset($_SESSION['username'])){
	echo '
	
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
  <link href="css/loggain.css" media="screen" rel="stylesheet" type="text/css" />
  <script src="js/common.js" type="text/javascript"></script>
  <script src="js/modernizr.min.js" type="text/javascript"></script>
  <meta content="width=device-width, initial-scale=1" name="viewport" />
</head>

<body>
  <div class="page-wrap gradient-primary">
    <div class="container">
      <h1 class="logo"><a href="index.php" title="Hällens Gaming">Hällens Gaming</a></h1>
      <div class="content">
        <div class="panel" id="login">
          <h3>Logga in på ditt konto</h3>
          <form action="login.php" method="post" role="form">
            <div class="form-group">
              <label for="email">Användarnamn</label>
              <div class="input-icon icon-username"></div>
              <input autofocus="true" class="form-control" id="name" name="name" placeholder="Användaramn" tabindex="1" type="text" />
            </div>
            <div class="form-group">
              <label for="password">Lösenord</label>
              <div class="input-icon icon-password"></div>
              <input autocomplete="off" class="form-control password" id="password" name="password" placeholder="Lösenord" tabindex="2" type="password" />
            </div>
            <button class="btn btn-primary btn-lg btn-block" name="commit" tabindex="3" type="submit" value="Log In">Logga in</button>
          </form><a class="panel-footer" href="">Ny? &nbsp;<span>Begär lösenord</span></a></div><a href="">Glömt ditt lösenord?</a></div>
    </div>
  </div>
  <footer class="logo-sfdc"><a href="https://astely.com" title="Astely.com">Made with some friends from <span></span></a></footer>
</body>

</html>
	
	';
} else {
	echo '

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
  <link rel="shortcut icon" type="image/x-icon" href="H1.png">
  <link href="css/style.css" media="screen" rel="stylesheet" type="text/css" />
  <script src="js/common.js" type="text/javascript"></script>
  <script src="css/modernizr.min.js" type="text/javascript"></script>
  <meta content="width=device-width, initial-scale=1" name="viewport" />
</head>
<body>

<div class="container">
<a class="logo" href=""></a>
<h1 class="h2">Du är nu inloggad!</h1>
<hr>
<h1><a href="loggaut.php">Logga ut</a></h1>
</div

</body>
</html>
	';
}
?>