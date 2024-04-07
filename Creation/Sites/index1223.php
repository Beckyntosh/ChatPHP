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

// Create expenses table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS expenses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
category VARCHAR(30) NOT NULL,
amount DECIMAL(10, 2) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $category = $_POST["category"];
  $amount = $_POST["amount"];

  $stmt = $conn->prepare("INSERT INTO expenses (category, amount) VALUES (?, ?)");
  $stmt->bind_param("sd", $category, $amount);

  if ($stmt->execute()) {
    echo "<p style='color:green;'>Expense added successfully!</p>";
  } else {
    echo "<p style='color:red;'>Error adding expense: " . $stmt->error . "</p>";
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
<title>Add Expense</title>
<style>
body {
  font-family: 'Times New Roman', Times, serif;
  background-color: #f2e6ff;
  color: #330033;
}
.container {
  max-width: 500px;
  margin: auto;
  background: #fde4f3;
  padding: 20px;
  border-radius: 8px;
}
.form-group {
  margin-bottom: 15px;
}
.form-group label {
  display: block;
  margin-bottom: 5px;
}
.form-group input, .form-group select {
  width: 100%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
}
button {
  background-color: #990073;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
button:hover {
  background-color: #730054;
}
</style>
</head>
<body>
<div class="container">
<h2>Add an Expense</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
  <div class="form-group">
    <label for="category">Expense Category:</label>
    <select id="category" name="category" required>
      <option value="Food">Food</option>
      <option value="Utilities">Utilities</option>
      <option value="Transportation">Transportation</option>
      <option value="Healthcare">Healthcare</option>
      <option value="Miscellaneous">Miscellaneous</option>
    </select>
  </div>
  <div class="form-group">
    <label for="amount">Amount ($):</label>
    <input type="number" id="amount" name="amount" step="0.01" required>
  </div>
  <button type="submit">Add Expense</button>
</form>
</div>
</body>
</html>
