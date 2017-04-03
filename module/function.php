<?php 
function connect_db($host,$login,$pass,$db){
	if ($db = mysqli_connect($host,$login,$pass,$db)) {
		mysqli_query ($db,"set_client='utf8'");
		mysqli_query ($db,"set character_set_results='utf8'");
		mysqli_query ($db,"set collation_connection='utf8_general_ci'");
		mysqli_query ($db,"SET NAMES utf8");
		return $db;
	}
	else{
		error_log("Problem connect Data Base");
	}
}
function refresh($url = NULL,$timeOut = NULL){
	if ($timeOut == NULL) {
		$timeOut = 0;
	}
	if ($url == NULL) {
		echo "string";
		header("Refresh:".$timeOut);
	}
	else
	{
		header("Location:".$url);
	}
}

 ?>