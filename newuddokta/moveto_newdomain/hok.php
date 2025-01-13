<?php 
// store get and post data to file.txt
$myfile = fopen("file.txt", "a") or die("Unable to open file!");
$txt = "GET DATA: ".json_encode($_GET)."\n";
$txt = "POST DATA: ".json_encode($_POST)."\n";
// append post data to file.txt
fwrite($myfile, $txt);
fclose($myfile);



?>