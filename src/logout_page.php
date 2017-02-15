<?php

session_start();

$_SESSION["logged_in"] = "FALSE";
$_SESSION["username"] = "";

if ($_SESSION["logged_in"] == "TRUE"){
	$logged_in_username = $_SESSION["username"];
}
else{
	header( 'Location: login_page.php' ) ;

}


?>