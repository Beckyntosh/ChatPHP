<?php
// Handle database connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create table if it doesn't exist
    $createTableSql = "CREATE TABLE IF NOT EXISTS expenses (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        category VARCHAR(30) NOT NULL,
        amount DECIMAL(10,2) NOT NULL,
        expense_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
    $conn->exec($createTableSql);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $_POST['category'];
    $amount = $_POST['amount'];
    
    try {
        $stmt = $conn->prepare("INSERT INTO expenses (category, amount) VALUES (:category, :amount)");
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':amount', $amount);
        
        $stmt->execute();
        $successMessage = "New expense successfully added!";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Expense to Personal Budget</title>
</head>
<body>

<h2>Add Expense</h2>

<?php if (!empty($successMessage)) echo "<p>$successMessage</p>"; ?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="category">Category:</label>
    <select name="category" id="category" required>
        <option value="">Select a category</option>
        <option value="Food">Food</option>
        <option value="Gardening Tools">Gardening Tools</option>
        <option value="Utilities">Utilities</option>
    </select>
    <br><br>
    <label for="amount">Amount: $</label>
    <input type="number" id="amount" name="amount" step=".01" required>
    <br><br>
    <input type="submit" value="Submit">
</form>

</body>
</html>
