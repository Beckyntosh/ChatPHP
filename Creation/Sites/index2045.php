

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

// Create Phones Table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS phones (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
brand VARCHAR(30) NOT NULL,
model VARCHAR(30) NOT NULL,
specs TEXT,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table Phones created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Add Product to the database
if(isset($_POST['brand']) && isset($_POST['model']) && isset($_POST['specs'])) {
  $brand = $_POST['brand'];
  $model = $_POST['model'];
  $specs = $_POST['specs'];

  $sql = "INSERT INTO phones (brand, model, specs)
  VALUES ('$brand', '$model', '$specs')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

?>

HTML Form for adding product
<!DOCTYPE html>
<html>
<body>

<h2>Add Product Form</h2>

<form method="post">
  Brand: <input type="text" name="brand">
  Model: <input type="text" name="model">
  Specs: <input type="text" name="specs">
  <input type="submit">
</form>

</body>
</html>

**Security Note:** This example does not follow security best practices. For production, you should:

1. Never use the MySQL root user for a web application.
2. Protect your application against SQL injection attacks by using prepared statements instead of including variables directly inside the SQL query.
3. Validate and sanitize all user inputs.
4. Manage your application secrets securely, not hardcoded in your script.
5. Use modern PHP coding standards, and consider using a framework to structure your application securely and effectively.

This small snippet is intended for educational purposes and as a starting point. For a fully functional product comparison tool, you would need to further develop frontend features, comparison logic, secure user authentication, and so forth.