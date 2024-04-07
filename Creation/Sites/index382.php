<?php
// Database configuration
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table for users if it doesn't exist
$userTableSql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(60) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
)";

if ($conn->query($userTableSql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Check if form data is posted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash password
    $email = $_POST["email"];

    // Insert user into database
    $insertSql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
    
    $stmt = $conn->prepare($insertSql);
    $stmt->bind_param("sss", $username, $password, $email);
    
    if ($stmt->execute() === TRUE) {
        echo "New record created successfully. Please <a href='login.php'>log in</a>.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup for Exclusive Access</title>
    <style>
        body {font-family: Arial, sans-serif;}
        .container {max-width: 400px; margin: 50px auto; padding: 20px; border: 1px solid #ddd;}
        input[type=text], input[type=password], input[type=email] {width: 100%; padding: 15px; margin: 5px 0 22px 0; display: inline-block; border: none; background: #f1f1f1;}
        input[type=text]:focus, input[type=password]:focus, input[type=email]:focus {background-color: #ddd; outline: none;}
        .registerbtn {background-color: #4CAF50; color: white; padding: 16px 20px; margin: 8px 0; border: none; cursor: pointer; width: 100%; opacity: 0.9;}
        .registerbtn:hover {opacity:1;}
    </style>
</head>
<body>

<div class="container">
    <h2>Signup for Access to Exclusive Member-Only Content</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <p>Please fill in this form to create an account.</p>
        <hr>
        <label for="username"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" required>
        
        <label for="email"><b>Email</b></label>
        <input type="email" placeholder="Enter Email" name="email" required>
        
        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>
        
        <button type="submit" class="registerbtn">Register</button>
    </form>
</div>

</body>
</html>