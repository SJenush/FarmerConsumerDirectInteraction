<?php
 session_start();
 if(isset($_SESSION['Username'])){
 $user=$_SESSION['Username'];
 }else{
   header("Location:login.php");
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
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
<?php include "nav_bar.php"?>
<div class="container">
    <h2 class="topic">Cart Items:</h2>
  <?php 
  $con=mysqli_connect("localhost","root","","dbfarmerconsumer");
  if(!$con)
  {
    die("Connection failed: " . mysqli_connect_error());
  }
  $sql="SELECT * FROM cart WHERE Username='$user' ORDER by CartDate DESC;";
  $result=mysqli_query($con,$sql);
  if($result&&mysqli_num_rows($result)>0){
      
  }else{
      echo "<div class='d-flex justify-content-center align-items-center' style='height: 200px; color:green;'>
    <h2>Cart is empty!</h2>
    </div>";
  }
  mysqli_close($con);
  $x=0;
  foreach($result as $row):?>
    <?php if($x%4==0):?>
      <div class="card-group">
      <?php endif;?>
  <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
  <div class="card cu_card">
    <img src="<?php echo $row['ProductImg']?>" class="card-img-top cu_img" alt="...">
    <div class="card-body">
    <span class="p_cost paytone-one-regular">₹<?php echo $row['ProductCost'];?></span>
      <h5 class="card-title paytone-one-regular"><?php echo $row['ProductName'];?></h5>
      <p class="card-text poppins-medium">Farmer Name: <?php echo $row['FarmerName'];?></p>
      <p class="card-text poppins-medium">Quantity:<?php echo $row['ProductQuantity'];?></p>
      
    </div>
  </div>
  </div>
  <?php if($x%4==3):?>
    </div>
      <?php endif;?>
    <?php $x++;?>
  <?php endforeach;?>
</div>
</body>
</html>