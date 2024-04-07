<?php
// Connect to the database
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

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $expenseCategory = $_POST['expenseCategory'];
    $amount = $_POST['amount'];
    $description = $_POST['description'];

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO expenses (category, amount, description) VALUES (?, ?, ?)");
    $stmt->bind_param("sds", $expenseCategory, $amount, $description);
    
    if ($stmt->execute()) {
        echo "<p>Expense added successfully!</p>";
    } else {
        echo "<p>Error adding expense: " . $conn->error . "</p>";
    }
}

// Create the expenses table if it doesn't exist
$conn->query("CREATE TABLE IF NOT EXISTS expenses (id INT AUTO_INCREMENT PRIMARY KEY, category VARCHAR(255) NOT NULL, amount DECIMAL(10,2) NOT NULL, description TEXT, entry_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP)");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Expense to Personal Budget</title>
</head>
<body>
    <h1>Add Expense</h1>
    <form method="POST">
        <label for="expenseCategory">Category:</label>
        <select name="expenseCategory" id="expenseCategory">
            <option value="Food">Food</option>
            <option value="Wines">Wines</option>
            <option value="Utilities">Utilities</option>
            <option value="Entertainment">Entertainment</option>
        </select><br>
        
        <label for="amount">Amount: $</label>
        <input type="number" id="amount" name="amount" step="0.01" required><br>
        
        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" cols="50"></textarea><br>
        
        <button type="submit">Add Expense</button>
    </form>
</body>
</html>
<?php
$conn->close();
?>
