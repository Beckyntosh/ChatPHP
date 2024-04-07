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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS expenses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(255) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Add expense
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $_POST['category'];
    $amount = $_POST['amount'];

    $stmt = $conn->prepare("INSERT INTO expenses (category, amount) VALUES (?, ?)");
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Expense to Personal Budget</title>
</head>
<body>
    <h2>Add Expense</h2>
    <form method="post">
        <label for="category">Category:</label><br>
        <input type="text" id="category" name="category" required><br>
        <label for="amount">Amount:</label><br>
        <input type="number" step="0.01" id="amount" name="amount" required><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
