<?php
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

// Create tables if not exists
$sql = "CREATE TABLE IF NOT EXISTS finance_goals (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    goal_name VARCHAR(50) NOT NULL,
    goal_amount DOUBLE NOT NULL,
    saved_amount DOUBLE NOT NULL DEFAULT 0,
    creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $goal_name = $_POST["goal_name"];
    $goal_amount = $_POST["goal_amount"];

    $sql = "INSERT INTO finance_goals (goal_name, goal_amount)
    VALUES ('$goal_name', '$goal_amount')";

    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Personal Finance Goals</title>
    <style>
        body {
            font-family: "Trebuchet MS", Arial;
            background-color: #f2f2f2;
            color: #333;
        }
        .container {
            width: 80%;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px 0 rgba(0,0,0,0.1);
        }
        input[type=text], input[type=number] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #45a049;
        }
        h1 {
            color: #333;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Create a Personal Finance Goal</h1>
    <form method="POST">
        <label for="goal_name">Goal Name:</label>
        <input type="text" id="goal_name" name="goal_name" placeholder="e.g., Save $5,000 for Travel" required>

        <label for="goal_amount">Goal Amount ($):</label>
        <input type="number" id="goal_amount" name="goal_amount" placeholder="5000" required>

        <input type="submit" value="Submit">
    </form>
</div>

<?php
// Fetch and display goals
$sql = "SELECT id, goal_name, goal_amount, saved_amount FROM finance_goals";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<div class='container'><h2>Finance Goals</h2><ul>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<li>". $row["goal_name"]. " - $" . $row["goal_amount"] . " - Saved: $" . $row["saved_amount"] . "</li>";
    }
    echo "</ul></div>";
} else {
    echo "<div class='container'><p>No goals found</p></div>";
}
$conn->close();
?>

</body>
</html>
