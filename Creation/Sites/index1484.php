<?php
// Connect to database
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create tables if they don't exist
    $sqlGoalsTable = "CREATE TABLE IF NOT EXISTS finance_goals (
        id INT AUTO_INCREMENT PRIMARY KEY,
        goal_name VARCHAR(100) NOT NULL,
        goal_amount DECIMAL(10,2) NOT NULL,
        saved_amount DECIMAL(10,2) DEFAULT 0,
        creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    $conn->exec($sqlGoalsTable);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["goalName"]) && isset($_POST["goalAmount"])) {
    $goalName = $_POST["goalName"];
    $goalAmount = $_POST["goalAmount"];

    $sqlInsert = "INSERT INTO finance_goals (goal_name, goal_amount) VALUES (?, ?)";
    $stmt= $conn->prepare($sqlInsert);
    $stmt->execute([$goalName, $goalAmount]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Finance Goals</title>
</head>
<body>
    <h2>Create a Personal Finance Goal</h2>
    <form action="" method="post">
        <label for="goalName">Goal Name:</label><br>
        <input type="text" id="goalName" name="goalName" required><br>
        <label for="goalAmount">Goal Amount ($):</label><br>
        <input type="number" id="goalAmount" name="goalAmount" required step=".01"><br><br>
        <input type="submit" value="Submit">
    </form>

    <h2>Your Goals</h2>
    <ul>
        <?php
        $stmt = $conn->prepare("SELECT goal_name, goal_amount, saved_amount FROM finance_goals");
        $stmt->execute();

        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach($stmt->fetchAll() as $goal) {
            echo "<li>" . htmlspecialchars($goal["goal_name"]) . " - Goal: $" . htmlspecialchars($goal["goal_amount"]) . ", Saved: $" . htmlspecialchars($goal["saved_amount"]) . "</li>";
        }
        ?>
    </ul>
</body>
</html>
