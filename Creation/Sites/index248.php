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

// Create Expenses table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS Expenses (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  category VARCHAR(30) NOT NULL,
  amount DECIMAL(10,2) NOT NULL,
  expense_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

$message = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $category = $_POST["category"];
  $amount = $_POST["amount"];

  $sql = "INSERT INTO Expenses (category, amount) VALUES (?, ?)";

  // Prepare and bind
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sd", $category, $amount);

  // Execute and check
  if ($stmt->execute()) {
    $message = "Expense added successfully!";
  } else {
    $message = "Error: " . $stmt->error;
  }
  
  $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Expense to Personal Budget</title>
<style>
  body{ font-family: Arial, sans-serif; }
  form{ margin-top: 20px; }
  label, input { display: block; margin: 5px 0; }
  .message { color: green; }
</style>
</head>
<body>

<h2>Add Your Expense</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <label for="category">Category:</label>
  <select id="category" name="category" required>
    <option value="Food">Food</option>
    <option value="Utilities">Utilities</option>
    <option value="Clothing">Clothing</option>
    <option value="Transportation">Transportation</option>
  </select>
  
  <label for="amount">Amount ($):</label>
  <input type="number" id="amount" name="amount" step="0.01" required>
  
  <input type="submit" value="Submit">
</form>

<div class="message"><?php echo $message; ?></div>

</body>
</html>

<?php
$conn->close();
?>
