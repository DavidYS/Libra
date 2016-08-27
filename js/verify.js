$(function(){
	var $email = $('input[name="email"');
	var $pass = $('input[name="password"]');
	var $cpass = $('input[name="cpassword"]');
	var spanEmail = $('#email');
	var spanPass = $('#pass');
	var spanCpass = $('#cpass');

	function validateEmail(element) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(element);
}
 $($email).on('keyup mouseleave focusout', function(){
	var valEmail =  $email.val();
	if (validateEmail(valEmail)) {
	spanEmail.text('✓');
	spanEmail.css("color", "green");
	} 
	else {
	spanEmail.text("X");
	spanEmail.css("color", "red");
	}
});
 $($cpass).keyup(function(){
 	var valPass = $pass.val();
	var valCpass = $cpass.val();
	
	if(valPass == valCpass)
	{
		spanPass.text('✓');
		spanPass.css('color', 'green');
		spanCpass.text('✓');
		spanCpass.css('color', 'green');
	}
	else
	{
		spanPass.text('X');
		spanPass.css('color','red');
		spanCpass.text('X');
		spanCpass.css('color','red');
	}

})


})