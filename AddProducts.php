<?php
session_start();
$msg="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
  $prod_name=$_POST['prod_name'];
  $prod_des=$_POST['prod_des'];
  $prod_quantity=$_POST['prod_quantity'];
  $unit=$_POST['unit'];
  $isCount=TRUE;
  if($unit=="kg"){
    $isCount=FALSE;
  }
  $farmer_name=$_SESSION['Username'];
  $img_name=$_FILES['prod_img']['name'];
  $img_tmp=$_FILES['prod_img']['tmp_name'];
  $fileExtension = pathinfo($img_name, PATHINFO_EXTENSION);
  
  $img_un_name='img'.uniqid().'.'. $fileExtension;
  $img_path='static/userimg/'. $img_un_name;
  //Setting connection
  $con=mysqli_connect("localhost","root","","dbfarmerconsumer");
  if(!$con){
    die("Error while connection".mysqli_connect_error());
  }
  if(move_uploaded_file($img_tmp,$img_path)){
  $sql="INSERT INTO products (ProductName	,ProductDescription,ProductQuantity,isCount,ProductImgPath,FarmerName) VALUES('$prod_name','$prod_des','$prod_quantity','$isCount','$img_path','$farmer_name')";
  if(mysqli_query($con,$sql)){
    $msg= "Product Successfully added";
  }else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
  }else{
    $msg= "Could not upload image!";
  }
mysqli_close($con);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="static/css/addProduct_style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
<script src="https://cdn.lordicon.com/lordicon.js"></script>

</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary cu_nav">
  <div class="container-fluid">
    <a class="navbar-brand cu_white cu_Ti anton-regular  " href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav c_ter">
      <script src="https://cdn.lordicon.com/lordicon.js"></script>

        <a class="nav-link  c_top" aria-current="page" href="#" >Home</a>
        <a class="nav-link c_top" href="#">Add product</a>
        <a class="nav-link c_top" href="#">View product</a>
        <a class="nav-link  c_top" aria-disabled="true">Logout</a>
      </div>
    </div>
  </div>
</nav>
<div class="contain">
<center>
      <h2 class="msg"><?php echo $msg?></h2>
       <img src="/static/img/farmer.png" class="ico"> 
       <h2>Farmer Name</h2></center>
<div class="flex-container">
  <div>
    <form class="form" action="" method="POST" enctype="multipart/form-data">
       
        <h3 class="na">Add Product:</h3>
        <table>
            <tr class="rw">
                <td>Product Name:</td><td><input type="text" class="form-control" name="prod_name"></td>
            </tr>
            <tr class="rw">
                <td>Avaliable quantity:</td><td><input type="number"class="form-control" name="prod_quantity"></td>
            </tr>
            <tr class="rw">
                <td>Quantity unit:</td><td><input type="radio"class="form-check-input" value="kg" name="unit" checked><label for="" class="form-check-label lab">in kg</label>
                <input type="radio"class="form-check-input" value="count" name="unit"><label class="form-check-label lab">count</label></td>
            </tr>
            <tr class="rw">
                <td>Description:</td><td><textarea type="text"class="form-control" name="prod_des"></textarea></td>
            </tr>
            <tr class="rw">
                <td>Add To Image:</td>
                <td><input type="file" class="form-control" name="prod_img"></td>
                
            </tr>
            <tr class="rw">
                <td></td>
                <td><input type="submit" value="Add Product" class="btn btn-primary butn"></td>
            </tr>
        </table>

    </form>

  </div>
  <div class="img_box">
    <img src="/static/img/veg.png" alt="" srcset="" class="img_cu">
  </div>
</div>

</div>
</body>
</html>