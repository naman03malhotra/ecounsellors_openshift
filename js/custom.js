function isValidEmail(emailAddress) {

        var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);

        return pattern.test(emailAddress);

    };


$(document).ready(function(){


	//alert('got here');
	 // Focus to the username field on body loads
	$('#login').click(function(e){ // Create `click` event function for login
		 e.preventDefault();
		//$('#emailid').focus();
		// alert('got here 2');
		var emailid = $('#emailid'); // Get the username field
		var password = $('#password'); // Get the password field
		var login_result = $('.login_result'); // Get the login result div
		login_result.html('<img style="height:70px;width:70px;" src="images/loading.gif"/>');
		//login_result.html('<p class="error">loading..</p>'); // Set the pre-loader can be an animation
		if(emailid.val() == ''){ // Check the username values is empty or not
			emailid.focus(); // focus to the filed
			login_result.html('<p class="error">Enter the Email ID</p>');
			return false;
		}
		 if (!isValidEmail(emailid.val())) {
		 	emailid.focus(); // focus to the filed
			login_result.html('<p class="error">Please enter a valid Email</p>');
			return false;
		}
		if(password.val() == ''){ // Check the password values is empty or not
			password.focus();
			login_result.html('<p class="error">Enter the Password</p>');
			return false;
		}
		if(emailid.val() != '' && password.val() != ''){ // Check the username and password values is not empty and make the ajax request
			var UrlToPass = 'action=login&emailid='+emailid.val()+'&password='+password.val();
			$.ajax({ // Send the credential values to another checker.php using Ajax in POST menthod
			type : 'POST',
			data : UrlToPass,
			url  : 'checker.php',
			success: function(responseText){ // Get the result and asign to each cases
				if(responseText == 0){
					login_result.html('<p class="error">Emailid or Password Incorrect!</p>');
				}
				else if(responseText == 1){
				//login_result.html('<p class="error">success!</p>');

					window.location = 'appointments';
				}
				else if(responseText==2)
				{
					login_result.html('<p class="error">Invalid email!</p>');

				}

				else{
					alert('Problem with sql query');
				}
			}
			});


	}
		return false;
	});
});

$(document).ready(function() {


$('#signup').click(function(e){ // Create `click` event function for login
		 e.preventDefault();
		//$('#emailid2').focus();
		// alert('got here 2');
		var name = $('#name2');
		var emailid = $('#emailid2'); // Get the username field
		var password = $('#password2'); // Get the password field
		var cpassword = $('#cpassword2');
		var phone=$('#phone');
		var login_result = $('.login_result'); // Get the login result div
		login_result.html('<img style="height:70px;width:70px;" src="images/loading.gif"/>'); // Set the pre-loader can be an animation
		if(name.val() == ''){ // Check the username values is empty or not
			name.focus(); // focus to the filed
			login_result.html('<p class="error">Please enter your name.</p>');
			return false;
		}
		if(phone.val() == ''){ // Check the username values is empty or not
			phone.focus(); // focus to the filed
			login_result.html('<p class="error">Please enter your Phone Number.</p>');
			return false;
		}

		if(emailid.val() == ''){ // Check the username values is empty or not
			emailid.focus(); // focus to the filed
			login_result.html('<p class="error">Please enter your Email ID</p>');
			return false;
		}
		 if (!isValidEmail(emailid.val())) {
		 	emailid.focus(); // focus to the filed
			login_result.html('<p class="error">Please enter a valid Email</p>');
			return false;
		}
		if(password.val() == ''){ // Check the password values is empty or not
			password.focus();
			login_result.html('<p class="error">Enter the Password</p>');
			return false;
		}
		if(cpassword.val() == ''){ // Check the password values is empty or not
			cpassword.focus();
			login_result.html('<p class="error">Enter the Confirm Password</p>');
			return false;
		}
		if(password.val()!=cpassword.val())
		{
			login_result.html('<p class="error">Passwords Do Not match</p>');
			return false;
		}

		if(emailid.val() != '' && password.val() != ''){ // Check the username and password values is not empty and make the ajax request
			var UrlToPass = 'action=signup&name='+name.val()+'&emailid='+emailid.val()+'&phone='+phone.val()+'&password='+password.val()+'&cpassword='+cpassword.val();
			$.ajax({ // Send the credential values to another checker.php using Ajax in POST menthod
			type : 'POST',
			data : UrlToPass,
			url  : 'checker.php',
			success: function(responseText){ // Get the result and asign to each cases
				if(responseText == 0){
					login_result.html('<p class="error">Email ID already registered!</p>');
				}
				else if(responseText == 1){
				login_result.html('<p class="error">Passwords does not Match. Please try again.</p>');

					//window.location = 'index.php';
				}
				else if(responseText==2)
				{
					login_result.html('<p class="error">Something Went Wrong!<br>Couldn\'t register now. Please try again later.</p>');

				}
				else if(responseText==3)
				{
					window.location='index';
				}
				else{
					alert('Problem with sql query');
				}
			}
			});

			}
		return false;
	});

});




