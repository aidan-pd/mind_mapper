<?php

session_start();

if ($_SESSION["logged_in"] == "TRUE"){
	$logged_in_username = $_SESSION["username"];
}
else{
	header( 'Location: /mbax4ad8/src/src/login_page.php' ) ;
}
?>

<!DOCTYPE>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
<link rel="stylesheet" type="text/css" href="css/graphContainer.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://code.createjs.com/easeljs-0.8.2.min.js"></script>
<script src="graph_layout/graph_layout.js"></script>
<script src="javascript/calendar_graph.js"></script>
<script src="moment.js"></script>

</head>
<body onload="startSetup();">
<canvas id="graphCanvas"></canvas>

<div id="popup">
<p>POPUP<p>
</div>

<div id="graphControls">
	<img onclick="moveBackwardsInTimeBy(1)" src="images/earlier_button.png" height="80%">
	<img onclick="moveForwardInTimeBy(1)" src="images/later_button.png" height="80%">
	<img onclick="goToHourView()" src="images/clock_icon.png" height="80%">
	<img id="loading" src="images/spin.gif" height="80%">

</div>

</body>