<?php

session_start();

// if(!isset($db)){}
include("config.php");
//$db = mysqli_connect("localhost", "my_user", "my_password", "world");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

if(isset($_POST['datum']) && !empty($_POST['datum']) AND isset($_POST['text']) && !empty($_POST['text'])){

$datum = mysqli_escape_string($db, $_POST['datum']);
$text = mysqli_escape_string($db, $_POST['text']);
$user=$_SESSION['login_user'];

  mysqli_query($db, "INSERT INTO Nyheter (datum, nyhettext, user) VALUES(
'". mysqli_escape_string($db, $datum) ."',
'". mysqli_escape_string($db, $text) ."',
'". mysqli_escape_string($db, $user) ."') ") or die(mysqli_error());
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
      <h1 class="logo"><a href="../index.php" title="Hällen Gaming">Hällen Gaming - Registrering</a></h1>
      <div class="content">
        <div class="panel" id="login">
          <h3>Lägg upp en nyhet</h3>

          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" role="form">
            <div class="form-group">
              <label for="date">Datum</label>
              <div class="input-icon icon-username"></div>
              <input autofocus="true" class="form-control" id="datum" name="datum" placeholder="Datum" tabindex="1" type="text" />
            </div>
            <div class="form-group">
              <label for="text">Nyhetstext</label>
              <div class="input-icon icon-username"></div>
              <input class="form-control" id="text" name="text" placeholder="t.ex. DM träning" tabindex="2" type="text" />
            </div>
						<div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php if(isset($msg)){ echo $msg; } ?></div>
            <button class="btn btn-primary btn-lg btn-block" name="commit" tabindex="3" type="submit" value="Registrera">Publicera</button>
          </form><a class="panel-footer" href="hem.php"><span>Hem</span></a></div><a href="loggaut.php">Logga ut</a></div>
    </div>
  </div>
  <footer class="logo-sfdc"><a href="http://astely.com" title="Astely.com">Made with some friends from <span></span></a></footer>
</body>

</html>
