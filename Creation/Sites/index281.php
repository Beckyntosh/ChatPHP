<?php
// Handle database connection
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

// Create Expense Table if it doesn't exist
$expenseTable = "CREATE TABLE IF NOT EXISTS expenses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(50) NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    expense_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($expenseTable) === TRUE) {
    // Table creation success
} else {
    echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $_POST['category'];
    $amount = $_POST['amount'];
    
    // Insert expense into database
    $sql = "INSERT INTO expenses (category, amount) VALUES (?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sd", $category, $amount);
    
    if ($stmt->execute()) {
        echo "New expense successfully added!";
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
</head>
<body>
<h2>Add Expense</h2>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="category">Expense Category:</label>
    <select name="category" required>
        <option value="Food">Food</option>
        <option value="Utilities">Utilities</option>
        <option value="Personal">Personal</option>
        <option value="Other">Other</option>
    </select><br><br>
    <label for="amount">Amount:</label>
    <input type="number" name="amount" step="0.01" required><br><br>
    <input type="submit" value="Submit">
</form>
</body>
</html>
