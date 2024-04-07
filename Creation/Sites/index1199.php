<?php

$serverName = "db";
$dbUsername = "root";
$dbPassword = "root";
$dbName = "my_database";

$conn = new mysqli($serverName, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS expenses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(30) NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    // Table created successfully
} else {
    echo "Error creating table: " . $conn->error;
}

if ($_POST) {
    $category = $_POST['category'];
    $amount = $_POST['amount'];

    $stmt = $conn->prepare("INSERT INTO expenses (category, amount) VALUES (?, ?)");
    $stmt->bind_param("sd", $category, $amount);

    if($stmt->execute()) {
        $success_message = "Expense Added Successfully!";
    } else {
        $error_message = "Error Adding Expense";
    }

    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Expense to Personal Budget</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 400px; margin: 0 auto; padding-top: 50px; }
        form { display: flex; flex-direction: column; }
        input, select, button { padding: 10px; margin-bottom: 20px; }
        .success { color: green; }
        .error { color: red; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add Expense</h2>
        <?php if (isset($success_message)): ?><div class="success"><?php echo $success_message; ?></div><?php endif; ?>
        <?php if (isset($error_message)): ?><div class="error"><?php echo $error_message; ?></div><?php endif; ?>
        <form action="" method="post">
            <label for="category">Category</label>
            <select id="category" name="category">
                <option value="Food">Food</option>
                <option value="Fitness Equipment">Fitness Equipment</option>
                <option value="Utilities">Utilities</option>
                <option value="Miscellaneous">Miscellaneous</option>
            </select>

            <label for="amount">Amount ($)</label>
            <input type="number" id="amount" name="amount" step="0.01" required>

            <button type="submit">Add Expense</button>
        </form>
    </div>
</body>
</html>
