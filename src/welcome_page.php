<?php
session_start();

if ($_SESSION["logged_in"] == "TRUE"){
	$logged_in_username = $_SESSION["username"];
}
else{
	header( 'Location: /mbax4ad8/src/src/login_page.php' ) ;
}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/welcome_page.css">
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />


		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


		<title>QS Mood Logger</title>
		<link rel="apple-touch-icon" sizes="57x57" href="icons/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="icons/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="icons/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="icons/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="icons/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="icons/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="icons/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="icons/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="icons/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="icons/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="icons/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="icons/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="icons/favicon-16x16.png">
		<link rel="manifest" href="icons/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="icons/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">
		
		<script>

		var week;

		function doAlert(data){
			week = data;

		}

		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-92514395-1', 'auto');
		  ga('send', 'pageview');

		$.get('php/check_study_week.php', function(data){
			week = data;
					//OVERALL DATA

			  ga('set', 'userId', week); // Set the user ID using signed-in user_id.
		});


		</script>



		
	</head>
	<body>
		 <p id="titleText">QS <br> MoodLogger</p>
		 <p id="subText">Welcome Back <?php echo"$logged_in_username" ?></p>
		 <p class="button" onclick="location.href='mood_entry_page.php';">Log a Mood Entry<img src="images/new_entry_icon.png" height="20px"> </p>
		 <p class="button" onclick="location.href='mood_view_page.php';">View your Mood Graph <img src="images/view_graph_icon.png" height="20px"> </p>
		 <p class="button" onclick="location.href='study_sign_up.php';">Notifications User Study</p>

		 <p class="button" onclick="location.href='logout_page.php';">Log Out</p>
	</body>

</html>