<?php

$host = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if expense table exists, if not create it
$query = "CREATE TABLE IF NOT EXISTS expenses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category  VARCHAR(255) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($query) === TRUE) {
    // Table created successfully or already exists
} else {
    echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $_POST['category'];
    $amount = $_POST['amount'];

    $stmt = $conn->prepare("INSERT INTO expenses (category, amount) VALUES (?, ?)");
    $stmt->bind_param("sd", $category, $amount);

    if ($stmt->execute()) {
        echo "New expense added successfully";
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
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      color: #333;
      margin: 0;
      padding: 20px;
    }
    .container {
      background-color: #fff;
      box-shadow: 0 0 10px 0 rgba(0,0,0,0.1);
      max-width: 600px;
      margin: 40px auto;
      padding: 20px;
    }
    h2 {
      text-align: center;
      color: #333;
    }
    form {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }
    input[type=number], select {
      width: 100%;
      padding: 10px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
    input[type=submit] {
      width: 100%;
      background-color: #4CAF50;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    input[type=submit]:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
<div class="container">
  <h2>Add Expense</h2>
  <form action="" method="post">
    <label for="category">Category</label>
    <select id="category" name="category">
      <option value="Food">Food</option>
      <option value="Hair Care">Hair Care</option>
      <option value="Utilities">Utilities</option>
      <option value="Entertainment">Entertainment</option>
      <option value="Other">Other</option>
    </select>
    <label for="amount">Amount ($)</label>
    <input type="number" id="amount" name="amount" placeholder="200" step="0.01" required>
    <input type="submit" value="Add Expense">
  </form>
</div>
</body>
</html>
