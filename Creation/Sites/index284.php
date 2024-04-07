<?php
// Set up database connection
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

// Create expenses table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS expenses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
category VARCHAR(30) NOT NULL,
amount DECIMAL(10,2) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Add expense
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['amount']) && isset($_POST['category'])) {
  $category = $conn->real_escape_string($_POST['category']);
  $amount = $conn->real_escape_string($_POST['amount']);

  // Prepare SQL and bind parameters
  $stmt = $conn->prepare("INSERT INTO expenses (category, amount) VALUES (?, ?)");
  $stmt->bind_param("sd", $category, $amount);

  if ($stmt->execute()) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
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
    <title>Add Expense to Personal Budget</title>
    <script>
      async function addExpense(e) {
        e.preventDefault();
        const formData = new FormData(e.target);
        const response = await fetch('/', {method: 'POST', body: formData});
        const result = await response.text();
        document.getElementById('message').innerText = result;
      }
    </script>
</head>
<body>
    <h2>Add Expense to Personal Budget</h2>
    <form id="expenseForm" onsubmit="addExpense(event)">
        <label for="category">Category:</label>
        <select name="category" id="category">
            <option value="Food">Food</option>
            <option value="Utilities">Utilities</option>
            <option value="Transportation">Transportation</option>
            <option value="Entertainment">Entertainment</option>
            <option value="Other">Other</option>
        </select><br><br>
        <label for="amount">Amount:</label>
        <input type="number" id="amount" name="amount" step="0.01" required><br><br>
        <button type="submit">Add Expense</button>
    </form>
    <p id="message"></p>
</body>
</html>
