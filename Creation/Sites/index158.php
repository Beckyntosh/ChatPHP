<?php
// Initialize MySQL connection
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

// Create table if it does not exist
$table_sql = "CREATE TABLE IF NOT EXISTS expenses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(30) NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    expense_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($table_sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["amount"]) && isset($_POST["category"])) {
    $amount = $_POST["amount"];
    $category = $_POST["category"];
    
    // Insert the new expense
    $insert_sql = "INSERT INTO expenses (category, amount) VALUES (?, ?)";
    
    $stmt = $conn->prepare($insert_sql);
    $stmt->bind_param("sd", $category, $amount);
    
    if ($stmt->execute() === TRUE) {
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
    <title>Add Expense to Personal Budget</title>
</head>
<body>

<h2>Add Expense</h2>

<form method="post" action="">
    <label for="category">Category:</label><br>
    <input type="text" id="category" name="category" required><br>
    <label for="amount">Amount:</label><br>
    <input type="number" id="amount" name="amount" min="0.01" step="0.01" required><br><br>
    <input type="submit" value="Submit">
</form>

</body>
</html>
