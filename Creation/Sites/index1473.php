<?php
// Display errors for debugging, should be removed or turned off for production
ini_set('display_errors', 1);
error_reporting(E_ALL);

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
$sql = "CREATE TABLE IF NOT EXISTS FinanceGoals (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
goal_name VARCHAR(255) NOT NULL,
goal_amount DOUBLE NOT NULL,
saved_amount DOUBLE DEFAULT 0,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === FALSE) {
  echo "Error creating table: " . $conn->error;
}

// Form handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $goal_name = $_POST["goal_name"];
    $goal_amount = $_POST["goal_amount"];
  
    $sql = "INSERT INTO FinanceGoals (goal_name, goal_amount)
    VALUES ('".$goal_name."', '".$goal_amount."')";

    if ($conn->query($sql) === TRUE) {
      echo "<div> New record created successfully </div>";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Personal Finance Goal Tracker</title>
    <style>
        body {font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f0f0f0;}
        .container {width: 80%; margin: auto; overflow: hidden;}
        header {background: #50a3a2; color: white; padding-top: 30px; min-height: 70px; border-bottom: #eaeaea 1px solid;}
        header h1 {padding: 5px 0; margin: 0; text-align: center;}
        #main {padding: 15px;}
        footer {background: #50a3a2; color: white; text-align: center; padding: 5px; position: fixed; bottom: 0; width: 100%;}
        form {width: 100%; margin-top: 20px;}
        input[type="text"], input[type="number"] {padding: 10px; margin: 5px; width: 95%;}
        input[type="submit"] {padding: 10px; background-color: #50a3a2; color: white; border: none; cursor: pointer; margin: 5px;}
        input[type="submit"]:hover {background-color: #62b3b2}
        .goals {background-color: #fff; padding: 15px; margin-top: 15px;}
    </style>
</head>

<body>
<header>
    <h1>Personal Finance Goal Tracker</h1>
</header>

<div id="main" class="container">
    <form action="" method="post">
        <input type="text" name="goal_name" placeholder="Goal Name" required>
        <input type="number" name="goal_amount" placeholder="Goal Amount" required>
        <input type="submit" value="Add Goal">
    </form>

    <div class="goals">
        <h2>Goals</h2>
        <?php
        $sql = "SELECT id, goal_name, goal_amount, saved_amount FROM FinanceGoals";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div>Id: " . $row["id"]. " | Goal: " . $row["goal_name"]. " ($" .$row["goal_amount"]. ")</div><br>";
            }
        } else {
            echo "0 results";
        }
        ?>
    </div>
</div>

<footer>
    <p>Personal Finance Goal Tracker</p>
</footer>
</body>
</html>

<?php
$conn->close();
?>
