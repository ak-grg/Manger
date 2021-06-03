
<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <link rel="stylesheet" href="menu.css">
    	<!-- Bootstrap scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>


	<!-- CSS-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

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



    if(isset($_GET['item_id']))
        $item_id = $_GET['item_id'];




    if(isset($_POST[ 'ADD' . $item_id])){
        $num = $_POST['count'];
        $query = mysqli_query($con, "SELECT * FROM orderlist where user_name = '$userLoggedIn' AND item_id = '$item_id'");
        if(mysqli_num_rows($query)==1){
            $chng_query = mysqli_query($con, "UPDATE orderlist SET item_quantity = '$num' WHERE user_name = '$userLoggedIn' AND item_id = '$item_id'");
        }
        else{
            $query = mysqli_query($con, "INSERT into orderlist values (NULL,'$userLoggedIn','$item_id','$num')");
        }
    }
    

    ?>

    <form action="additem.php?item_id=<?php echo $item_id; ?>" name="orderl<?php echo $item_id; ?>" method = "POST">
    <input class='btn btn-warning' type='submit' name='ADD<?php echo $item_id; ?>' value='ADD' required>  
    <input name='count' type=number min=1 max=10>              
    </form>
</body>
</html>