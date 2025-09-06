<?php 
    session_start();
    if (isset($_SESSION['Username'])) {
        $user=$_SESSION['Username'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer to Consumer - Home</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="static/css/nav.css">
    <link rel="stylesheet" href="static/css/index_style.css">
    <link rel="icon" href="/static/img/mainicon.png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <!-- JQuery & Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script src="static/js/index.js"></script>
</head>
<body>
    <!-- Include Navigation Bar -->
    <?php include("nav_bar.php"); ?>

    <!-- Banner Section -->
    <section class="banner text-center text-white d-flex align-items-center justify-content-center" style="background-image: url('static/img/farm-background.jpg'); height: 300px;">
        <div>
            <h1 class="user_name"><?php if(isset($user)){echo "Hi ".$user.'<br>';}?></h1>
            <h1>Welcome to GreenHarvest Site!</h1>
            <p>Buy Fresh Products Directly from Farmers!</p>
            <a href="ViewProducts.php" class="btn btn-warning">Shop Now</a>
        </div>
    </section>
    <!-- Features Section -->
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="static/img/farmeradd2.avif" alt="Farmer adding products" class="img-fluid w-100 addimg" >
                </div>
                <div class="col-md-6 text-center text-md-start p-5">
                    <h2 class="text-success">Farmers Add Products Easily</h2>
                    <p class="para">Farmers can easily register using their mobile number or email address.
                       Each product page includes fields for important details like product name, category,quantity, price, and harvest date.
                       Farmers can upload images of their products, showcasing the quality and freshness to potential consumers.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Feature Section 2 (Alternating) -->
    <section class="feature-section py-5 bg-white">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-6 order-md-2">
                    <img src="static/img/farmeradd1.avif" alt="Consumer buying products" class="img-fluid w-100">
                </div>
                <div class="col-md-6 text-center text-md-start p-5 order-md-1">
                    <h2 class="text-success">Consumers Buy Directly from Farmers</h2>
                    <p class="para">Consumers can browse and select their favorite farmers, ensuring they know exactly where their food is coming from.
                        Consumers can view the prices set directly by the farmers, ensuring fair pricing without additional markup from intermediaries.
                        Consumers have access to a wide variety of products, from fruits and vegetables.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Feature Section 3 -->
    <section class="feature-section py-5 bg-light">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="static/img/cart.png" alt="Cart and checkout" class="img-fluid w-100 homeimg">
                </div>
                <div class="col-md-6 text-center text-md-start p-5">
                    <h2 class="text-success">Easy Cart & Checkout</h2>
                    <p class="para">Add your favorite products to the cart and enjoy a seamless checkout process.
                    Consumers can easily add products to their cart with a single click while browsing.
                    The cart updates in real time, reflecting changes in stock availability, price adjustments by farmers, or any modifications the consumer makes to their order.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer Section -->
    <footer class="text-center bg-dark text-white py-3 mt-5">
        <p>&copy; 2024 GreenHarvest | All rights reserved</p>
        <p>Contact us: <a href="mailto:info@greenharvest.com" class="text-warning">info@greenharvest.com</a></p>
        <p>Follow us on: 
            <a href="#" class="text-warning">Facebook</a> | 
            <a href="#" class="text-warning">Instagram</a>
        </p>
    </footer>
    <?php
if($_SESSION['Role']=='f'){
    echo '
    
    <script src="https://cdn.botpress.cloud/webchat/v3.2/inject.js"></script>
<script src="https://files.bpcontent.cloud/2025/08/31/13/20250831135716-OCLF8VJJ.js" defer></script>
    
    ';
}else{
    echo '
    <script src="https://cdn.botpress.cloud/webchat/v3.2/inject.js"></script>
<script src="https://files.bpcontent.cloud/2025/08/31/15/20250831154020-B4FNB1KC.js" defer></script>
    ';
}
?>
</body>
</html>
