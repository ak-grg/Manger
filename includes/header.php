<?php
include("/Applications/XAMPP/xamppfiles/htdocs/MANGER/config/config.php");
include("classes/User.php");
include("classes/item.php");
//include("classes/orderlist.php");

if(isset($_SESSION['username'])){
	$userLoggedIn = ($_SESSION['username']);
	$users_details_query = mysqli_query($con , "SELECT * from users where user_name = '$userLoggedIn'");
	$user = mysqli_fetch_array($users_details_query);
}
else{
	header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome to MANGER</title>

	<!-- JS-->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/bootbox.min.js"></script>
	<script src="assets/js/nightcrawlers.js"></script>
	<script src="assets/js/jquery.jcrop.js"></script>
	<script src="assets/js/jcrop_bits.js"></script>
	<script src="https://kit.fontawesome.com/1c9ad4b785.js" crossorigin="anonymous"></script>

	<!-- Bootstrap scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>


	<!-- CSS-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/jquery.Jcrop.css" type="text/css" />
	<link rel="stylesheet" href="menu.css">
	<script>
		include("location.js");
	</script>
	<style>
	.dropbtn {
	background-color: #22292e;
	color: white;
	padding: 8px;
	font-size: 17px;
	border: none;
	}

	.dropdown {
	position: relative;
	display: inline-block;
	}

	.dropdown-content {
	display: none;
	position: absolute;
	background-color: #f1f1f1;
	min-width: 160px;
	box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	z-index: 1;
	}

	.dropdown-content a {
	color: black;
	padding: 12px 16px;
	text-decoration: none;
	display: block;
	}

	.dropdown-content a:hover {background-color: #ddd;}

	.dropdown:hover .dropdown-content {display: block;}

	.dropdown:hover .dropbtn {background-color: #3e8e41;}
	</style>
</head>
<body onload="getLocation()">

<?php $usr = new User($con,$userLoggedIn) ?>

<div class="top_bar">
    <div class="logo">
  	<a href="index.html">MANGER</a>
	</div>

	<div class = "nav2">
	<a href="main.php">Home</a>
	<div class="dropdown">
 	 <button class="dropbtn" id="dropbtn">Current Location: <?php echo $usr->getlocation(); ?></button>
 	 <div class="dropdown-content">
 	   <a href="includes/location.php?loc=Delhi">Delhi</a>
 	   <a href="includes/location.php?loc=Mumbai">Mumbai</a>
 	   <a href="includes/location.php?loc=Chennai">Chennai</a>
	   <a href="includes/location.php?loc=Kolkata">Kolkata</a>
 	 </div>
	</div>
	<div class="dropdown">
 	 <button class="dropbtn" id="dropbtn">Sort</button>
 	 <div class="dropdown-content">
 	   <a href="includes/sort.php?loc=0">Price: Low to High</a>
 	   <a href="includes/sort.php?loc=1">Price: High to Low</a>
 	   <a href="includes/sort.php?loc=2">Popularity</a>
 	 </div>
	</div>
	</div>
	<nav>
		<a href="main.php"><?php echo $user['first_name']; ?></a>
		<a href="payment.php">Payment</a>
		<a href="includes/handlers/logout.php">Logout</a>
	</nav>
</div>

	<div class="wrapper">