<?php

session_start();

if ($_SESSION["logged_in"] == 0){
	header( 'Location: http://localhost/mind_mapper/src/home_page.php' ) ;
}
else{
	$logged_in_username = $_SESSION["username"];
}

?>

