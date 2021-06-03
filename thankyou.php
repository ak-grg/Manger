<!DOCTYPE html>
<html lang="en">
<head>
    <title>Thankyou!</title>
</head>
<body>
<?php
    require 'config/config.php';
    include("includes/classes/User.php");
    include("includes/classes/item.php");


    if(isset($_SESSION['username'])){
	$userLoggedIn = ($_SESSION['username']);
	$users_details_query = mysqli_query($con , "SELECT * from users where user_name = '$userLoggedIn'");
	$user = mysqli_fetch_array($users_details_query);
    }
    else{
        header("Location: index.php");
    }
    $chng_query = mysqli_query($con, "DELETE FROM orderlist WHERE user_name = '$userLoggedIn'");

?>
<style>

.wrapper {
	background-image: url('resources/img/hero.jpg');
	background-size: 100%;
	width: 100%;
	height: 100%;
	min-block-size: 950px;
}

.hi h1{
	font-family: 'Bellota-LightItalic',sans-serif;
	margin-top: 0;
	margin-bottom: 0;
	color: #3f8210;
	text-shadow: #ffffff 1.5px 1.5px 2px;
	font-size: 200%;
    text-align: center;
}

.hi {
	font-family: 'Bellota-LightItalic',sans-serif;
	position: sticky;
	margin-right: auto;
	margin-left: auto;
	top: 35%;
	width: 75%;
	background-color: #ffffff;
	border: 1px solid #f0f0f0;
	border-radius: 7px;
	padding: 5px;
	opacity: 90%;
    align: center;
}

.hi h2{
	font-family: 'Bellota-LightItalic',sans-serif;
	width: 100%;
	height: 90px;
	color: #000;
	text-align: center;
	border-top-left-radius:7px; 
	border-top-right-radius:7px; 

}

.hi a{
    text-decoration: none;
    align-self: center;
    padding: 10px;
}


</style>
<div class="wrapper">
    <div class="hi">
    <h1>Thank You for using MANGER</h1>
    <h2>Your Order has been Placed!<br><br>Sit Back and enjoy</h2>
    <a href="main.php">< Continue to main Website</a>
    </div>
</div>
</body>
</html>