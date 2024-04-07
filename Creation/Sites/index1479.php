<?php
// Initialize the connection parameters
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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS finance_goals (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    goal_title VARCHAR(255) NOT NULL,
    goal_amount DOUBLE NOT NULL,
    saved_amount DOUBLE DEFAULT 0,
    creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($sql) === TRUE) {
    // Table created successfully
} else {
    echo "Error creating table: " . $conn->error;
}

// Insert or update goal
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["goal_title"]) && isset($_POST["goal_amount"])) {
    $goal_title = $_POST["goal_title"];
    $goal_amount = $_POST["goal_amount"];
    $sql = "INSERT INTO finance_goals (goal_title, goal_amount) VALUES ('$goal_title', $goal_amount)
            ON DUPLICATE KEY UPDATE goal_amount = $goal_amount";
            
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finance Goals Tracker</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 80%; margin: auto; }
        input[type=text], input[type=number] { width: 100%; padding: 12px 20px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; box-sizing: border-box; }
        button { background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; cursor: pointer; width: 100%; }
        button:hover { opacity: 0.8; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Create or Update Your Finance Goal</h2>
        <form action="" method="post">
            <label for="goal_title">Goal Title:</label>
            <input type="text" id="goal_title" name="goal_title" required>
            <label for="goal_amount">Goal Amount:</label>
            <input type="number" id="goal_amount" name="goal_amount" required>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>
