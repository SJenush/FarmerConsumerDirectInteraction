<?php
    session_start();
    if(isset($_SESSION['Username'])){
        header("Location:index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/css/login_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Login</title>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form  action="register_process.php" method="post">
                <h1>Create Account</h1>
                <span class="err">

                </span>
                <input type="text" placeholder="Name" name="username" id="reg_name" required><span id="err_name" class="err"></span>
                <input type="email" placeholder="Email" name="email" required id="reg_email"><span id="err_email" class="err"></span>
                <input type="password" placeholder="Password" name="pwd" required id="reg_pwd"><span id="err_pwd" class="err"></span>
                <select name="role" id="">
                    <option value="f">Farmer</option>
                    <option value="c">Consumer</option>
                </select>
                <button>Sign Up</button>
            </form>
        </div>

        <div class="form-container sign-in">
            <form action="login_process.php" method="post" >
                <h1>LOGIN</h1>
                <span class="err" id="log_msg">
                <?php
                    if (isset($_GET['error'])) {
                        echo "<p style='color:red;'>" . htmlspecialchars($_GET['error']) . "</p>";
                    }
                ?>
                </span>
                <input type="email" placeholder="Email" name="email" id="log_email">
                <input type="password" placeholder="Password" name="pwd" id="log_pwd">
                <a href="#">Forgot Your Password</a>
                <button>Login</button>
            </form>
        </div>

        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal detials to use all features of GreenHarvest app</p>
                    <button class="hidden" id="login">Login</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>New to GreenHarvest!</h1>
                    <p>Register to GreenHarvest to add products as a farmer or buy products directly from your desired farmer as a consumer.</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    <script src="static/js/login_val.js"></script>
    <script src="static/js/login.js"></script>
</body>

</html>