<?php
// Connection parameters
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

// Create product table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    description TEXT,
    image VARCHAR(100),
    reg_date TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Insert product function
function insertProduct($name, $description, $image, $conn) {
    $stmt = $conn->prepare("INSERT INTO products (name, description, image) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $description, $image);
    $stmt->execute();
}

// HTML and PHP to handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    
    insertProduct($name, $description, $image, $conn);
    echo "<p>Product added successfully!</p>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product to Comparison Tool</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f8ff; color: #333; }
        .container { max-width: 600px; margin: auto; padding: 20px; }
        form { display: flex; flex-direction: column; }
        label { font-weight: bold; margin-top: 10px; }
        input, textarea { margin-top: 5px; }
        button { margin-top: 20px; background-color: #4CAF50; color: white; padding: 10px; border: none; cursor: pointer; }
        button:hover { background-color: #45a049; }
    </style>
</head>
<body>
<div class="container">
    <h2>Add Product</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>
        
        <label for="image">Image URL:</label>
        <input type="text" id="image" name="image" required>
        
        <button type="submit">Add Product</button>
    </form>
</div>
</body>
</html>

<?php
$conn->close();
?>
