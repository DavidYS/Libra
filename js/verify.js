$(function(){
	var $email = $('input[name="email"');
	var $pass = $('input[name="password"]');
	var $cpass = $('input[name="cpassword"]');
	var spanEmail = $('#email');
	var spanPass = $('pass');
	var spanCpass = $('cpass');

	function validateEmail(element) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(element);
}
 $($email).focusout(function(){
  var valEmail =  $email.val();
  if (validateEmail(valEmail)) {
    spanEmail.text("Valid :)");
    spanEmail.css("color", "green");
  } 
else {
 spanEmail.text("Inserted email is not valid :(");
 spanEmail.css("color", "red");
  }
	});
})