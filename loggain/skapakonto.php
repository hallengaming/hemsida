<?php
require_once "Mail.php";

// if(!isset($db)){}
include("config.php");
//$db = mysqli_connect("localhost", "my_user", "my_password", "world");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

if(isset($_POST['name']) && !empty($_POST['name']) AND isset($_POST['email']) && !empty($_POST['email'])){

$name = mysqli_escape_string($db, $_POST['name']);
$email = mysqli_escape_string($db, $_POST['email']);

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $msg = 'Mailen som du skrev in är ogiltig, vänligen försök igen.';
} else {
  $msg = 'Ditt konto har skapats, <br /> vänligen verifiera det genom att klicka på aktiveringslänken som har skickats till din mail.';
  //$hash används för att verifiera mailen, har ingenting att göra med lösenordet!
  $hash = md5( rand(0,1000) ); // Generate random 32 character hash and assign it to a local variable.
// Example output: f4552671f8909587cf485ea990207f3b

//GENERERA ETT RANDOM LÖSENORD OCH SÄTT $password TILL DET!
  $password = rand(1000,5000); // Generate random number between 1000 and 5000 and assign it to a local variable.
// Example output: 4568

  mysqli_query($db, "INSERT INTO users (username, password, email, hash) VALUES(
'". mysqli_escape_string($db, $name) ."',
'". mysqli_escape_string($db, md5($password)) ."',
'". mysqli_escape_string($db, $email) ."',
'". mysqli_escape_string($db, $hash) ."') ") or die(mysqli_error());


$from = "Hallengaming <noreply@hallengaming.se>";
 $to =  $name . "<" . $email . ">";
 $subject = "Registrering | Verifikation";
 $body = '

Tack för att du har registrerat dig!
Ditt konto på hallengaming.se har skapats, du kan logga in med följande inloggningsuppgifter efter du har aktiverat ditt konto genom att klicka på länken nedan.

------------------------
Användarnamn: '.$name.'
Lösenord: '.$password.'
------------------------

Vänligen klicka på följande länk för att aktivera ditt konto:
https://www.hallengaming.se/loggain/verify.php?email='.$email.'&hash='.$hash.'
';

 $host = "ssl://send.one.com";
 $port = "465";
 $username = "noreply@hallengaming.se";
 $password = "XXX";

 $headers = array ('From' => $from,
   'To' => $to,
   'Subject' => $subject);
 $smtp = Mail::factory('smtp',
   array ('host' => $host,
     'port' => $port,
     'auth' => true,
     'username' => $username,
     'password' => $password));

 $mail = $smtp->send($to, $headers, $body);

 if (PEAR::isError($mail)) {
   $msg = "Mailet kunde ej skickas, kontakta Arch Web Wizard.";
   //echo("<p>" . $mail->getMessage() . "</p>");
  } else {

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
      <h1 class="logo"><a href="../index.php" title="Hällens Gaming">Hällens Gaming - Registrering</a></h1>
      <div class="content">
        <div class="panel" id="login">
          <h3>Registrera ett konto</h3>

          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" role="form">
            <div class="form-group">
              <label for="name">Namn</label>
              <div class="input-icon icon-username"></div>
              <input autofocus="true" class="form-control" id="name" name="name" placeholder="Namn" tabindex="1" type="text" />
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <div class="input-icon icon-username"></div>
              <input class="form-control" id="email" name="email" placeholder="Email" tabindex="2" type="email" />
            </div>
						<div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php if(isset($msg)){ echo $msg; } ?></div>
            <button class="btn btn-primary btn-lg btn-block" name="commit" tabindex="3" type="submit" value="Registrera">Registrera</button>
          </form><a class="panel-footer" href="index.php"><span>Logga in</span></a></div><a href="forgotpassword.php">Glömt ditt lösenord?</a></div>
    </div>
  </div>
  <footer class="logo-sfdc"><a href="http://astely.com" title="Astely.com">Made with some friends from <span></span></a></footer>
</body>

</html>
