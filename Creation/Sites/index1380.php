<?php
// Definitions for database connection
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
$link = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . $link->connect_error);
}

// Create order table if it does not exist
$tableCreationQuery = "CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    custom_size VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if(!$link->query($tableCreationQuery)){
    echo "ERROR: Could not able to execute $tableCreationQuery. " . $link->error;
}

// Process form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Get product name and custom size
    $productName = $link->real_escape_string(trim($_POST['product_name']));
    $customSize = $link->real_escape_string(trim($_POST['custom_size']));

    // Insert order into database
    $sql = "INSERT INTO orders (product_name, custom_size) VALUES ('$productName', '$customSize')";

    if($link->query($sql)){
        echo "Order added successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . $link->error;
    }
}

// Close connection
$link->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add an Order</title>
    <style>
        body { font: 14px sans-serif; background-color: #333; color: #f0f0f0; }
        .wrapper { width: 350px; padding: 20px; margin: auto; background-color: #222; border: 1px solid #444; }
        input[type=text], input[type=submit] { width: 100%; padding: 15px; margin: 5px 0 22px 0; display: inline-block; border: none; background: #111; }
        input[type=text]:focus, input[type=submit]:hover { background-color: #555; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Add an Order</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div>
                <label>Product Name</label>
                <input type="text" name="product_name" required>
            </div>
            <div>
                <label>Custom Size</label>
                <input type="text" name="custom_size" required>
            </div>
            <div>
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>
</body>
</html>
