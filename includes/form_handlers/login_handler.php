<?php 

if(isset($_POST['login_button'])){

	$email = filter_var($_POST['log_email'], FILTER_SANITIZE_EMAIL);//sanitise email

	$_SESSION['log_email'] = $email;//store email into variable
	$password = md5($_POST['log_password']);//Get password

	$check_datsbase_query = mysqli_query($con, "SELECT * from users where email = '$email' and password='$password'");
	$check_login_query = mysqli_num_rows($check_datsbase_query);

	if($check_login_query == 1){
		$row = mysqli_fetch_array($check_datsbase_query);
		$username = $row['user_name'];

		$user_closed_query = mysqli_query($con, "SELECT * from users where email = '$email' and user_closed = 'yes'");

		if(mysqli_num_rows($user_closed_query) == 1){
			$reopen_account = mysqli_query($con , "UPDATE users set user_closed='no' where email = '$email'");
		}

		$_SESSION['username'] = $username;
		header("Location: main.php");
		exit();
	}
	else{
		array_push($err_array, "Email or password incorrect!");
	}
}

?>