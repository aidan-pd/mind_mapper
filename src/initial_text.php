<!DOCTYPE html>
<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="window_manager/window.js"></script>
		<script src="window_manager/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>

		<script src="javascript/dashboard_initial.js"></script>
		<script src="javascript/dashboard_initial.js"></script>

	</head>
	<body>
		<ul id="windowPane"></ul>

<u><p onclick="">Click Below To Dispatch Notifications</p></u><b><p onclick="dispatchNotificationSMSWeek1()">Week 1</p></b><b><p onclick="dispatchNotificationSMSWeek2()">Week 2</p></b><p>Last dispatched at:</p><p id="lastDispatchedAt"></p><p>Last successful dispatch at:</p><p id="lastSuccessfulDispatchAt"></p><p>Response:</p><img id="dispatchload" src="images/spinner.gif" height="50px"><p id="response"></p>




	</body>
</html>