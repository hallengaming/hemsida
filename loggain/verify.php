<?php
      include("config.php");

      if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
      }

      if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
        // Verify data
        $email = mysqli_escape_string($db, $_GET['email']); // Set email variable
        $hash = mysqli_escape_string($db, $_GET['hash']); // Set hash variable
        $search = mysqli_query($db, "SELECT email, hash, active FROM users WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error());
        $match  = mysqli_num_rows($search);

        if($match > 0){
          // We have a match, activate the account
          mysqli_query($db, "UPDATE users SET active='1' WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error());
          $msg = 'Ditt konto har aktiverats, du kan nu logga in.';
          #visa en form där användaren kan välja displayname och ett nytt password
          
        }else{
          // No match -> invalid url or account has already been activated.
          $msg = 'Addressen är antingen ogilitig eller så har du redan aktiverat ditt konto.';
        }
      }else{
        // Invalid approach
        $msg = 'För att verifiera ditt konto, vänligen klicka på länken som har skickats till din mail.';
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
  <title>Hällens Gaming - Verifikation</title>
  <link rel="shortcut icon" type="image/x-icon" href="img/H1.png">
  <link href="../css/loggain.css" media="screen" rel="stylesheet" type="text/css" />
  <script src="../js/common.js" type="text/javascript"></script>
  <script src="../js/modernizr.min.js" type="text/javascript"></script>
  <meta content="width=device-width, initial-scale=1" name="viewport" />
</head>

<body>
  <div class="page-wrap gradient-primary">
    <div class="container">
      <h1 class="logo"><a href="../index.php" title="Hällens Gaming">Hällens Gaming</a></h1>
      <div class="content">
        <div class="panel" id="login">
          <h3>Verifikation</h3>
          <p>
            <?php if(isset($msg)){ echo $msg; } ?>
          </p>
          <a class="panel-footer" href="index.php"><span>Logga in</span></a>
          <a class="panel-footer" href="skapakonto.php">Ny? &nbsp;<span>Skapa ett konto</span></a>
        </div><a href="">Glömt ditt lösenord?</a></div>
    </div>
  </div>
  <footer class="logo-sfdc"><a href="http://astely.com" title="Astely.com">Made with some friends from <span></span></a></footer>
</body>

</html>
