<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["pwd"];
$role = $_POST["role"];

// Establish a connection to the database
$con = mysqli_connect("localhost", "root", "", "dbfarmerconsumer");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connection success";
$hashed_pwd=password_hash($password,PASSWORD_DEFAULT);

$query="SELECT Username FROM `accounts` WHERE Email=\"$email\";";
$res=mysqli_query($con,$query);
if($res&&mysqli_num_rows($res)==0){

// Prepare the SQL query
$sql = "INSERT INTO accounts (Username, Email, Password, Role) VALUES ('$username', '$email', '$hashed_pwd', '$role')";

// Execute the query
if (mysqli_query($con, $sql)) {
    session_start();
        $_SESSION['Username']=$username;
        $_SESSION['Email']=$email;
        $_SESSION['Role']=$role;
    if($role=='f'){
        header("Location:AddProducts.php");
    }else{
        header("Location:ViewProducts.php");
    }
    } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}else{
    echo "<script>alert('This email has been already registered!');window.location.href='login.php';</script>";
}
//include("login.php");
// Close the database connection
mysqli_close($con);
}
?>