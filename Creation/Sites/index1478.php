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

// Table creation
$goalsTable = "CREATE TABLE IF NOT EXISTS finance_goals (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                goal_name VARCHAR(255) NOT NULL,
                target_amount FLOAT NOT NULL,
                current_amount FLOAT DEFAULT 0,
                creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
              )";

if ($conn->query($goalsTable) === TRUE) {
    echo ""; // Success, remains silent in production mode.
} else {
    echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $goal_name = $_POST['goal_name'];
    $target_amount = $_POST['target_amount'];

    $sql = "INSERT INTO finance_goals (goal_name, target_amount)
    VALUES ('$goal_name', '$target_amount')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('New goal created successfully');</script>";
    } else {
        echo "<script>alert('Error: " . $sql . "<br>" . $conn->error."');</script>";
    }
}

$conn->close();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Personal Finance Goals</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #0a0b0e;
            color: #00ffea;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            width: 300px;
            margin: auto;
        }
        input, button {
            padding: 10px;
            margin: 5px 0;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Create a Personal Finance Goal</h2>
    <form method="post">
        <label for="goal_name">Goal Name</label>
        <input type="text" id="goal_name" name="goal_name" required>

        <label for="target_amount">Target Amount ($)</label>
        <input type="number" id="target_amount" name="target_amount" required>

        <button type="submit">Create Goal</button>
    </form>
</div>
</body>
</html>
