

<?php
$servername = "db";
$username = "root";
$password = 'root';
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$table = "CREATE TABLE IF NOT EXISTS shoes (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    brand VARCHAR(30) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    size DECIMAL(5, 2) NOT NULL,
    color VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP
)";

if ($conn->query($table) === TRUE) {
  //echo "Table shoes created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Helper function to fetch all shoes
function fetchShoes($conn) {
    $sql = "SELECT id, name, brand, price, size, color FROM shoes";
    $result = $conn->query($sql);
    $shoes = [];
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $shoes[] = $row;
        }
    }
    return $shoes;
}

// Inserting a new product
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $brand = $_POST["brand"];
    $price = $_POST["price"];
    $size = $_POST["size"];
    $color = $_POST["color"];

    $sql = "INSERT INTO shoes (name, brand, price, size, color)
    VALUES ('$name', '$brand', '$price', '$size', '$color')";
    
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Shoe Comparison Tool</title>
</head>
<body>

<h2>Add Shoe to Database</h2>

<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
  Name: <input type="text" name="name"><br>
  Brand: <input type="text" name="brand"><br>
  Price: <input type="number" step="0.01" name="price"><br>
  Size: <input type="number" step="0.01" name="size"><br>
  Color: <input type="text" name="color"><br>
  <input type="submit">
</form>

<h2>Available Shoes</h2>
<ul>
<?php
$shoes = fetchShoes($conn);
foreach ($shoes as $shoe) {
    echo "<li>" . htmlspecialchars($shoe['name']) . " - Brand: " . htmlspecialchars($shoe['brand']) . ", Price: $" . htmlspecialchars($shoe['price']) . ", Size: " . htmlspecialchars($shoe['size']) . ", Color: " . htmlspecialchars($shoe['color']) . "</li>";
}
?>
</ul>

</body>
</html>

<?php
$conn->close();
?>

This script initiates a simple product comparison tool tailored for a shoe website in a single file for simplicity. It creates a table for shoes if it doesn't exist and allows adding shoes via a simple HTML form. It also displays a list of the shoes currently in the database.

**Important Notes:**
- Always validate and sanitize user inputs to prevent SQL injection and other security vulnerabilities.
- The example doesn't implement a comparison feature or advanced error handling for simplicity. You might want to expand it based on the specific requirements of your project.
- Remember to replace database credentials with real values in a secure manner, especially in a production environment.
- Use prepared statements for database operations to increase security.
