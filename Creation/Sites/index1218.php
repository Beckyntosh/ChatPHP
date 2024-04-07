<?php

$server = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection
$conn = new mysqli($server, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $_POST['category'];
    $amount = (float)$_POST['amount'];
    $description = $_POST['description'];

    $sql = "INSERT INTO expenses (category, amount, description) VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sds", $category, $amount, $description);

    if ($stmt->execute() === TRUE) {
        echo "<p>New record created successfully</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }

    $stmt->close();
}

// Create table if not exists
$table = "CREATE TABLE IF NOT EXISTS expenses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(50) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    description TEXT NOT NULL,
    reg_date TIMESTAMP
)";

if (!$conn->query($table) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Expense to Personal Budget</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: auto; padding: 20px; }
        input, select, textarea { width: 100%; padding: 12px 20px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; box-sizing: border-box; }
        input[type=submit] { background-color: #4CAF50; color: white; border: none; cursor: pointer; }
        input[type=submit]:hover { background-color: #45a049; }
    </style>
</head>
<body>

<div class="container">
    <h2>Add Expense</h2>
    <form action="" method="post">
        <label for="category">Category:</label>
        <select id="category" name="category">
            <option value="Food">Food</option>
            <option value="Furniture">Furniture</option>
Add more categories as needed
        </select>

        <label for="amount">Amount:</label>
        <input type="text" id="amount" name="amount" placeholder="200" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" placeholder="Describe the expense..." required></textarea>

        <input type="submit" value="Add Expense">
    </form>
</div>

</body>
</html>
