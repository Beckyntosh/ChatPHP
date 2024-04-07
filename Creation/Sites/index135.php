<?php
// Database connection
define('MYSQL_ROOT_PSWD', 'root');
$servername = "db";
$username = "root";
$password = MYSQL_ROOT_PSWD;
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check for form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customerName = $_POST['customerName'];
    $email = $_POST['email'];
    $productDescription = $_POST['productDescription'];
    
    // Insert into custom_orders table
    $sql = "INSERT INTO custom_orders (customerName, email, productDescription) VALUES ('$customerName', '$email', '$productDescription')";
    
    if ($conn->query($sql) === TRUE) {
        $message = "Custom order submitted successfully!";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Order - Beauty Products</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        input, textarea { width: 100%; padding: 10px; margin: 10px 0; }
        input[type="submit"] { background-color: #4CAF50; color: white; cursor: pointer; }
        .message { color: green; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Custom Order Form</h2>
        <?php if(!empty($message)): ?>
            <p class="message"><?php echo $message; ?></p>
        <?php endif; ?>
        <form action="" method="post">
            <input type="text" name="customerName" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <textarea name="productDescription" rows="5" placeholder="Describe your custom product requirements" required></textarea>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
<?php
// Creating the custom_orders table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS custom_orders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    customerName VARCHAR(50) NOT NULL,
    email VARCHAR(50),
    productDescription TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    // Table created
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>