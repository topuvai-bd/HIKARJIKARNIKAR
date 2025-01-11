<?php 
// echo all session variables
if(!isset($_SESSION)){ session_start();};
echo "<pre>";
print_r($_SESSION);
echo "</pre>";

// echo all cookies
echo "<pre>";
print_r($_COOKIE);
echo "</pre>";


?>
