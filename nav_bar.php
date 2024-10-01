<nav class="navbar navbar-expand-lg bg-body-tertiary cu_nav">
  <div class="container-fluid">
    <div>
      <img src="static/img/leaves.png" alt="" class="main_icon">
    <a class="navbar-brand cu_white cu_Ti anton-regular" href="#">GreenHarvest </a>
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
      <?php if(isset($_SESSION['Role'])&&$_SESSION['Role']=='f'):?>
      <div class="div_ico">
        <img src="/static/img/add-product.png" class="img_ico c_add">
        <a class="nav-link c_top" href="AddProducts.php">Add product</a></div>
        <?php endif;?>
        <div class="div_ico">
          <img src="/static/img/search.png" class="img_ico">
        <a class="nav-link c_top" href="ViewProducts.php">View products</a></div>
        <div class="div_ico">
          <img src="/static/img/cart_icon.png" class="img_ico">
        <a class="nav-link c_top" href="Cart.php">My Cart</a></div>
        <div class="div_ico">
          <img src="/static/img/logout.png" class="img_ico">
        <?php if(isset($_SESSION['Username'])):?>
        <a class="nav-link  c_top" href="logout.php">Logout</a>
        <?php else:?>
          <a class="nav-link  c_top" href="login.php">Login</a>
        <?php endif;?>
      </div>
      </div>
    </div>
  </div>
</nav>