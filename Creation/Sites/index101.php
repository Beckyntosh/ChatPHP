<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture the inputs
    $category = $_POST['category'];
    $amount = $_POST['amount'];
    $description = $_POST['description'];
    $date = $_POST['date'];

    // Database configuration
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

    // Create table if it does not exist
    $sql = "CREATE TABLE IF NOT EXISTS Expenses (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                category VARCHAR(30) NOT NULL,
                amount DECIMAL(10,2) NOT NULL,
                description TEXT,
                expense_date DATE NOT NULL,
                reg_date TIMESTAMP
            )";

    if ($conn->query($sql) !== TRUE) {
        echo "Error creating table: " . $conn->error;
    }
    
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO Expenses (category, amount, description, expense_date) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sdss", $category, $amount, $description, $date);

    // Set parameters and execute
    if($stmt->execute()){
        echo "New record created successfully";
    }else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Expense to Personal Budget</title>
</head>
<body>

<h2>Add Expense</h2>

<form method="post" action="">
    <label for="category">Category:</label><br>
    <input type="text" id="category" name="category" required><br>

    <label for="amount">Amount:</label><br>
    <input type="number" id="amount" name="amount" step="0.01" required><br>

    <label for="description">Description:</label><br>
    <textarea id="description" name="description"></textarea><br>

    <label for="date">Date:</label><br>
    <input type="date" id="date" name="date" required><br>

    <input type="submit" value="Submit">
</form> 

</body>
</html>