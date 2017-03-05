var dispatchNotificationsWindow = new Window("Dipatch Notifications", "dispatch_window");
dispatchNotificationsWindow.draw();
dispatchNotificationsWindow.append('		<u><p onclick="">Click Below To Dispatch Notifications</p></u>
		<b><p onclick="dispatchNotificationSMSWeek1()">Week 1</p></b>
		<b><p onclick="dispatchNotificationSMSWeek2()">Week 2</p></b>
		<p>Last dispatched at:</p>
		<p id="lastDispatchedAt"></p>
		<p>Last successful dispatch at:</p>
		<p id="lastSuccessfulDispatchAt"></p>
		<p>Response:</p>
		<img id="dispatchload" src="images/spinner.gif" height="50px">
		<p id="response"></p>');


function dispatchNotificationSMSWeek1(){
	
	/*$( "#result" ).load( "php/dispatch_notifications.php", function( response, status, xhr ) {
	  if ( status == "error" ) {
	    var msg = "Error - ";
	    $( "#result" ).html( msg + xhr.status + " " + xhr.statusText );
	  }
	});*/

	$("#dispatchload").show();
	$("#response").html("");


	$.get( "../src/php/dispatch_notifications.php", { study_week:"0" }, function( data ) {
		$("#dispatchload").hide();

		$("#response").html(""+data);
	});

}//dispatchNotificationsSMSWeek1


function dispatchNotificationSMSWeek2(){
	
	/*$( "#result" ).load( "php/dispatch_notifications.php", function( response, status, xhr ) {
	  if ( status == "error" ) {
	    var msg = "Error - ";
	    $( "#result" ).html( msg + xhr.status + " " + xhr.statusText );
	  }
	});*/

	$("#dispatchload").show();
	$("#response").html("");


	$.get( "../src/php/dispatch_notifications.php", { study_week:"1" }, function( data ) {
		$("#dispatchload").hide();

		$("#response").html(""+data);
	});

}//dispatchNotificationsSMSWeek1

$(document).ready(function(){
	$("#dispatchload").hide();
});
