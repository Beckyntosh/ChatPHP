<?php

// Define server details and credentials
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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS expenses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(50) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $_POST['category'];
    $amount = $_POST['amount'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO expenses (category, amount) VALUES (?, ?)");
    $stmt->bind_param("ss", $category, $amount);

    // Execute
    if($stmt->execute()) {
        echo "New record created successfully";
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
    <title>Add Expense</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0e68c;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff3e6;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        input, select, button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
            border: 1px solid #ddd;
        }
        button {
            background-color: #ff4500;
            color: white;
            cursor: pointer;
        }
        button:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add Expense to Personal Budget</h2>
        <form method="POST">
            <label for="category">Category:</label>
            <select id="category" name="category">
                <option value="Beauty Products">Beauty Products</option>
                <option value="Food">Food</option>
                <option value="Utilities">Utilities</option>
                <option value="Entertainment">Entertainment</option>
                <option value="Others">Others</option>
            </select>
            
            <label for="amount">Amount ($):</label>
            <input type="number" id="amount" name="amount" step="0.01" required>
            
            <button type="submit">Add Expense</button>
        </form>
    </div>
</body>
</html>
