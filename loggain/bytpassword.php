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

if(isset($_POST['email']) && !empty($_POST['email'])){

$email = mysqli_escape_string($db, $_POST['email']);

$search = mysqli_query($db, "SELECT email, hash, active FROM users WHERE email='".$email."' AND active='1'") or die(mysql_error());
$match  = mysqli_num_rows($search);

if($match > 0){
  // We have a match, activate the account
  $from = "Hallengaming <noreply@hallengaming.se>";
 $to =  $email;
 $subject = "Registrering | Verifikation";
 $body = '
Du har begärt att ändra ditt lösenord på https://www.hallengaming.se

Vänligen klicka på följande länk för att ändra ditt lösenord:
https://www.hallengaming.se/loggain/changepassword.php?email='.$email.'&hash='.$hash.'

Om du har fått det här mailet men inte har skapat ett konto på hallengaming.se, vänligen kontakta aww@hallengaming.se
';

 $host = "ssl://send.one.com";
 $port = "465";
 $username = "noreply@hallengaming.se";
 $password = "wizardwizard2014";

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
   $error = "Mailet kunde ej skickas, kontakta Arch Web Wizard.";
   //echo("<p>" . $mail->getMessage() . "</p>");
  } else {
   $msg = 'Mailet har skickats, <br /> vänligen klickas på länken som har skickats i mailet för att fortsätta.';
  }
}else{
  // No match -> invalid url or account has already been activated.
  $error = 'Addressen är ogilitig, ej kopplad till något konto eller så är kontot ej aktiverat.';
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
        <h1 class="logo"><a href="../index.php" title="Hällen Gaming">Hällen Gaming - Registrering</a></h1>
        <div class="content">
          <div class="panel" id="login">
            <h3>Glömt lösenord?</h3>
            <?php
                 if(isset($msg)){
                   echo "<p>" . $msg . "</p>";
                 }
            ?>
            <div
                 <?php
                 if(isset($msg)){
                   echo 'style="display: none;"';
                 }
                 ?>
                 >
             <p>
            Skriv in din mail så kommer det skickas en länk för att ändra ditt lösenord till den.
          </p>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" role="form">
            <div class="form-group">
              <label for="email">Email</label>
              <div class="input-icon icon-username"></div>
              <input class="form-control" id="email" name="email" placeholder="Email" tabindex="2" type="email" />
            </div>
						<div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php if(isset($error)){ echo $error; } ?></div>
            <button class="btn btn-primary btn-lg btn-block" name="commit" tabindex="3" type="submit" value="Skicka mail">Skicka mail</button>
          </form>
            </div>
              <a class="panel-footer" href="index.php"><span>Logga in</span></a>
              <a class="panel-footer" href="skapakonto.php">Ny? &nbsp;<span>Skapa ett konto</span></a>
          </div>
          <a href="">Glömt ditt lösenord?</a></div>
      </div>
    </div>
    <footer class="logo-sfdc"><a href="http://astely.com" title="Astely.com">Made with some friends from <span></span></a></footer>
  </body>

  </html>
