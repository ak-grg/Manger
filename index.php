<?php

require 'config/config.php';
require 'includes/form_handlers/register_handler.php';
require 'includes/form_handlers/login_handler.php';

?>


<!DOCTYPE html>
<html>
<head>
	<title>Welcome to MANGER!</title>
	<link rel="stylesheet" type="text/css" href="assets/css/register_style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="assets/js/register.js"></script>
</head>
<body>
	<?php 

	if(isset($_POST['reg_button'])){
		echo '
		<script>
		$(document).ready(function(){
			$("#first").hide();
			$("#second").show();
		});
		</script>
		';
	}

	?>



	<div class="wrapper">
		<div class="login_box">
			<div class = "login_head">
				<h1>Login or signup below!</h1>
			</div>
		<div id="first">
			<form actoin="index.php" method="POST">
			<input type="email" name="log_email" placeholder="Email ID" value="<?php 
			if(isset($_SESSION['log_email'])){
				echo $_SESSION['log_email'];
			}
			?>" required>
			<br>
			<input type="password" name="log_password" placeholder="Password">
			<br>
			<input type="submit" name="login_button" value="Login" required>
			<br>
			<?php 
			if(in_array("Email or password incorrect!", $err_array)){
				echo "Email or password incorrect!<br>";
			}?>
			<a href="#" id="signup" class="signup">Not logged in? Register here!</a>
			</form>
		</div>

		<div id="second">
			<form actoin="index.php" method="POST">
				<input type="text" name="reg_fname" placeholder="First Name" value="<?php 
				if(isset($_SESSION['reg_fname'])){
					echo $_SESSION['reg_fname'];
				}
				?>" required>
				<br>
				<?php 
				if(in_array("Your First name must be between 2 and 25 characters!", $err_array)){
					echo "Your First name must be between 2 and 25 characters!<br>";
				}?>
				

				<input type="text" name="reg_lname" placeholder="Last Name" value="<?php 
				if(isset($_SESSION['reg_lname'])){
					echo $_SESSION['reg_lname'];
				}
				?>"  required>
				<br>
				<?php if(in_array("Your Last name must be between 2 and 35 characters!", $err_array)){
					echo "Your Last name must be between 2 and 35 characters!<br>";
				}?>


				<input type="email" name="reg_email" placeholder="Email ID" value="<?php 
				if(isset($_SESSION['reg_email'])){
					echo $_SESSION['reg_email'];
				}
				?>" required>
				<br>
				<input type="email" name="reg_email2" placeholder="Re-enter Email ID" value="<?php 
				if(isset($_SESSION['reg_email2'])){
					echo $_SESSION['reg_email2'];
				}
				?>" required>
				<br>
				<?php if(in_array("Email already signed in!", $err_array)){
					echo "Email already signed in!<br>";}
					else if(in_array("Invalid Email Format!!", $err_array)){
					echo "Invalid Email Format!!<br>";}
					else if(in_array("Emails don't match!", $err_array)){
					echo "Emails don't match!<br>";
				}?>




				<input type="password" name="reg_password" placeholder="Password" required>
				<br>
				<input type="password" name="reg_password2" placeholder="Re-enter Password" required>
				<br>
				<?php if(in_array("Your password can only contain english letters and numbers!", $err_array)){
					echo "Your password can only contain english letters and numbers!<br>";}
					else if(in_array("Passwords don't match!", $err_array)){
					echo "Passwords don't match!<br>";}
					else if(in_array("Please enter password of length greater than 5 and less than 30!", $err_array)){
					echo "Please enter password of length greater than 5 and less than 30!<br>";
				}?>
				<input type="submit" name="reg_button" value ="Register" required>
				<br>
				<?php 
				if(in_array("<span style ='color: #14C800'>You are all set! Go ahead and login!", $err_array)){
					echo "<span style ='color: #14C800'>You are all set! Go ahead and login!<br>";
				}?>

				<a href="#" id="signin" class="signin">Aready have an account? Login here!</a>

			</form>
		</div>
		</div>
	</div>

</body>
</html>

