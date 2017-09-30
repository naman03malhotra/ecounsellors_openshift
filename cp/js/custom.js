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
		var login_result = $('.login_result');
		var btn=$('#login');
		btn.addClass("m-progress");

		 // Get the login result div
		//login_result.html('<img style="height:70px;width:70px;" src="images/loading.gif"/>');
		//login_result.html('<p class="error">loading..</p>'); // Set the pre-loader can be an animation
		if(emailid.val() == ''){ // Check the username values is empty or not
			emailid.focus(); // focus to the filed
			login_result.html('<p class="error">Enter the Email ID</p>');
			btn.removeClass("m-progress");
			return false;
		}
		 if (!isValidEmail(emailid.val())) {
		 	emailid.focus(); // focus to the filed
			login_result.html('<p class="error">Please enter a valid Email</p>');
			btn.removeClass("m-progress");
			return false;
		}
		if(password.val() == ''){ // Check the password values is empty or not
			password.focus();
			login_result.html('<p class="error">Enter the Password</p>');
			btn.removeClass("m-progress");
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
					btn.removeClass("m-progress");
				}
				else if(responseText == 1){
				//login_result.html('<p class="error">success!</p>');

					window.location = 'index';
				}
				else if(responseText==2)
				{
					login_result.html('<p class="error">Invalid email!</p>');
					btn.removeClass("m-progress");

				}

				else{
					alert('Problem with sql query');
					btn.removeClass("m-progress");
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
		var ph = $('#ph');
		var emailid = $('#emailid2'); // Get the username field
		var password = $('#password2'); // Get the password field
		var cpassword = $('#cpassword2');
		var login_result = $('.login_result2'); // Get the login result div
		var btn=$('#signup');
		btn.addClass("m-progress");
		//login_result.html('<img style="height:70px;width:70px;" src="images/loading.gif"/>'); // Set the pre-loader can be an animation
		if(name.val() == ''){ // Check the username values is empty or not
			name.focus(); // focus to the filed
			login_result.html('<p class="error">Please enter your name.</p>');
			btn.removeClass("m-progress");
			return false;
		}

		if(emailid.val() == ''){ // Check the username values is empty or not
			emailid.focus(); // focus to the filed
			login_result.html('<p class="error">Please enter your Email ID</p>');
			btn.removeClass("m-progress");
			return false;
		}
		if(ph.val() == ''){ // Check the username values is empty or not
			ph.focus(); // focus to the filed
			login_result.html('<p class="error">Please enter 10 digit mobile number</p>');
			btn.removeClass("m-progress");
			return false;
		}
		if(ph.val().length < 10){ // Check the username values is empty or not
			ph.focus(); // focus to the filed
			login_result.html('<p class="error">10 digit number required.</p>');
			btn.removeClass("m-progress");
			return false;
		}
		 if (!isValidEmail(emailid.val())) {
		 	emailid.focus(); // focus to the filed
			login_result.html('<p class="error">Please enter a valid Email</p>');
			btn.removeClass("m-progress");
			return false;
		}
		if(password.val() == ''){ // Check the password values is empty or not
			password.focus();
			login_result.html('<p class="error">Enter the Password</p>');
			btn.removeClass("m-progress");
			return false;
		}
		if(cpassword.val() == ''){ // Check the password values is empty or not
			cpassword.focus();
			login_result.html('<p class="error">Enter the Confirm Password</p>');
			btn.removeClass("m-progress");
			return false;
		}

		if(emailid.val() != '' && password.val() != ''){ // Check the username and password values is not empty and make the ajax request
			var UrlToPass = 'action=signup&name='+name.val()+'&emailid='+emailid.val()+'&password='+password.val()+'&ph='+ph.val()+'&cpassword='+cpassword.val();
			$.ajax({ // Send the credential values to another checker.php using Ajax in POST menthod
			type : 'POST',
			data : UrlToPass,
			url  : 'checker.php',
			success: function(responseText){ // Get the result and asign to each cases
				if(responseText == 0){
					login_result.html('<p class="error">Email ID already registered!</p>');
					btn.removeClass("m-progress");
				}
				else if(responseText == 1){
				login_result.html('<p class="error">Passwords does not Match. Please try again.</p>');
				btn.removeClass("m-progress");

					//window.location = 'index.php';
				}
				else if(responseText==2)
				{
					login_result.html('<p class="error">Something Went Wrong!<br>Couldn\'t register now. Please try again later.</p>');
					btn.removeClass("m-progress");

				}
				else if(responseText==3)
				{
					window.location='manage';
				}
				else{
					alert('Problem with sql query');
					btn.removeClass("m-progress");
				}
			}
			});

			}
		return false;
	});

});







$('.change').click(function(e){ // Create `click` event function for login
		 e.preventDefault();
		$('#emailid').focus();
		
		//var name = $('#name2');
		var emailid = $('#emailid'); // Get the username field
		var password = $('#password'); // Get the password field
		var cpassword = $('#cpassword');
		var login_result = $('.login_result'); // Get the login result div
		login_result.html('<img style="height:70px;width:70px;" src="images/loading.gif"/>'); // Set the pre-loader can be an animation
		if(emailid.val() == ''){ // Check the username values is empty or not
			emailid.focus(); // focus to the filed
			login_result.html('<p class="error">Email is missing</p>');
			return false;
		}
		
		if(password.val() == ''){ // Check the password values is empty or not
			password.focus();
			login_result.html('<p class="error">Enter the Password</p>');
			return false;
		}
		if(cpassword.val() == ''){ // Check the password values is empty or not
			password.focus();
			login_result.html('<p class="error">Enter the Confirmation Password</p>');
			return false;
		}
		if(emailid.val() != '' && password.val() != ''){ // Check the username and password values is not empty and make the ajax request
			var UrlToPass = 'action=change&name='+name.val()+'&emailid='+emailid.val()+'&password='+password.val()+'&cpassword='+cpassword.val();
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

					//window.location = 'index.php';
				}
				else if(responseText==2)
				{
					login_result.html('<p class="error">Something Went Wrong!<br>Couldn\'t register now. Please try again later.</p>');

				}
				
				else{
					alert('Problem with sql query');
				}
			}
			});

			}
		return false;
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