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
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary cu_nav">
  <div class="container-fluid">
    <a class="navbar-brand cu_white cu_Ti poppins-medium " href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav c_ter">
        <a class="nav-link active" aria-current="page" href="#" >Home</a>
        <a class="nav-link" href="#">Features</a>
        <a class="nav-link" href="#">Pricing</a>
        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
      </div>
    </div>
  </div>
</nav>
<div>

    <form class="form">
       <center> <h2>Farmer Name</h2></center>
        <h3 class="na">Add Product:</h3>
        <table>
            <tr class="rw">
                <td>Product Name:</td><td><input type="text" class="form-control"></td>
            </tr>
            <tr class="rw">
                <td>Avaliable quantity:</td><td><input type="number"class="form-control"></td>
            </tr>
            <tr class="rw">
                <td>Quantity unit:</td><td><input type="radio"class="form-check-input" value="kg" name="unit"><label for="" class="form-check-label lab">in kg</label>
                <input type="radio"class="form-check-input" value="count" name="unit"><label class="form-check-label lab">count</label></td>
            </tr>
            <tr class="rw">
                <td>Description:</td><td><textarea type="text"class="form-control"></textarea></td>
            </tr>
            <tr class="rw">
                <td>Add To Image:</td>
                <td><input type="file" class="form-control"></td>
                
            </tr>
            <tr class="rw">
                <td></td>
                <td><input type="submit" value="Add Product" class="btn btn-primary butn"></td>
            </tr>
        </table>

    </form>

</div>

</body>
</html>