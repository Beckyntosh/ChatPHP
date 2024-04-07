<?php
// Connect to the database
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table for custom orders if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS custom_orders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(50) NOT NULL,
    email VARCHAR(50),
    product_details TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    //echo "Table custom_orders created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_name = $_POST['customer_name'];
    $email = $_POST['email'];
    $product_details = $_POST['product_details'];

    $stmt = $conn->prepare("INSERT INTO custom_orders (customer_name, email, product_details) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $customer_name, $email, $product_details);

    if ($stmt->execute() === TRUE) {
        echo "<p>Thank you! Your custom order request has been received.</p>";
    } else {
        echo "<p>Sorry, there was an error submitting your custom order.</p>";
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
    <title>Custom Order - Skin Care Products</title>
</head>
<body>
    <style>
        body { font-family: Arial, sans-serif; background-color: #eceff1; color: #333; padding: 20px; }
        .container { background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        h2 { color: #607d8b; }
        form { margin-top: 20px; }
        input[type="text"], textarea { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 5px; }
        input[type="submit"] { background-color: #607d8b; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; }
        input[type="submit"]:hover { background-color: #546e7a; }
    </style>
    <div class="container">
        <h2>Request a Custom Order</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="customer_name">Name:</label>
            <input type="text" id="customer_name" name="customer_name" required>
            
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>
            
            <label for="product_details">Custom Product Requirements:</label>
            <textarea id="product_details" name="product_details" required></textarea>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>