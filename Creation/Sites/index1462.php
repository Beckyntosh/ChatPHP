<?php

// Connection variables
$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the table if it doesn't exist
$tableCreationQuery = "CREATE TABLE IF NOT EXISTS finance_goals (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    goal_name VARCHAR(255) NOT NULL,
    target_amount DECIMAL(10,2) NOT NULL,
    current_amount DECIMAL(10,2) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($tableCreationQuery) === TRUE) {
    // Table created successfully or already exists
} else {
    echo "Error creating table: " . $conn->error;
}

// Handle POST request to add a new goal
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['goal_name']) && isset($_POST['target_amount'])) {
    $goal_name = $conn->real_escape_string($_POST['goal_name']);
    $target_amount = $conn->real_escape_string($_POST['target_amount']);

    $insertQuery = "INSERT INTO finance_goals (goal_name, target_amount) VALUES ('$goal_name', '$target_amount')";

    if ($conn->query($insertQuery) === TRUE) {
        echo "<p>Goal added successfully!</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Personal Finance Goal Tracker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
        }
        input[type=text], input[type=number] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 10px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Create a Personal Finance Goal</h2>
    <form action="" method="post">
        <label for="goal_name">Goal Name:</label>
        <input type="text" id="goal_name" name="goal_name" required>

        <label for="target_amount">Target Amount:</label>
        <input type="number" id="target_amount" name="target_amount" step="0.01" required>

        <button type="submit">Add Goal</button>
    </form>

    <h3>Existing Goals</h3>
    <?php
    $selectQuery = "SELECT * FROM finance_goals";
    $result = $conn->query($selectQuery);

    if ($result->num_rows > 0) {
        echo "<ul>";
        while($row = $result->fetch_assoc()) {
            echo "<li>" . $row["goal_name"]. " - " . "$" . $row["target_amount"] . " / $" . $row["current_amount"] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No goals found. Start by adding a new goal.</p>";
    }
    $conn->close();
    ?>
</div>
</body>
</html>
