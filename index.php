<?php 
    session_start();
    if (!isset($_SESSION['Username'])) {
        header("Location: login.php");
        exit(); // Ensure no further code is executed if not logged in
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
            <h1>Welcome to Farmer's Market</h1>
            <p>Buy Fresh Products Directly from Farmers!</p>
            <a href="#" class="btn btn-warning">Shop Now</a>
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
                    <p>Farmers can easily add their fresh produce, vegetables, and other products directly to our marketplace.</p>
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
                    <p>Consumers can browse and select their favorite farmers, ensuring they know exactly where their food is coming from.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Feature Section 3 -->
    <section class="feature-section py-5 bg-light">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="static/img/cart.png" alt="Cart and checkout" class="img-fluid w-100">
                </div>
                <div class="col-md-6 text-center text-md-start p-5">
                    <h2 class="text-success">Easy Cart & Checkout</h2>
                    <p>Add your favorite products to the cart and enjoy a seamless checkout process.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer Section -->
    <footer class="text-center bg-dark text-white py-3 mt-5">
        <p>&copy; 2024 Farmer to Consumer | All rights reserved</p>
        <p>Contact us: <a href="mailto:info@farmermarket.com" class="text-warning">info@farmermarket.com</a></p>
        <p>Follow us on: 
            <a href="#" class="text-warning">Facebook</a> | 
            <a href="#" class="text-warning">Instagram</a>
        </p>
    </footer>

</body>
</html>
