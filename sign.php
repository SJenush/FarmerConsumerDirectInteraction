<?php
$a = $_POST["n"];
$b = $_POST["e"];
$c = $_POST["p"];
$d = $_POST["op"];



// Establish a connection to the database
$con = mysqli_connect("localhost", "root", "", "dbfarmerconsumer");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Prepare the SQL query
$sql = "INSERT INTO data (Username, Email, Password, Roll) VALUES ('$a', '$b', '$c', '$d')";

// Execute the query
if (mysqli_query($con, $sql)) {
    echo "Thanks for the registration !!!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

// Include the registration page
include("login.php");

// Close the database connection
mysqli_close($con);
?>