<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="static/css/nav.css">
    <link rel="stylesheet" href="static/css/viewProduct_style.css">
    <link rel="icon" href="/static/img/mainicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Paytone+One&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">


</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary cu_nav">
  <div class="container-fluid">
    <div>
      <img src="static/img/leaves.png" alt="" class="main_icon">
    <a class="navbar-brand cu_white cu_Ti anton-regular  " href="#">GreenHarvest </a>
  </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav c_ter">
      <script src="https://cdn.lordicon.com/lordicon.js"></script>
      <div class="div_ico">
        <img src="/static/img/home.png" class="img_ico">
        <a class="nav-link  c_top" aria-current="page" href="index.php" >Home</a>
      </div>
      <div class="div_ico">
        <img src="/static/img/add-product.png" class="img_ico c_add">
        <a class="nav-link c_top" href="AddProducts.php">Add product</a></div>
        <div class="div_ico">
          <img src="/static/img/search (1).png" class="img_ico">
        <a class="nav-link c_top" href="#">View product</a></div>
        <div class="div_ico">
          <img src="/static/img/logout.png" class="img_ico">
        <a class="nav-link  c_top" href="logout.php">Logout</a></div>
      </div>
    </div>
  </div>
</nav>
<div class="container">
  <center>
  <div class="search_bar  col-lg-7 mb-4">

    <input type="search" name="" id="" placeholder="Search..." class="form-control search_in search" >
  </div>
  <div class="category col-lg-6">
    <div class="cat_ico"><img src="/static/img/apple.png" alt=""><p>Fruits</p></div>
    <div class="cat_ico"><img src="/static/img/vegetable.png" alt=""><p>Vegetables</p></div>
    <div class="cat_ico"><img src="/static/img/milk.png" alt=""><p>Diary</p></div>
    <div class="cat_ico"><img src="/static/img/honey.png" alt=""><p>Sweets</p></div>
  </div>
</center>
  <?php 
  $con=mysqli_connect("localhost","root","","dbfarmerconsumer");
  if(!$con)
  {
    die("Connection failed: " . mysqli_connect_error());
  }
  $sql="SELECT * FROM products ORDER BY ProductId DESC";
  $result=mysqli_query($con,$sql);
  if($result&&mysqli_num_rows($result)>0){
      
  }else{
      echo "No products found";
  }
  mysqli_close($con);
  $x=0;
  foreach($result as $row):?>
    <?php if($x%4==0):?>
      <div class="card-group">
      <?php endif;?>
  <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
  <div class="card cu_card">
    <img src="<?php echo $row['ProductImgPath']?>" class="card-img-top cu_img" alt="...">
    <div class="card-body">
    <span class="p_cost paytone-one-regular">₹<?php echo $row['ProductCost'];?></span>
      <h5 class="card-title paytone-one-regular"><?php echo $row['ProductName'];?></h5>
      <p class="card-text poppins-medium"><?php echo $row['ProductDescription'];?></p>
      <p class="card-text poppins-medium">Farmer Name: <?php echo $row['FarmerName'];?></p>
      <p class="card-text poppins-medium">Available Quantity:<?php echo $row['ProductQuantity']; if($row['isCount']){echo " count";}else{echo " kg";}?></p>
      <button class="btn btn-darkgreen poppins-medium">Buy Now</button>
    </div>
  </div>
  </div>
  <?php if($x%4==3):?>
    </div>
      <?php endif;?>
    <?php $x++;?>
  <?php endforeach;?>
  

<!--div class="card-group">
  <div class="col-sm-6 col-md-4 col-lg-4 mb-4">
  <div class="card cu_card">
    <img src="/static/img/veg.png" class="card-img-top cu_img" alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
    </div>
  </div>
</div>

  <div class="card cu_card">
    <img src="static/img/fruit.jpg" class="card-img-top cu_img" alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
      <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
    </div>
  </div>
</div-->
</div>
</body>
</html>