
  // other code here


$('#change').click(function(e){ // Create `click` event function for login
		 e.preventDefault();
		//$('#emailid3').focus();
		// alert('got here 2');
		//var name = $('#name2');
		var emailid = $('#emailid3'); // Get the username field
		var password = $('#password3'); // Get the password field
		var cpassword = $('#cpassword3');
		var login_result = $('.login_result'); // Get the login result div
		login_result.html('<p class="error">loading..</p>'); // Set the pre-loader can be an animation
		if(emailid.val() == ''){ // Check the username values is empty or not
			emailid.focus(); // focus to the filed
			login_result.html('<p class="error">Email ID absent.</p>');
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


