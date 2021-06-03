<?php
//initialise values
$fname = "";//first name
$lname = "";//last name
$em = "";//email
$em2 = "";//email2
$password = "";
$password2 = "";
$date = "";
$err_array = array();//holds error message

if(isset($_POST['reg_button'])){

		//First name
		$fname = strip_tags($_POST['reg_fname']);//remove html tags
		$fname = str_replace(' ', '', $fname);//remove spaces
		$fname = ucfirst(strtolower($fname));//capitalise inly first letter
		$_SESSION['reg_fname']=$fname;

		//Last name
		$lname = strip_tags($_POST['reg_lname']);//remove html tags
		$lname = str_replace(' ', '', $lname);//remove spaces
		$lname = ucfirst(strtolower($lname));//capitalise inly first letter
		$_SESSION['reg_lname']=$lname;

		//Email
		$em = strip_tags($_POST['reg_email']);//remove html tags
		$em = str_replace(' ', '', $em);//remove spaces
		$em = ucfirst(strtolower($em));//capitalise inly first letter
		$_SESSION['reg_email']=$em;
		
		//Email 2
		$em2 = strip_tags($_POST['reg_email2']);//remove html tags
		$em2 = str_replace(' ', '', $em2);//remove spaces
		$em2 = ucfirst(strtolower($em2));//capitalise inly first letter
		$_SESSION['reg_email2']=$em2;

		//password
		$password = strip_tags($_POST['reg_password']);//remove html tags
		$password2 = strip_tags($_POST['reg_password2']);//remove html tags

		$date = date("Y-m-d");//current date

		// checking for email
		if($em == $em2){
			// valid format for email
			if(FILTER_VALIDATE_EMAIL){

				$em = filter_var($em,FILTER_VALIDATE_EMAIL);
				//if email already exists 
				$e_check = mysqli_query($con, "SELECT email from users where email='$em'");
				// number of rows created
				$num_rows = mysqli_num_rows($e_check);

				if($num_rows>0)
				{
					array_push($err_array, "Email already signed in!");
				}

			}
			else{
				array_push($err_array, "Invalid Email Format!!");
			}
		}
		else{
			array_push($err_array, "Emails don't match!");
		}
	

	//first name check
	if(strlen($fname)>25 ||strlen($fname) < 2){
		array_push($err_array, "Your First name must be between 2 and 25 characters!");
	}
	//last name check
	if(strlen($lname)>35 ||strlen($lname) < 2){
		array_push($err_array, "Your Last name must be between 2 and 35 characters!");
	}

	//password
	if($password == $password2){
		if(preg_match('/[^A-Za-z0-9]/', $password))
		{
			array_push($err_array, "Your password can only contain english letters and numbers!");
		}
	}
	else
		array_push($err_array, "Passwords don't match!");
	if(strlen($password)<5 || strlen($password)>30)
	{
		array_push($err_array, "Please enter password of length greater than 5 and less than 30!");
	}

	if(empty($err_array))
	{
		$password = md5($password);//encript password
		$username = strtolower($fname . "_" . $lname);
		$check_username_query = mysqli_query($con,"SELECT user_name from users where user_name='$username'");
		$i=0;
		while(mysqli_num_rows($check_username_query)!= 0){
			$i++;
			$username= $username . "_" . $i;
			$check_username_query = mysqli_query($con,"SELECT user_name from users where user_name='$username'");
		}



		$query = mysqli_query($con, "INSERT into users values (NULL,'$fname','$lname','$username','$em','$password','$date','','0','Set Location','no','user')");
		array_push($err_array, "<span style ='color: #14C800'>You are all set! Go ahead and login!");
		$_SESSION["reg_fname"]="";
		$_SESSION["reg_lname"]="";
		$_SESSION["reg_email"]="";
		$_SESSION["reg_email2"]="";

	}
}
?>
