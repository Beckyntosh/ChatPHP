<?php
// database connection
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

// Create table if it doesn't exist
$createTable = "CREATE TABLE IF NOT EXISTS finance_goals (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    goal VARCHAR(255) NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($createTable) !== TRUE) {
    die("Error creating table: " . $conn->error);
}

// Handling the POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $goal = $conn->real_escape_string($_POST['goal']);
    $amount = $conn->real_escape_string($_POST['amount']);
    
    $sql = "INSERT INTO finance_goals (goal, amount) VALUES ('$goal', '$amount')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New goal created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Finance Goal Tracker</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: auto; }
        input, button { width: 100%; padding: 10px; margin-top: 10px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Create a Personal Finance Goal</h2>
    <form action="" method="post">
        <label for="goal">Goal:</label>
        <input type="text" id="goal" name="goal" placeholder="e.g., Save $5,000 for travel" required>
        
        <label for="amount">Amount ($):</label>
        <input type="number" id="amount" name="amount" step="0.01" required>
        
        <button type="submit">Submit</button>
    </form>
</div>

<div class="container">
    <h2>Your Finance Goals</h2>
    <?php
    $sql = "SELECT id, goal, amount FROM finance_goals";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<p>Goal: " . $row["goal"]. " - Amount: " . $row["amount"]. "</p>";
        }
    } else {
        echo "No goals set";
    }
    $conn->close();
    ?>
</div>

</body>
</html>
