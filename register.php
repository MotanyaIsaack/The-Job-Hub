<?php 
	//Include the config file
	require_once 'config.php';

	//Define the variables and initialize them with empty values
	$firstname = $lastname = $email = $username = $password = "";
	$firstname_err = $lastname_err = $email_err = $username_err = $password_err = "";

	//Proccesing form data when the form is submitted
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		 # Validate firstname
	    if(empty(trim($_POST['firstname']))){
	        $firstname_err = "Please enter your First Name.";     
	    }else{
	        $firstname = trim($_POST['firstname']);
	    }

	     # Validate lastname
	    if(empty(trim($_POST['lastname']))){
	        $lastname_err = "Please enter your Last Name.";     
	    }else{
	        $lastname = trim($_POST['lastname']);
	    }

	     # Validate email
	    if(empty(trim($_POST['email']))){
	        $email_err = "Please enter your Email.";     
	    }else{
	        $email = trim($_POST['email']);
	    }

		# Validate username
		if (empty(trim($_POST["username"]))) {
			$username_err = "Please Enter a Username";
		}else{
			//Prepare a select statement
			$sql = "SELECT user_id FROM users WHERE username=?";

			if ($stmt = mysqli_prepare($connect, $sql)) {
				//Bind variables to the prepared statement as parameters
				mysqli_stmt_bind_param($stmt, "s", $param_username);

				//Set parameters
				$param_username = trim($_POST["username"]);

				//Attempt to excecute the prepared statement
				if (mysqli_stmt_execute($stmt)) {
					/*Store result set*/
					mysqli_stmt_store_result($stmt);

					if (mysqli_stmt_num_rows($stmt) ==1) {
						$username_err = "This username has already been taken";
					}else{
						$username = trim($_POST["username"]);
					}	
				}else{
					echo "Ooops! Something went wrong. Please try again later";
				}
			}

			//Close the statement
			mysqli_stmt_close($stmt);
		}

		// Validate password
	    if(empty(trim($_POST['password']))){
	        $password_err = "Please enter a password.";     
	    } elseif(strlen(trim($_POST['password'])) < 6){
	        $password_err = "Password must have atleast 6 characters.";
	    } else{
	        $password = trim($_POST['password']);
	    }

	    //Check input errors before entering in the database
	    if (empty($firstname_err) && empty($lastname_err) && empty($email_err) && empty($username_err) && empty($password_err)) {
	    	//Prepare an insert statement
	    	$sql = "INSERT INTO users (firstname,lastname,email,username,password) VALUES (?, ?, ?, ?, ?)";
	    	if ($stmt = mysqli_prepare($connect, $sql)) {
	    		//Bind the variables to the prepared statement as parameters
	    		mysqli_stmt_bind_param($stmt, "sssss", $param_firstname, $param_lastname, $param_email, $param_username, $param_password);

	    		//Set parameters
	    		$param_firstname = $firstname;
	    		$param_lastname = $lastname;
	    		$param_email = $email;
	    		$param_username = $username;
	    		//Creates a password hash
	    		$param_password = password_hash($password, PASSWORD_DEFAULT);

	    		//Attempt to execute the prepared statement
	    		if (mysqli_stmt_execute($stmt)) {
	    			//Redirect to Login Page
	    			header("location: index.php");
	    		}else{
	    			echo "Something went wrong. Please try again later";
	    		}

	    	}
	    	//Close the statement
	    	mysqli_stmt_close($stmt);
	    }
	    //Close connection
	    mysqli_close($connect);
	}

?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Sign Up</title>
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
    <link href="css/signup.css" rel="stylesheet">
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
		 <form class="form-signin validate-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		      <img class="mb-4" src="images/icons/apply-icon.png" alt="Check image path">
		      <h1 class="h3 mb-3 font-weight-normal text">Please Sign In</h1>

		      <div class="inputField form-group <?php echo (!empty($firstname_err)) ? 'has-error' : ''; ?>" data-validate="First Name is required!">
		  		<label for="inputFirstname" class="sr-only">First Name</label>
		 	 	<input type="firstname" id="inputFirstname" class="form-control" placeholder="First Name" required autofocus name="firstname">
		      </div>

		       <div class="inputField form-group <?php echo (!empty($lastname_err)) ? 'has-error' : ''; ?> validate-form" data-validate = "Valid email is required ie: morzey@abc.xyz">
		  		<label for="inputLastname" class="sr-only">Last Name</label>
		 	 	<input type="lastname" id="inputLastname" class="form-control" placeholder="Last Name" required autofocus name="lastname">
		      </div>

		       <div class="inputField form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
		  		<label for="inputEmail" class="sr-only">Email</label>
		 	 	<input type="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus name="email">
		      </div>

		      <div class="inputField form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
		  		<label for="inputUsername" class="sr-only">Username</label>
		 	 	<input type="username" id="inputUsername" class="form-control" placeholder="Username" required autofocus name="username">
		      </div>

		      <div class="inputField form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
		  	 	<label for="inputPassword" class="sr-only">Password</label>
		      	<input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">
		      </div>
		
		       <div class="button-signup">
		       	 <button class="btn btn-lg btn-primary btn-block" type="submit">Sign In</button>
		       </div>

		       <div class="text-center p-t-136">
					<a class="txt2" href="index.php">
						Login to your Account
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
	<!-- 0724157744 -->

  </body>
</html>

