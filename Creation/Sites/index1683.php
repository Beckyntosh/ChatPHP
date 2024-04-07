
<?php
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

// Create table if not exists
$table_sql = "CREATE TABLE IF NOT EXISTS Skateboards (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
brand VARCHAR(30) NOT NULL,
price DECIMAL(10,2) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($table_sql) === TRUE) {
  echo "Table Skateboards created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $brand = $_POST['brand'];
  $price = $_POST['price'];

  $insert_sql = "INSERT INTO Skateboards (name, brand, price) VALUES (?, ?, ?)";

  // prepare and bind
  $stmt = $conn->prepare($insert_sql);
  $stmt->bind_param("ssd", $name, $brand, $price);

  if($stmt->execute()) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Skateboard to Comparison Tool</title>
</head>
<body>

<h2>Add Skateboard</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Name: <input type="text" name="name" required>
  <br><br>
  Brand: <input type="text" name="brand" required>
  <br><br>
  Price: <input type="number" step="0.01" name="price" required>
  <br><br>
  <input type="submit" name="submit" value="Submit">
</form>

</body>
</html>

This script creates a skateboard comparison database and table if they don't exist, adds a skateboard to the database upon form submission, and displays a simple HTML form for input. Please note, the code uses basic security measures like prepared statements to prevent SQL injection, but it lacks comprehensive validation, sanitation of inputs, and error handling for production use. Additionally, deploying this code requires a LAMP (Linux, Apache, MySQL, PHP) or similar stack environment setup with appropriate connection credentials.