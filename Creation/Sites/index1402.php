<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Habit Tracker</title>
    <style>
        body {
            font-family: 'Garamond', serif;
            background-color: #f5f5dc;
            color: #0a3f50;
        }
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Habit Tracker: Drink Water</h1>
        <form method="POST">
            <label for="date">Date:</label><br>
            <input type="date" id="date" name="date"><br><br>
            <label for="liters">Liters of Water Drank:</label><br>
            <input type="number" id="liters" name="liters" min="0" step="0.01"><br><br>
            <input type="submit" name="submit" value="Save Entry">
        </form>
        <h2>Daily Entries:</h2>
        <ul id="entriesList">
Entries will be displayed here
        </ul>
    </div>

<?php

$servername = 'db';
$username = 'root';
$password = 'root';
$dbname = 'my_database';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create table if not exists
    $sql = "CREATE TABLE IF NOT EXISTS habit_tracker (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        track_date DATE NOT NULL,
        liters_drunk DECIMAL(4,2) NOT NULL,
        reg_date TIMESTAMP
    )";

    $conn->exec($sql);

    if(isset($_POST['submit'])) {
        $date = $_POST['date'];
        $liters = $_POST['liters'];

        $stmt = $conn->prepare("INSERT INTO habit_tracker (track_date, liters_drunk) VALUES (?, ?)");
        $stmt->execute([$date, $liters]);

        echo "<script>alert('Entry Saved Successfully!');</script>";
    }

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

try {
    $stmt = $conn->prepare("SELECT track_date, liters_drunk FROM habit_tracker ORDER BY track_date DESC");
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $entries = $stmt->fetchAll();
    foreach($entries as $entry) {
        echo "<script>document.getElementById('entriesList').innerHTML += '<li>Date: " . $entry['track_date'] . ", Liters: " . $entry['liters_drunk'] . "L</li>';</script>";
    }

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
</body>
</html>
