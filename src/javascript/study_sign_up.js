function signupToStudy(){

	number = $("#phoneInput").val();

	$.get( "php/add_phone_number.php", {phone_number: number} ,function( data ) {
	  alert(data);
	  header( 'Location: /mbax4ad8/src/src/welcome_page.php' ) ;

	});				
}

$(document).ready(function(){
});
