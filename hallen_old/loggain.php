<?php
session_start();

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
  <link rel="shortcut icon" type="image/x-icon" href="H1.png">
  <link href="css/style.css" media="screen" rel="stylesheet" type="text/css" />
  <script src="js/common.js" type="text/javascript"></script>
  <script src="css/modernizr.min.js" type="text/javascript"></script>
  <meta content="width=device-width, initial-scale=1" name="viewport" />
</head>

<body>
  <div class="page-wrap gradient-primary">
    <div class="container">
      <h1 class="logo"><a href="index.html" title="Hällens Gaming">Hällens Gaming</a></h1>
      <div class="content">
        <div class="panel" id="login">
          <h3>Log in to your account</h3>
          <form action="login.php" method="post" role="form">
            <div class="form-group">
              <label for="email"Playername>Name</label>
              <div class="input-icon icon-username"></div>
              <input autofocus="true" class="form-control" id="name" name="name" placeholder="Playername" tabindex="1" type="text" />
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <div class="input-icon icon-password"></div>
              <input autocomplete="off" class="form-control password" id="password" name="password" placeholder="Password" tabindex="2" type="password" />
            </div>
            <button class="btn btn-primary btn-lg btn-block" name="commit" tabindex="3" type="submit" value="Log In">Log In</button>
          </form><a class="panel-footer" href="404.html">New? &nbsp;<span>Request password</span></a></div><a href="404.html">Forgot your password?</a></div>
    </div>
  </div>
  <footer class="logo-sfdc"><a href="https://astely.com" title="Astely.com">Hällens Gaming is an <span></span> application</a></footer>
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
</div

</body>
</html>
	';
}
?>
