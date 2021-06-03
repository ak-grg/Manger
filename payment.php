
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Payment</title>

    <link rel="stylesheet" href="payment.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

  <!-- Bootstrap scripts -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    </head>
  <body>
    <?php
    include("config/config.php");
    include("includes/classes/User.php");
    include("includes/classes/item.php");
    include("includes/classes/orderlist.php");
    if(isset($_SESSION['username'])){
        $userLoggedIn = ($_SESSION['username']);
        $users_details_query = mysqli_query($con , "SELECT * from users where user_name = '$userLoggedIn'");
        $user = mysqli_fetch_array($users_details_query);
    }
    else{
        header("Location: index.php");
    }
    ?>
    <div class="card">
    <div class="card-top border-bottom text-center"> <a href="main.php"> Back to Menu</a> <h2 class="logo">Manger</h2> </div>
    <div class="card-body">
        <div class="row upper"> <span><i class="fa fa-check-circle-o"></i> Shopping bag</span> <span><i class="fa fa-check-circle-o"></i> Order details</span> <span id="payment"><span id="three">3</span>Payment</span> </div>
        <div class="row">
            <div class="col-md-7">
                <div class="left border">
                    <div class="row"> <span class="header">Payment</span>
                        <div class="icons"> 
                            <img src="https://img.icons8.com/color/48/000000/visa.png" />
                            <img src="https://img.icons8.com/color/48/000000/mastercard-logo.png" />
                            <img src="https://img.icons8.com/color/48/000000/maestro.png" /> </div>
                    </div>
                    <form> <span>Cardholder's name:</span> <input placeholder="Suresh Raina"> <span>Card Number:</span> <input placeholder="0125 6780 4567 9909">
                        <div class="row">
                            <div class="col-4"><span>Expiry date:</span> <input placeholder="YY/MM"> </div>
                            <div class="col-4"><span>CVV:</span> <input id="cvv"> </div>
                        </div> 
                    </form>
                    <hr>
                    <div class="header">Order Summary</div>
                    <?php
    
                    $orderlist = new orderitem($con,$userLoggedIn);
                    $orderlist->loadItems();
                    
                    ?>
                </div>
            </div>
            <div class="col-md-5">
                <div class="right border">
                    
                    <div class="row lower">
                        <div class="col text-left">Subtotal</div>
                        <div class="col text-right"><?php $orderlist->totalitems();?></div>
                    </div>
                    <div class="row lower">
                        <div class="col text-left">Delivery</div>
                        <div class="col text-right">Free</div>
                    </div>
                    <div class="row lower">
                        <div class="col text-left"><b>Total to pay</b></div>
                        <div class="col text-right"><b><?php $orderlist->totalitems();?></b></div>
                    </div>
                    <div class="row lower">
                        <div class="col text-left"><a href="#"><u>Add promo code</u></a></div>
                    </div> <button type="button" class="btn btn-warning"><a href="thankyou.php">Place order</a></button>
                       <button  type="button" class="btn btn-warning"> <a href="includes/handlers/cancel_handler.php">Cancel order</a></button>
                    <p class="text-muted text-center">Complimentary Shipping & Returns</p>
                </div>
            </div>
        </div>
    </div>
    <div> </div>
</div>
  </body>
</html>
