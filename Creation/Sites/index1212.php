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
  description VARCHAR(255),
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $category = $_POST['category'];
  $amount = $_POST['amount'];
  $description = $_POST['description'];

  $stmt = $conn->prepare("INSERT INTO expenses (category, amount, description) VALUES (?, ?, ?)");
  $stmt->bind_param("sds", $category, $amount, $description);
  
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Expense</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: 20px auto; padding: 20px; }
        input, select { width: 100%; padding: 8px; margin: 10px 0; }
        button { padding: 10px; background-color: #4CAF50; color: white; border: none; cursor: pointer; }
        button:hover { opacity: 0.8; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add New Expense</h2>
        <form method="POST">
            <label for="category">Category:</label>
            <select id="category" name="category">
                <option value="Food">Food</option>
                <option value="Art Supplies">Art Supplies</option>
                <option value="Bills">Bills</option>
                <option value="Others">Others</option>
            </select>
            
            <label for="amount">Amount:</label>
            <input type="text" id="amount" name="amount" placeholder="$0.00" required>
            
            <label for="description">Description:</label>
            <input type="text" id="description" name="description" placeholder="Details about the expense">
            
            <button type="submit">Add Expense</button>
        </form>
    </div>
</body>
</html>
