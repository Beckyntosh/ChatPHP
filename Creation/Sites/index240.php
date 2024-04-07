<?php
// Simple script to add and categorize expenses for a personal budget on a website
// Frontend and backend combined. MySQL database is used for storing the expenses.

$server = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Create connection
$conn = new mysqli($server, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if it does not exist
$tableCreationQuery = "CREATE TABLE IF NOT EXISTS expenses (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(50) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    expense_date TIMESTAMP
)";

if (!$conn->query($tableCreationQuery)) {
    die("Error creating table: " . $conn->error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $_POST['category'];
    $amount = $_POST['amount'];

    $insertQuery = $conn->prepare("INSERT INTO expenses (category, amount, expense_date) VALUES (?, ?, NOW())");
    $insertQuery->bind_param("sd", $category, $amount);

    if ($insertQuery->execute()) {
        echo "<p>Expense added successfully!</p>";
    } else {
        echo "<p>Error adding expense: " . $conn->error . "</p>";
    }

    $insertQuery->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Expense to Personal Budget</title>
</head>
<body>
    <h2>Add an Expense</h2>
    <form action="" method="post">
        <label for="category">Category:</label>
        <select name="category" id="category" required>
            <option value="Food">Food</option>
            <option value="Utilities">Utilities</option>
            <option value="Transportation">Transportation</option>
            <option value="Entertainment">Entertainment</option>
            <option value="Healthcare">Healthcare</option>
Add more categories as needed
        </select><br><br>
        
        <label for="amount">Amount: $</label>
        <input type="number" id="amount" name="amount" step="0.01" required><br><br>
        
        <button type="submit">Add Expense</button>
    </form>
</body>
</html>
