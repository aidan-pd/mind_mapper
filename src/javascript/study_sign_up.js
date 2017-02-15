function signupToStudy(){

	number = $("#phoneInput").val();
		alert(number);

	$.get( "php/add_phone_number.php", {phone_number: number} ,function( data ) {
	  alert(data);
	});				
}

$(document).ready(function(){
});
