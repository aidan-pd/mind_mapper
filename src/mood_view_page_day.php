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
<script src="https://code.createjs.com/tweenjs-0.6.2.min.js"></script>

<script src="graph_layout/graph_layout.js"></script>
<script src="javascript/day_graph.js"></script>
<script src="moment.js"></script>

	<script>
		var week;

		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-92514395-1', 'auto');


		$.get('php/check_study_week.php', function(data){
			week = data;
					//OVERALL DATA
			ga('set', 'userId', week); // Set the user ID using signed-in user_id.

			ga('set', 'dimension1', week);
		  	ga('send', 'pageview');
		});


	</script>

</head>
<body onload="startSetup();">


	<p id="popup" onclick="closePopup()">

	</p>

	<canvas id="graphCanvas"></canvas>
	<div id="graphControls">
		<img onclick="moveBackwardsInTimeBy(1)" src="images/earlier_button.png" height="80%">
		<img onclick="moveForwardInTimeBy(1)" src="images/later_button.png" height="80%">
		<img onclick="goToCalendarView()" src="images/calendar_icon.png" height="80%">
		<img id="loading" src="images/spin.gif" height="80%">

	</div>

</body>