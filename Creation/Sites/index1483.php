<?php
// PHP section for server-side logic

// Database connection parameters
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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect post variables
    $goal_name = $_POST['goal_name'];
    $goal_amount = $_POST['goal_amount'];

    $sql = "INSERT INTO finance_goals (goal_name, goal_amount) VALUES (?, ?)";

    // Prepare and bind
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $goal_name, $goal_amount);

    // Execute
    if ($stmt->execute()) {
        echo "New goal created successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Personal Finance Goals</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f0f0; }
        .container { width: 500px; padding: 20px; background-color: white; margin: 20px auto; box-shadow: 0 0 10px #ccc; }
        form { display: flex; flex-direction: column; }
        label { margin: 10px 0 5px; }
        input[type="text"], input[type="number"] { padding: 10px; margin-bottom: 20px; border: 1px solid #ddd; border-radius: 4px; }
        input[type="submit"] { background-color: #5cb85c; color: white; padding: 10px; border: none; border-radius: 4px; cursor: pointer; }
        input[type="submit"]:hover { background-color: #4cae4c; }
    </style>
</head>
<body>

<div class="container">
    <h2>Create a Personal Finance Goal</h2>
    <form action="" method="post">
        <label for="goal_name">Goal Name:</label>
        <input type="text" id="goal_name" name="goal_name" required>

        <label for="goal_amount">Goal Amount ($):</label>
        <input type="number" id="goal_amount" name="goal_amount" required>

        <input type="submit" value="Create Goal">
    </form>
</div>

</body>
</html>