$(document).ready(function() {

$('#change').click(function(e){ // Create `click` event function for login
		 e.preventDefault();
		$('#passwordc').focus();
		
		//var name = $('#name2');
		var passwordc = $('#passwordc'); // Get the username field
		var password2 = $('#password2'); // Get the password field
		var password3 = $('#password3');
		var login_result = $('.login_result'); // Get the login result div
		login_result.html('<img style="height:70px;width:70px;" src="images/loading.gif"/>'); // Set the pre-loader can be an animation
		if(passwordc.val() == ''){ // Check the username values is empty or not
			passwordc.focus(); // focus to the filed
			login_result.html('<p class="error"> Enter the current password</p>');
			return false;
		}
		
		if(password2.val() == ''){ // Check the password values is empty or not
			password2.focus();
			login_result.html('<p class="error">Enter the New Password</p>');
			return false;
		}
		if(password3.val() == ''){ // Check the password values is empty or not
			password3.focus();
			login_result.html('<p class="error">Enter the New Confirm Password</p>');
			return false;
		}
		if(password2.val()!=password3.val())
		{
			login_result.html('<p class="error">Passwords Do not Match</p>');
			return false;
		}


		if(passwordc.val() != '' && password2.val() != ''){ // Check the username and password values is not empty and make the ajax request
			var UrlToPass = 'action=change&passwordc='+passwordc.val()+'&password2='+password2.val()+'&password3='+password3.val();
			$.ajax({ // Send the credential values to another checker.php using Ajax in POST menthod
			type : 'POST',
			data : UrlToPass,
			url  : 'checker.php',
			success: function(responseText){ // Get the result and asign to each cases
				if(responseText == 0){
					login_result.html('<p class="error">Passwords do not match, please try again</p>');
				}
				else if(responseText == 1){
				login_result.html('<p class="error">Passwords Changed Successfully</p>');

					
				}
				else if(responseText == 4){
				login_result.html('<p class="error">Current Password is not correct. </p>');

					
				}
				else if(responseText==2)
				{
					login_result.html('<p class="error">Something Went Wrong!<br>Couldn\'t register now. Please try again later.</p>');

				}
				
				else{
					alert('Problem with sql query, Please contact Us ASAP.');
				}
			}
			});

			}
		return false;
	});




});



























/*
	
$('#changepass').click(function(e){ // Create `click` event function for login
		 e.preventDefault();
		//$('#emailid3').focus();
		alert('got here 2');
		//var name = $('#name2');
		var emailid = $('#emailid'); // Get the username field
		var password = $('#password'); // Get the password field
		var cpassword = $('#cpassword');
		var login_result = $('.login_result'); // Get the login result div
		login_result.html('<p class="error">loading..</p>'); // Set the pre-loader can be an animation
		if(emailid.val() == ''){ // Check the username values is empty or not
			//emailid.focus(); // focus to the filed
			login_result.html('<p class="error">Email ID absent.</p>');
			return false;
		}
		 
		if(password.val() == ''){ // Check the password values is empty or not
			password.focus();
			login_result.html('<p class="error">Enter the Password</p>');
			return false;
		}
		if(cpassword.val() == ''){ // Check the password values is empty or not
			cpassword.focus();
			login_result.html('<p class="error">Enter the Confirmation Password</p>');
			return false;
		}
		if(emailid.val() != '' && password.val() != ''){ // Check the username and password values is not empty and make the ajax request
			var UrlToPass = 'action=change&emailid='+emailid.val()+'&password='+password.val()+'&cpassword='+cpassword.val();
			$.ajax({ // Send the credential values to another checker.php using Ajax in POST menthod
			type : 'POST',
			data : UrlToPass,
			url  : 'checker.php',
			success: function(responseText){ // Get the result and asign to each cases
				if(responseText==0){
				login_result.html('<p class="error">Passwords does not Match. Please try again.</p>');

					//window.location = 'index.php';
				}
				else if(responseText==1)
				{
					login_result.html('<p class="error">Password Changed Successfully.</p>');

				}
				else if(responseText==2)
				{
					login_result.html('<p class="error">Something Went wrong.</p>');
				}
				else if(responseText==3)
				{
					login_result.html('<p class="error">'You are not a valid user.'</p>');
				}
				else{
					alert('Problem with sql query');
				}
			}
			});

			}
		return false;
	});
*/