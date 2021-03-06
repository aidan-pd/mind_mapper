<!DOCTYPE html>


<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/welcome_page.css">
		<link rel="stylesheet" type="text/css" href="css/login_page.css">

		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

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
		
	</head>
	<body>
		 <p id="titleText">QS <br> MoodLogger</p>


		 <p id="subText">Welcome to QSMoodLogger, a mobile web application that allows you to log and track your moods, emotions and activities. </p>
		 <img src="images/screenshot.png" width="100%"></img>
		 <p id="subText"> QSMoodLogger will present your emotions back to you with beautiful graphs that you're free to explore. Log in or sign up below to begin! </p>


		 <p id="subText">Log In Below</p>


		 <form action="php/login.php" method="post">
			<input type="text" name="username" placeholder="Username"><br>
  			<input type="password" name="password" placeholder="Password"><br>
  		</br>
  			<input type="submit" value="Log In" class="button">
		</form>
	</br>
		<a class="button" href="new_account.html">I haven't got an account...</a>
		<p> </p></br>
		<p> </p></br>
	</body>

</html>