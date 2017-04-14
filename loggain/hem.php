<?php
session_start();
include('ensure_ssl.php');
$user_check=$_SESSION['login_user'];

if(isset($user_check)){
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
<h1>Ändra Lösenord</h1>
<h1>Se användaruppgifter</h1>
<h1>Se lista på alla saker i skåpet</h1>
</div

</body>
</html>
	';
} else {
  header('Location: ' . "index.php");
}
?>