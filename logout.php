<?php
// Clear all session variables
if(!isset($_SESSION)){ session_start();};
unset($_SESSION['finalplayer']);
unset($_SESSION['player']);
// Clear all session variables
$_SESSION = array();
require('config.php');

// Destroy the session
session_destroy();
// Clear all cookies
foreach ($_COOKIE as $key => $value) {
    setcookie($key, '', time() - 3600, BASEURL);
}

// Redirect to index.php
header("Location: index.php");