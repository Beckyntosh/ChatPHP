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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS habits_tracker (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
habit VARCHAR(255) NOT NULL,
goal INT NOT NULL,
date DATE NOT NULL,
progress INT DEFAULT 0,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    // Table created successfully
} else {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $habit = $_POST['habit'];
    $goal = $_POST['goal'];
    $date = date('Y-m-d'); // Current date

    $stmt = $conn->prepare("INSERT INTO habits_tracker (habit, goal, date) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $habit, $goal, $date);

    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Habit Tracker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5deb3;
            color: #8b4513;
        }
        form, .habit-entry {
            margin: 20px;
            padding: 20px;
            background-color: #fff8dc;
            border-radius: 10px;
        }
        input, button {
            padding: 10px;
            margin: 10px;
        }
    </style>
</head>
<body>
    <h1>Track Your Daily Habits</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="habit">Habit:</label>
        <input type="text" id="habit" name="habit" required placeholder="E.g., Drink water"><br>

        <label for="goal">Goal (in liters for water):</label>
        <input type="number" id="goal" name="goal" required min="1"><br>

        <button type="submit">Add Habit</button>
    </form>
</body>
</html>
