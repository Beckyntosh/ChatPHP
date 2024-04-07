<?php
// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connection parameters
    $servername = "db";
    $username = "root";
    $password = "root";
    $dbname = "my_database";

    try {
        // Create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Create table if not exists
        $sql = "CREATE TABLE IF NOT EXISTS habit_tracker (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            habit VARCHAR(255) NOT NULL,
            goal INT(10),
            date_logged DATE NOT NULL,
            progress INT(10),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )";

        // Use exec() because no results are returned
        $conn->exec($sql);

        // insert new entry
        $sql = "INSERT INTO habit_tracker (habit, goal, date_logged, progress) VALUES (?, ?, ?, ?)";
        $stmt= $conn->prepare($sql);
        $stmt->execute([
            $_POST['habit'],
            $_POST['goal'],
            date('Y-m-d'), // logs today's date
            $_POST['progress']
        ]);

        echo "New record created successfully";

    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    $conn = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Habit Tracker</title>
</head>
<body>
    <h1>Track Your Habit</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="habit">Habit Name:</label><br>
        <input type="text" id="habit" name="habit" value="Drink 2 liters of water daily"><br>
        <label for="goal">Goal (in liters):</label><br>
        <input type="number" id="goal" name="goal" value="2"><br>
        <label for="progress">Today's Progress (in liters):</label><br>
        <input type="number" id="progress" name="progress" value="0"><br><br>
        <input type="submit" value="Submit">
    </form> 
</body>
</html>
