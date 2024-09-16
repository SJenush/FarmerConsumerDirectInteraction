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

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the email and password entered by the user
    $email = $_POST['email'];
    $password = $_POST['pwd'];

    // First, validate the email format
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Modify SQL to be case-insensitive for email
        $sql = "SELECT Email, Password FROM accounts WHERE LOWER(Email) = LOWER(?)";

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
            if ($row['Password'] === $password) {
                header("Location:information.html");
            } else {
                echo "<p style='color:red;'>Invalid password. Please try again.</p>";
            }
        } else {
            echo "<p style='color:red;'>The email address '$email' is not found in the system.</p>";
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "<p style='color:red;'>The email address '$email' is not in a valid format.</p>";
    }
}

// Close the database connection
$conn->close();
?>
