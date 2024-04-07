<?php
// Define database connection parameters
define("DB_SERVER", "db");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("DB_DATABASE", "my_database");
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create expenses table if it does not exist
$tableQuery = "CREATE TABLE IF NOT EXISTS expenses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(50) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$conn->query($tableQuery);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $_POST['category'];
    $amount = $_POST['amount'];

    // Insert into database
    $insertQuery = $conn->prepare("INSERT INTO expenses (category, amount) VALUES (?, ?)");
    $insertQuery->bind_param("sd", $category, $amount);
    $insertQuery->execute();

    echo "<p>Expense added successfully!</p>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Expense</title>
</head>
<body>
    <h2>Add Expense to Personal Budget</h2>
    <form method="POST">
        <label for="category">Category:</label>
        <select name="category" id="category" required>
            <option value="Food">Food</option>
            <option value="Vinyl Records">Vinyl Records</option>
            <option value="Utilities">Utilities</option>
            <option value="Entertainment">Entertainment</option>
Add more categories as needed
        </select>
        <br><br>
        <label for="amount">Amount: $</label>
        <input type="number" step="0.01" name="amount" id="amount" required>
        <br><br>
        <input type="submit" value="Add Expense">
    </form>
</body>
</html>

<?php
$conn->close();
?>
