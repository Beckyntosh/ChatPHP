<?php
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    $goal_name = $_POST['goal_name'];
    $target_amount = $_POST['target_amount'];
    $current_amount = $_POST['current_amount'];

    $sql = "INSERT INTO finance_goals (goal_name, target_amount, current_amount)
    VALUES ('".$goal_name."', '".$target_amount."', '".$current_amount."')";

    if ($conn->query($sql) === TRUE) {
      echo "<script>alert('New goal has been added successfully.')</script>";
    } else {
      echo "<script>alert('Error: " . $sql . "<br>" . $conn->error."')</script>";
    }
    
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Set Personal Finance Goal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            padding: 20px;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 15px;
            max-width: 500px;
            margin: auto;
        }
        input[type=text], input[type=number] {
            width: 100%;
            padding: 15px;
            margin: 8px 0;
            display: inline-block;
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
    </style>
</head>
<body>
<div class="container">
    <h2>Set a New Finance Goal</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="goal_name">Goal Name:</label>
        <input type="text" id="goal_name" name="goal_name" required>
        
        <label for="target_amount">Target Amount:</label>
        <input type="number" id="target_amount" name="target_amount" required>
        
        <label for="current_amount">Current Amount:</label>
        <input type="number" id="current_amount" name="current_amount" required>
        
        <input type="submit" value="Submit">
    </form>
</div>

</body>
</html>

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

// sql to create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS finance_goals (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    goal_name VARCHAR(50) NOT NULL,
    target_amount DECIMAL(10, 2) NOT NULL,
    current_amount DECIMAL(10, 2) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    // Table creation success
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>