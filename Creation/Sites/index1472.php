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

// Check if table exists, if not create it
$tableCheckQuery = "SHOW TABLES LIKE 'finance_goals'";
$result = $conn->query($tableCheckQuery);

if($result->num_rows == 0) {
    $createTable = "CREATE TABLE finance_goals (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    goal_name VARCHAR(255) NOT NULL,
    goal_amount DOUBLE NOT NULL,
    saved_amount DOUBLE DEFAULT 0,
    creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if ($conn->query($createTable) === TRUE) {
        echo "Table finance_goals created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
}

// Handle POST request to add a new goal
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $goal_name = $_POST["goal_name"];
  $goal_amount = $_POST["goal_amount"];

  $sql = "INSERT INTO finance_goals (goal_name, goal_amount)
  VALUES ('$goal_name', $goal_amount)";

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
        body{ font-family: Arial, sans-serif; }
        .container{ max-width: 600px; margin: 20px auto; padding: 20px;}
        h2 { text-align: center; }
        .form-group{ margin-bottom: 15px;}
        label{ display:block; margin-bottom: 5px;}
        input[type="text"], input[type="number"] { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; }
        input[type="submit"] { padding: 10px 20px; background-color: blue; color: white; border: none; border-radius: 5px; cursor:pointer;}
        input[type="submit"]:hover { background-color: darkblue; }
    </style>
</head>
<body>

<div class="container">
    <h2>Create a Personal Finance Goal</h2>
    <form action="" method="post">
        <div class="form-group">
            <label for="goal_name">Goal Name:</label>
            <input type="text" id="goal_name" name="goal_name" required>
        </div>
        <div class="form-group">
            <label for="goal_amount">Goal Amount ($):</label>
            <input type="number" id="goal_amount" name="goal_amount" step="0.01" required>
        </div>
        <input type="submit" value="Submit">
    </form>
</div>

</body>
</html>

<?php
$conn->close();
?>
