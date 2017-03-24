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
		<link rel="stylesheet" type="text/css" href="css/study_sign_up.css">
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
<script src="javascript/study_sign_up.js"></script>

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



	<body>
		 <p id="titleText">QS <br> MoodLogger</p>
		 <p id="subText">Notifications User Study</p>
		 <p id="paraText">I am running a User Study to determine whether regular notifications instructing the user to enter data into this application affect the percieved quality of the data by the user. The study will run for two weeks during which you as a participant will recieve notifications via SMS reminding you to log your mood into QS Mood Logger. At the end you will also be asked to provide answers in a questionnaire. If you would like to participate please enter your <b>mobile</b> phone number below.</p> 

		 <p id="paraText">Click the following link to view the participant information sheet (will open in a new tab).</p> 

		 <a href="Ethics_PIS_AD.pdf" target="_blank">PLEASE CLICK THIS TO READ THE PARTICIPANT INFORMATION SHEET</a>

		 <p id="paraText">Please enter your number with the international calling code. For the UK this means replacing 07 at the beginning of your number with +447.</p>
		 <p id="paraText">eg. 07123456789 becomes +447123456789</p>
		
		 <form>
		 	<input type="text" id="phoneInput" placeholder="+44"></input>
		 </form>

		 <p id="paraText">By clicking Sign Up you agree that:</p>
		 <ol id="paraText">
		 	<li>I confirm that I have read the attached information sheet on the above project and have had the opportunity to consider the information and ask questions and had these answered satisfactorily.</li>
		 	<li>I understand that my participation in the study is voluntary and that I am free to withdraw at any time without giving a reason and without detriment to myself.</li>
		 	<li>I understand that my data will remain confidential.</li>
		 	<li>I agree to the use of anonymous quotes.</li>
		 	<li>I agree that any data collected may be archived and used as anonymous data as part of a secondary data analysis process.</li>

		 </ol>

		 <p class="button" onclick="signupToStudy()">Sign Up</p>
		</br>

	</body>

</html>