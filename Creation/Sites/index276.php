<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Expense | Personal Budget</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f5f5f5; margin: 40px; }
        .container { background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); max-width: 500px; margin: auto; }
        h2 { color: #333; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input[type="text"],
        input[type="number"],
        select { width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; }
        button { padding: 10px 20px; background: #007BFF; color: #fff; border: 0; border-radius: 5px; cursor: pointer; }
        button:hover { background: #0056b3; }
    </style>
</head>
<body>

<div class="container">
    <h2>Add an Expense</h2>
    <form action="" method="post">
        <div class="form-group">
            <label for="amount">Amount ($)</label>
            <input type="number" id="amount" name="amount" required>
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select id="category" name="category" required>
                <option value="Food">Food</option>
                <option value="Utilities">Utilities</option>
                <option value="Transportation">Transportation</option>
                <option value="Entertainment">Entertainment</option>
            </select>
        </div>
        <button type="submit" name="submit">Add Expense</button>
    </form>
</div>

<?php
// DB connection
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

// Check if form was submitted
if (isset($_POST['submit'])) {
    $amount = $_POST['amount'];
    $category = $_POST['category'];
    
    // Create table if not exists
    $sql = "CREATE TABLE IF NOT EXISTS expenses (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        amount DECIMAL(10, 2) NOT NULL,
        category VARCHAR(30) NOT NULL,
        reg_date TIMESTAMP
    )";

    if ($conn->query($sql) === TRUE) {
        // Insert expense
        $stmt = $conn->prepare("INSERT INTO expenses (amount, category) VALUES (?, ?)");
        $stmt->bind_param("ds", $amount, $category);
        if ($stmt->execute()) {
            echo "<p>Expense added successfully!</p>";
        } else {
            echo "<p>Error adding expense: " . $stmt->error . "</p>";
        }
        $stmt->close();
    } else {
        echo "<p>Error creating table: " . $conn->error . "</p>";
    }
}

$conn->close();

?>

</body>
</html>
