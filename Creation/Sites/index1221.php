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

// Create expense table if it doesn't exist
$createTableSql = "CREATE TABLE IF NOT EXISTS expenses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(30) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    expense_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($createTableSql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $_POST["category"];
    $amount = $_POST["amount"];

    $insertSql = "INSERT INTO expenses (category, amount) VALUES (?, ?)";

    $stmt = $conn->prepare($insertSql);
    $stmt->bind_param("sd", $category, $amount);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $insertSql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Expense to Personal Budget</title>
</head>
<body>
    <h2>Add Expense</h2>
    <form method="post">
        <label for="category">Category:</label><br>
        <select name="category" id="category">
            <option value="Food">Food</option>
            <option value="Electronics">Electronics</option>
            <option value="Housing">Housing</option>
            <option value="Transportation">Transportation</option>
            <option value="Utilities">Utilities</option>
            <option value="Miscellaneous">Miscellaneous</option>
        </select><br>
        <label for="amount">Amount: $</label><br>
        <input type="number" id="amount" name="amount" step="0.01" required><br><br>
        <input type="submit" value="Add Expense">
    </form>
</body>
</html>
