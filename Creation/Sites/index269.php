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

// Create expense table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS expenses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
category VARCHAR(30) NOT NULL,
amount DECIMAL(10,2) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $category = $_POST["category"];
  $amount = $_POST["amount"];

  $sql = "INSERT INTO expenses (category, amount) VALUES (?, ?)";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss", $category, $amount);

  if ($stmt->execute() === TRUE) {
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
<title>Add Expense to Personal Budget</title>
<style>
body {
  font-family: "Courier New", Courier, monospace;
}
.container {
  width: 500px;
  margin: auto;
}
</style>
</head>
<body>
<div class="container">
<h2>Add Expense</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  Category: <select name="category">
      <option value="Food">Food</option>
      <option value="Baby Products">Baby Products</option>
      <option value="Utilities">Utilities</option>
      <option value="Other">Other</option>
  </select>
  <br><br>
  Amount: <input type="text" name="amount">
  <br><br>
  <input type="submit" name="submit" value="Submit">
</form>
</div>
</body>
</html>
