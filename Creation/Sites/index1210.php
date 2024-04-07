<?php
// Database connection
$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create expenses table if not exists
$createExpensesTable = "CREATE TABLE IF NOT EXISTS expenses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(30) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    expense_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if (!$conn->query($createExpensesTable)) {
    echo "Error creating table: " . $conn->error;
}

// Handling the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $_POST['category'];
    $amount = $_POST['amount'];

    $addExpenseQuery = $conn->prepare("INSERT INTO expenses (category, amount) VALUES (?, ?)");
    $addExpenseQuery->bind_param("sd", $category, $amount);

    if ($addExpenseQuery->execute()) {
        echo "<p>Expense added successfully!</p>";
    } else {
        echo "<p>Error adding expense: " . $conn->error . "</p>";
    }

    $addExpenseQuery->close();
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
    <form action="" method="post">
        <label for="category">Category:</label><br>
        <select name="category" id="category">
            <option value="Food">Food</option>
            <option value="Musical Instruments">Musical Instruments</option>
            <option value="Utilities">Utilities</option>
            <option value="Other">Other</option>
        </select><br>
        <label for="amount">Amount: $</label><br>
        <input type="number" id="amount" name="amount" step=".01" required><br><br>
        <input type="submit" value="Add Expense">
    </form>
</body>
</html>
