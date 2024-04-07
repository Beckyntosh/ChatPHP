<?php
// Database connection variables
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

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customerName = $_POST['customerName'];
    $productDetails = $_POST['productDetails'];
    $email = $_POST['email'];
    
    // Prepare an insert statement
    $sql = "INSERT INTO custom_orders (customerName, productDetails, email) VALUES (?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    
    if($stmt) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("sss", $customerName_param, $productDetails_param, $email_param);
        
        // Set parameters
        $customerName_param = $customerName;
        $productDetails_param = $productDetails;
        $email_param = $email;
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            echo "Your custom order has been submitted successfully.";
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Order for Vitamins</title>
</head>
<body>

<h2>Request a Custom Vitamin Order</h2>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="customerName">Name:</label><br>
    <input type="text" id="customerName" name="customerName" required><br>
    
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br>
    
    <label for="productDetails">Product Details:</label><br>
    <textarea id="productDetails" name="productDetails" rows="4" cols="50" required></textarea><br>
    
    <input type="submit" value="Submit">
</form> 

</body>
</html>
<?php
// Create table if not exists
$createTableSql = "CREATE TABLE IF NOT EXISTS custom_orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customerName VARCHAR(255) NOT NULL,
    productDetails TEXT NOT NULL,
    email VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    
if ($conn->query($createTableSql) === TRUE) {
    // echo "Table custom_orders created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>