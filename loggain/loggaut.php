<?php
session_start();

// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 

//Redirect to main site
header("Location: http://hallengaming.se/index.php");
?>
Loggar ut...