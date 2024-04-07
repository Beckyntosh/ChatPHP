<?php
// Connect to Database
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
$table_query = "CREATE TABLE IF NOT EXISTS Expenses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(30) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    reg_date TIMESTAMP
)";

if (!$conn->query($table_query)) {
    echo "Error creating table: " . $conn->error;
}

// Handle Post Request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $_POST['category'];
    $amount = $_POST['amount'];

    $stmt = $conn->prepare("INSERT INTO Expenses (category, amount) VALUES (?, ?)");
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
<html>
<head>
    <title>Add Expense to Personal Budget</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            text-align: center;
            padding: 50px;
        }
        .container {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Add Your Expense</h2>
    <form method="post" action="">
        <label for="category">Category</label><br>
        <input type="text" id="category" name="category" required><br><br>
        <label for="amount">Amount</label><br>
        <input type="number" id="amount" name="amount" required><br><br>
        <input type="submit" value="Add Expense">
    </form>
</div>

</body>
</html>
