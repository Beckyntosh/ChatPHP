<?php
// Constants for database connection
define("DB_SERVER", "db");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("DB_NAME", "my_database");

// Attempt to connect to MySQL database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . $conn->connect_error);
}

// Create subscribers table if it does not exist
$tableSql = "CREATE TABLE IF NOT EXISTS subscribers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL,
    hash VARCHAR(255) NOT NULL,
    active TINYINT NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$conn->query($tableSql);

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"])) {
    $email = $_POST["email"];
    $hash = md5(rand(0,1000));
    
    // Insert the subscriber into the database
    $insertSql = "INSERT INTO subscribers (email, hash) VALUES (?, ?)";
    
    if($stmt = $conn->prepare($insertSql)){
        $stmt->bind_param("ss", $email, $hash);
        
        if($stmt->execute()){
            $to      = $email; // Send email to our user
            $subject = 'Signup | Verification'; // Give the email a subject 
            $message = '
            
            Thanks for signing up!
            Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
            
            ------------------------
            Username: '.$email.'
            ------------------------
            
            Please click this link to activate your account:
            http://yourwebsite.com/verify.php?email='.$email.'&hash='.$hash.'
            
            '; // Our message above including the link
                                
            $headers = 'From:noreply@yourwebsite.com' . "\r\n"; // Set from headers
            mail($to, $subject, $message, $headers); // Send our email
        } else{
            echo "Something went wrong. Please try again later.";
        }

        // Close statement
        $stmt->close();
    }
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Newsletter Signup</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .signup-form { max-width: 300px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px; }
        input[type="email"], input[type="submit"] { width: 100%; padding: 10px; margin: 5px 0; border: 1px solid #ccc; border-radius: 5px; }
        input[type="submit"] { background-color: #4CAF50; color: white; cursor: pointer; }
        input[type="submit"]:hover { background-color: #45a049; }
    </style>
</head>
<body>

<div class="signup-form">
    <h2>Subscribe to our Newsletter</h2>
    <form action="" method="post">
        <input type="email" name="email" placeholder="Enter your Email" required>
        <input type="submit" value="Subscribe">
    </form>
</div>

</body>
</html>