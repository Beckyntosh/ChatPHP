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
category VARCHAR(50) NOT NULL,
amount DECIMAL(10, 2) NOT NULL,
expense_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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
  $stmt->execute();

  echo "New record created successfully";
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
body { font-family: Arial, sans-serif; }
.container { max-width: 600px; margin: auto; padding: 20px; }
label, input { display: block; width: 100%; margin-bottom: 10px; }
input[type="number"] { -moz-appearance: textfield; }
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button { -webkit-appearance: none; margin: 0; }
button { cursor: pointer; padding: 10px; background-color: #007bff; color: white; border: none; width: 100%; }
</style>
</head>
<body>

<div class="container">
  <h2>Add an Expense</h2>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="category">Category:</label>
    <input type="text" id="category" name="category" required>

    <label for="amount">Amount ($):</label>
    <input type="number" id="amount" name="amount" step="0.01" min="0" required>

    <button type="submit">Add Expense</button>
  </form>
</div>

</body>
</html>
