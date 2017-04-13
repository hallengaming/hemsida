<?php
// if request is not secure, redirect to secure url
if (!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) {
    $url = 'https://' . $_SERVER['HTTP_HOST']
                      . $_SERVER['REQUEST_URI'];

    header('Location: ' . $url);
    exit;
}
// if request is not secure, redirect to secure url
header("location: loggain/");
?>