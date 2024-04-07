<?php
// Handling database connection
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

// Create expenses table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS expenses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(255) NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    expense_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Adding expense
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $_POST['category'];
    $amount = $_POST['amount'];

    $sql = "INSERT INTO expenses (category, amount) VALUES ('$category', '$amount')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Expense | Personal Budget</title>
    <style>
        body {
            font-family: 'Ada Lovelace', sans-serif;
            background-color: #f0f0f0;
            color: #333;
        }
        .container {
            width: 50%;
            margin: 0 auto;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Add Expense to Personal Budget</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="category">Category:</label>
        <select id="category" name="category">
            <option value="Food">Food</option>
            <option value="Utilities">Utilities</option>
            <option value="Transportation">Transportation</option>
            <option value="Entertainment">Entertainment</option>
            <option value="Other">Other</option>
        </select>
        <br><br>
        <label for="amount">Amount: $</label>
        <input type="number" step="0.01" id="amount" name="amount">
        <br><br>
        <input type="submit" value="Add Expense">
    </form>
</div>

</body>
</html>
