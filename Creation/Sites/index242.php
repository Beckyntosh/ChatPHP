<?php
// Handling form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Define MySQL connection parameters
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

    $amount = $_POST['amount'];
    $category = $_POST['category'];
    $description = $_POST['description'];

    // SQL to insert the expense
    $sql = "INSERT INTO expenses (amount, category, description) VALUES ('$amount', '$category', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "New expense added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Expense to Personal Budget</title>
</head>
<body>
    <h2>Add Expense</h2>
    <form method="POST" action="">
        <label for="amount">Amount: </label>
        <input type="text" id="amount" name="amount" required><br><br>
        <label for="category">Category: </label>
        <select id="category" name="category">
            <option value="Food">Food</option>
            <option value="Bath Product">Bath Product</option>
            <option value="Utilities">Utilities</option>
            <option value="Entertainment">Entertainment</option>
            <option value="Other">Other</option>
        </select><br><br>
        <label for="description">Description: </label>
        <input type="text" id="description" name="description"><br><br>
        <input type="submit" value="Add Expense">
    </form>
</body>
</html>

<?php
// Auto create the table if not exists (Assuming MySQL)
$db_create_conn = new mysqli($servername, $username, $password);
if ($db_create_conn->connect_error) {
    die("Connection failed: " . $db_create_conn->connect_error);
}

// Create database if not exists
$db_sql = "CREATE DATABASE IF NOT EXISTS my_database";
if ($db_create_conn->query($db_sql) !== TRUE) {
    echo "Error creating database: " . $db_create_conn->error;
}

$db_create_conn->close();

// Connect to the database again
$conn = new mysqli($servername, $username, $password, $dbname);

// SQL to create table if not exists
$table_sql = "CREATE TABLE IF NOT EXISTS expenses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
amount DECIMAL(10, 2) NOT NULL,
category VARCHAR(30) NOT NULL,
description TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($table_sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
