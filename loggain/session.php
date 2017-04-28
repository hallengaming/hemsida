<?php
session_start();
include("config.php");

$user_check=$_SESSION['login_user'];

$sql = "SELECT username, password, active FROM users WHERE username='".$username. "' AND active='1'";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$login_session =$row['username'];

if(!isset($login_session)){
mysqli_close($connection); // Closing Connection
header('Location: index.php'); // Redirecting To Home Page
} else {
  $user_is_valid = true;
}
?>
