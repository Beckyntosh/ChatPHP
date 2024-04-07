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

// Expense table creation if not exists
$sql = "CREATE TABLE IF NOT EXISTS expenses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(30) NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    reg_date TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle form data insertion into database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $_POST['category'];
    $amount = $_POST['amount'];

    $sql = "INSERT INTO expenses (category, amount)
    VALUES ('" . $category . "', '" . $amount . "')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Expense added successfully!</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Expense to Personal Budget</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 400px; margin: auto; padding: 20px; }
        .form-group { margin-bottom: 15px; }
        label { margin-bottom: 5px; display: block; }
        input[type="text"], input[type="number"] { width: 100%; padding: 10px; }
        input[type="submit"] { padding: 10px 15px; background-color: #f44; color: white; border: none; cursor: pointer; }
        input[type="submit"]:hover { background-color: #c33; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add Expense</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="category">Category:</label>
                <input type="text" id="category" name="category" required>
            </div>
            <div class="form-group">
                <label for="amount">Amount:</label>
                <input type="number" step="0.01" id="amount" name="amount" required>
            </div>
            <input type="submit" value="Add Expense">
        </form>
    </div>
</body>
</html>
