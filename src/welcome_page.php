<?php
session_start();

if ($_SESSION["logged_in"] == "TRUE"){
	$logged_in_username = $_SESSION["username"];
}
else{
	header( 'Location: /src/login_page.php' ) ;
}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/welcome_page.css">
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

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