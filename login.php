
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/css/login_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>LOGIN-PAGE</title>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form  action="register_process.php" method="post">
                <h1>Create Account</h1>
                <span>
                   
                </span>
                <input type="text" placeholder="Name" name="username" required>
                <input type="email" placeholder="Email" name="email" required>
                <input type="password" placeholder="Password" name="pwd" required >
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
                <span>
                <?php
                    if (isset($_GET['error'])) {
                        echo "<p style='color:green;'>" . htmlspecialchars($_GET['error']) . "</p>";
                    }
                ?>
                </span>
                <input type="email" placeholder="Email" name="email">
                <input type="password" placeholder="Password" name="pwd" >
                <a href="#">Forgot Your Password</a>
                <button>Login</button>
            </form>
        </div>

        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal detials to use all of site features</p>
                    <button class="hidden" id="login">Login</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello Friends!</h1>
                    <p>Registeration with your personal detials to use all of site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    <script src="static/js/login.js"></script>
</body>

</html>