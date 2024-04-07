<?php

$host = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Connect to the database
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table for expenses if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS expenses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
category VARCHAR(30) NOT NULL,
amount DECIMAL(10,2) NOT NULL,
description VARCHAR(100),
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  //echo "Table expenses created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Insert new expense if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $category = $_POST["category"];
  $amount = $_POST["amount"];
  $description = $_POST["description"];

  $stmt = $conn->prepare("INSERT INTO expenses (category, amount, description) VALUES (?, ?, ?)");
  $stmt->bind_param("sds", $category, $amount, $description);

  if ($stmt->execute() === TRUE) {
    //echo "New expense recorded successfully";
  } else {
    echo "Error: " . $stmt->error;
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
    body { font-family: Arial, sans-serif; }
    .container { max-width: 600px; margin: auto; padding: 20px; }
    form { display: flex; flex-direction: column; }
    input, select, button { margin: 10px 0; }
  </style>
</head>
<body>

<div class="container">
  <h2>Add New Expense</h2>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="category">Category:</label>
    <select name="category" id="category">
      <option value="Food">Food</option>
      <option value="Transportation">Transportation</option>
      <option value="Entertainment">Entertainment</option>
      <option value="Other">Other</option>
    </select>

    <label for="amount">Amount:</label>
    <input type="number" step="0.01" name="amount" id="amount" required>

    <label for="description">Description:</label>
    <input type="text" name="description" id="description">

    <button type="submit">Add Expense</button>
  </form>
</div>

</body>
</html>
