<?php
//Database connection credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbfarmerconsumer";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$error="";
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the email and password entered by the user
    $email = $_POST['email'];
    $password = $_POST['pwd'];

    // First, validate the email format
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Modify SQL to be case-insensitive for email
        $sql = "SELECT * FROM accounts WHERE LOWER(Email) = LOWER(?)";

        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die("Error preparing the statement: " . $conn->error);
        }

        // Bind the email parameter to the query
        $stmt->bind_param("s", $email);

        // Execute the query
        $stmt->execute();
        $result = $stmt->get_result();

        // Debugging: Check how many rows are returned
       

        // Check if any result is returned
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Debugging: Output values fetched from the database
         

            // Simplified Password Comparison
            if (password_verify($password,$row['Password'])) {
                
                if($row['Role']=='f'){
                header("Location:AddProducts.php");
                }else{
                    header("Location:ViewProducts.php");
                }
            } else {
                header("Location: login.php?error=Invalid password. Please try again.");
                exit;
            }
        } else {
            header("Location: login.php?error=Email not found.");
            exit;
        }

        // Close the statement
        $stmt->close();
    } else {
        header("Location: login.php?error=Invalid email format.");
        exit;
    }
}

// Close the database connection
$conn->close();
?>
