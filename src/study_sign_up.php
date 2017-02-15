<?php
session_start();

if ($_SESSION["logged_in"] == "TRUE"){
	$logged_in_username = $_SESSION["username"];
}
else{
	header( 'Location: /mind_mapper/src/login_page.php' ) ;
}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/study_sign_up.css">
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
<script src="javascript/study_sign_up.js"></script>

	</head>



	<body>
		 <p id="titleText">QS <br> MoodLogger</p>
		 <p id="subText">Notifications User Study</p>
		 <p id="paraText">I am running a User Study to determine whether regular notifications instructing the user to enter data into this application affect the percieved quality of the data by the user. The study will run for two weeks during which you as a participant will recieve notifications via SMS reminding you to log your mood into QS Mood Logger. At the end you will also be asked to provide answers in a questionnaire. If you would like to participate please enter your <b>mobile</b> phone number below.</p> 

		 <p id="paraText">Please enter your number with the international calling code. For the UK this means replacing 07 at the beginning of your number with +447.</p>
		 <p id="paraText">eg. 07123456789 becomes +447123456789</p>
		
		 <form>
		 	<input type="text" id="phoneInput" placeholder="+44"></input>
		 </form>

		 <p class="button" onclick="signupToStudy()">Sign Up</p>
	</body>

</html>