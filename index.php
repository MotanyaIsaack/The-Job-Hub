<?php 
	//Include the config file
	require_once 'config.php';

	//Define the variables and initialize them with empty values
	$firstname = $lastname = $email = $username = $password = "";
	$firstname_err = $lastname_err = $email_err = $username_err = $password_err = "";

	// Processing form data when form is submitted
	if($_SERVER["REQUEST_METHOD"] == "POST"){
	 
	    // Check if username is empty
	    if(empty(trim($_POST["username"]))){
	        $username_err = 'Please enter username.';
	    } else{
	        $username = trim($_POST["username"]);
	    }
	    
	    // Check if password is empty
	    if(empty(trim($_POST['password']))){
	        $password_err = 'Please enter your password.';
	    } else{
	        $password = trim($_POST['password']);
	    }
	    
	    // Validate credentials
	    if(empty($firstname_err) && empty($lastname_err) && empty($email_err)&& empty($username_err) && empty($password_err)){
	        // Prepare a select statement
	        $sql = "SELECT username, password FROM users WHERE username = ?";
	        
	        if($stmt = mysqli_prepare($connect, $sql)){
	            // Bind variables to the prepared statement as parameters
	            mysqli_stmt_bind_param($stmt, "s", $param_username);
	            
	            // Set parameters
	            $param_username = $username;
	            
	            // Attempt to execute the prepared statement
	            if(mysqli_stmt_execute($stmt)){
	                // Store result
	                mysqli_stmt_store_result($stmt);
	                
	                // Check if username exists, if yes then verify password
	                if(mysqli_stmt_num_rows($stmt) == 1){                    
	                    // Bind result variables
	                    mysqli_stmt_bind_result($stmt, $username, $hashed_password);
	                    if(mysqli_stmt_fetch($stmt)){
	                        if(password_verify($password, $hashed_password)){
	                            /* Password is correct, so start a new session and
	                            save the username to the session */
	                            session_start();
	                            $_SESSION['username'] = $username;      
	                            header("location: cover.php");
	                        } else{
	                            // Display an error message if password is not valid
	                            $password_err = 'The password you entered was not valid.';
	                        }
	                    }
	                } else{
	                    // Display an error message if username doesn't exist
	                    $username_err = 'No account found with that username.';
	                }
	            } else{
	                echo "Oops! Something went wrong. Please try again later.";
	            }
	        }
	        
	        // Close statement
	        mysqli_stmt_close($stmt);
	    }
	    
	    // Close connection
	    mysqli_close($connect);
	}
	?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Sign In</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!--========================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/signup.png"/>
    <!--========================================================================================-->
   
    <!--========================================================================================-->
   							 <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <!--========================================================================================-->

    <!--========================================================================================-->
    							<!-- Custom styles -->
    <link href="css/signin.css" rel="stylesheet">
    <!--========================================================================================-->

    <!--========================================================================================-->
	<script defer src="/vendor/font-awesome/svg-with-js/js/fontawesome-all.js"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--========================================================================================-->
  </head>

  <body class="text-center">

  	<div class="login100-pic js-tilt" data-tilt id="image">
		<img src="images/img-01.png" alt="IMG">
	</div>

	<div>
		 <form class="form-signin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		      <img class="mb-4" src="images/icons/apply-icon.png" alt="Check image path">
		      <h1 class="h3 mb-3 font-weight-normal text">Please Sign In</h1>
		      <div class="inputField form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
		  		<label for="inputUsername" class="sr-only">Username</label>
		 	 	<input type="username" id="inputUsername" class="form-control" placeholder="Username" required autofocus name="username" value="<?php echo $username; ?>">
		 	 	<span class="help-block"><?php echo $username_err; ?></span>
		      </div>

		      <div class="inputField form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
		  	 	<label for="inputPassword" class="sr-only">Password</label>
		      	<input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">
		      	<span class="help-block"><?php echo $password_err; ?></span>
		      </div>
		 
		      <div class="checkbox mb-3">
		        <label class="text">
		          <input type="checkbox" value="remember-me"> Remember me
		        </label>
		      </div>
		       
		       <div class="inputField">
		       	 <button class="btn btn-lg btn-primary btn-block" type="submit">Sign In</button>
		       </div>

		       <div class="text-center p-t-136 text">
					<a class="txt2" href="register.php">
						Sign Up for an Account
						<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
					</a>
				</div>
		     
		      <p class="mt-5 mb-3 text-muted text">&copy; The Job Hub 2018</p>
	    </form>
	</div>
   

    <!--=========================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--=========================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--=========================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--=========================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<!--=========================================================================================-->
	<script src="js/main.js"></script>
  </body>
</html>
