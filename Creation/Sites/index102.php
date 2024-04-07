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

// Table creation
$tableSql = "CREATE TABLE IF NOT EXISTS expenses (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  category VARCHAR(30) NOT NULL,
  amount DECIMAL(10,2) NOT NULL,
  date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($tableSql)) {
  echo "Error creating table: " . $conn->error;
}

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $_POST['category'];
    $amount = $_POST['amount'];

    $insertSql = "INSERT INTO expenses (category, amount) VALUES (?, ?)";

    $stmt = $conn->prepare($insertSql);
    $stmt->bind_param("sd", $category, $amount);

    if ($stmt->execute()) {
        echo "<script>alert('Expense added successfully!')</script>";
    } else {
        echo "<script>alert('Error adding expense: " . $stmt->error . "')</script>";
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
    <title>Add Expense - Gardening Tools</title>
</head>
<body>
    <h1>Add Expense to Personal Budget</h1>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="category">Category:</label><br>
        <input type="text" id="category" name="category" required><br>
        <label for="amount">Amount:</label><br>
        <input type="number" id="amount" name="amount" step="0.01" required><br><br>
        <input type="submit" value="Add Expense">
    </form>
</body>
</html>