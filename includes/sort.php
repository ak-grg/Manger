
<?php
    require '../config/config.php';
    include("classes/User.php");
    include("classes/item.php");


    if(isset($_GET['loc']))
        $loc = $_GET['loc'];

    if(isset($_SESSION['username'])){
	$userLoggedIn = ($_SESSION['username']);
	$users_details_query = mysqli_query($con , "SELECT * from users where user_name = '$userLoggedIn'");
	$user = mysqli_fetch_array($users_details_query);
    }
    else{
        header("Location: index.php");
    }
    $chng_query = mysqli_query($con, "UPDATE users SET num_orders = '$loc' WHERE user_name = '$userLoggedIn'");

    header("Location: ../main.php");

?>
