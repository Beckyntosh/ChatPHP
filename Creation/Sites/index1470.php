<?php
// Check if the server method is POST which means form data has been sent
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $servername = "db";
    $username = "root";
    $password = "root";
    $dbname = "my_database";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $goalTitle = $_POST['goalTitle'];
        $goalAmount = $_POST['goalAmount'];

        $sql = "INSERT INTO finance_goals (goal_title, goal_amount) VALUES (?, ?)";
        $stmt= $conn->prepare($sql);
        $stmt->execute([$goalTitle, $goalAmount]);

        echo "New record created successfully";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Personal Finance Goal</title>
    <style>
        body { font-family: Arial, sans-serif; }
    </style>
</head>
<body>
    <h2>Set a Finance Goal</h2>
    <form action="" method="post">
        <label for="goalTitle">Goal Title:</label><br>
        <input type="text" id="goalTitle" name="goalTitle" placeholder="e.g., Save for travel" required><br>
        <label for="goalAmount">Goal Amount ($):</label><br>
        <input type="number" id="goalAmount" name="goalAmount" placeholder="e.g., 5000" required><br><br>
        <input type="submit" value="Submit">
    </form>

    <?php 
    // Display goals
    try {
        $conn = new PDO("mysql:host=db;dbname=my_database", 'root', 'root');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT goal_title, goal_amount FROM finance_goals");
        $stmt->execute();

        // set the resulting array to associative
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(count($result) > 0) {
            echo "<h3>Your Goals</h3>";
            echo "<ul>";
            foreach($result as $row) {
                echo "<li>".htmlspecialchars($row['goal_title']).": $".htmlspecialchars($row['goal_amount'])."</li>";
            }
            echo "</ul>";
        }

    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>
</body>
</html>
