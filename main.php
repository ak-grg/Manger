<?php
include("includes/header.php");
?>
<!-- Food Section -->
<section id="food">
  <br><br>
  <h1>Order anything you want</h1>
  <div id="testimonials-carousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
  <div class="row">
    <div class="col-lg-3">
      <img class="slides" src="resources\img\1.jpg" alt="bibimbap">
    </div>
<div class="col-lg-3">
  <img class="slides" src="resources\img\2.jpg" alt="">
</div>
<div class="col-lg-3">
  <img class="slides" src="resources\img\3.jpg" alt="">
</div>
<div class="col-lg-3">
  <img class="slides" src="resources\img\4.jpg" alt="">
</div>
  </div>
  </div>
  <div class="carousel-item">
    <div class="row">
      <div class="col-lg-3">
        <img class="slides" src="resources\img\5.jpg" alt="bibimbap">
      </div>
  <div class="col-lg-3">
    <img class="slides" src="resources\img\6.jpg" alt="">
  </div>
  <div class="col-lg-3">
    <img class="slides" src="resources\img\7.jpg" alt="">
  </div>
  <div class="col-lg-3">
    <img class="slides" src="resources\img\8.jpg" alt="">
  </div>
    </div>
  </div>

  </div>
  </div>




<div>
    
</div>
</div>

</body>
</html>

</section>
<section id="restaurant">
    <br><br>
    <h2 class="menu-hd">MENU</h2>
    
    <?php
    
    $item = new item($con,$userLoggedIn);
    $item->loadItems();
    
    ?>

    <h2 class="menu-hd">End of the page!</h2>
  </section>