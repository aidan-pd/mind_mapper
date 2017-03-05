
function dispatchNotificationSMSWeek1(){
	
	/*$( "#result" ).load( "php/dispatch_notifications.php", function( response, status, xhr ) {
	  if ( status == "error" ) {
	    var msg = "Error - ";
	    $( "#result" ).html( msg + xhr.status + " " + xhr.statusText );
	  }
	});*/

	$("#dispatchload").show();
	$("#response").html("");


	$.get( "../src/src/php/dispatch_notifications.php", { study_week:"1" }, function( data ) {
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


	$.get( "../src/src/php/dispatch_notifications.php", { study_week:"2" }, function( data ) {
		$("#dispatchload").hide();

		$("#response").html(""+data);
	});

}//dispatchNotificationsSMSWeek1

$(document).ready(function(){
	$("#dispatchload").hide();
});
