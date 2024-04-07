<?php
// Database configuration
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

// Create expense table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS expenses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
category VARCHAR(30) NOT NULL,
amount DECIMAL(10,2) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $category = htmlspecialchars($_POST['category']);
  $amount = htmlspecialchars($_POST['amount']);
  
  $sql = "INSERT INTO expenses (category, amount)
  VALUES ('$category', '$amount')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Expense to Personal Budget</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 100%; max-width: 400px; margin: auto; padding: 20px; }
        input[type=text], select, input[type=number] { width: 100%; padding: 12px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        input[type=submit] { width: 100%; background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer; }
        input[type=submit]:hover { background-color: #45a049; }
        .message { color: green; }
    </style>
</head>
<body>
<div class="container">
    <h2>Add Expense to Personal Budget</h2>
    <form action="" method="post">
        <label for="category">Category</label>
        <select id="category" name="category">
            <option value="Food">Food</option>
            <option value="Baby Products">Baby Products</option>
            <option value="Household">Household</option>
            <option value="Miscellaneous">Miscellaneous</option>
        </select>
        <label for="amount">Amount</label>
        <input type="number" id="amount" name="amount" placeholder="Enter amount..." step="0.01" required>
        <input type="submit" value="Submit">
    </form>
</div>
</body>
</html>
