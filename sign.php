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
// Prepare the SQL query
$sql = "INSERT INTO accounts (Username, Email, Password, Role) VALUES ('$username', '$email', '$password', '$role')";

// Execute the query
if (mysqli_query($con, $sql)) {
    echo "Thanks for the registration !!!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

//include("login.php");
// Close the database connection
mysqli_close($con);
}
?>