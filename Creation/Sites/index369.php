<?php

$host = "db"; 
$user = "root";
$password = "root";
$dbname = "my_database";

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS subscribers (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    email VARCHAR(50) NOT NULL,
    reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    //echo "Table subscribers created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$message = "";

// Check if the form is submitted 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Prepare an insert statement
    $sql = "INSERT INTO subscribers (email) VALUES (?)";
    
    if($stmt = $conn->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("s", $param_email);
        
        // Set parameters
        $param_email = $email;
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            $message = "Subscribed successfully.";
        } else{
            $message = "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        $stmt->close();
    }  
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up for Product Updates</title>
    <style>
        body { font: 14px sans-serif; }
        .wrapper { width: 350px; padding: 20px; margin: auto; }
        form { display: flex; flex-direction: column; }
        input[type="email"], button { margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Sign Up for Product Updates</h2>
        <p>Please enter your email to receive notifications about new craft beer releases!</p>
        <?php if($message) echo "<p>$message</p>"; ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="email" name="email" placeholder="Your Email Address" required>
            <button type="submit">Subscribe</button>
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>