
<?php
	require_once(__DIR__."/../config.php");
	// $servername_server = "localhost";
	// $username_server = "root";
	// $password_server = "";
	// $db_server="c_superludo_bd";
	// $servername = "localhost";
	// $username = "courssel_superludobd_topuvai";
	// $password = "superludobd_topuvai";
	// $db="courssel_superludobd_topuvai";
	// enable error reporting
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	// $servername = "localhost";
	// $username = "u591982837_babytopuvai";
	// $password = "i^vXt1]I";
	// $db="u591982837_babytopuvai";
	$conn = mysqli_connect($servername_server, $username_server, $password_server,$db_server);
    if($conn){
       // echo "Done";
    }
    else{
        echo "Not";
    }
?>
