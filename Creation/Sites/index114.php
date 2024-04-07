<?php
// Connection variables
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

// Create exercise table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS exercises (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    duration INT NOT NULL,
    type VARCHAR(30) NOT NULL,
    intensity VARCHAR(30) NOT NULL,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if (!$conn->query($sql) === TRUE) {
    die("Error creating table: " . $conn->error);
}

// If form is submitted, insert exercise record
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $duration = $_POST['duration'];
    $type = $_POST['type'];
    $intensity = $_POST['intensity'];

    $stmt = $conn->prepare("INSERT INTO exercises (duration, type, intensity) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $duration, $type, $intensity);

    if ($stmt->execute() === TRUE) {
        echo "<p>Exercise logged successfully!</p>";
    } else {
        echo "<p>Error logging exercise: " . $conn->error . "</p>";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log Exercise</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0e6f6;
            color: #333;
            text-align: center;
        }
        form {
            max-width: 300px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
        }
        input, select {
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
    </style>
</head>
<body>
    <h2>Log your Exercise</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <label for="duration">Duration (in minutes):</label><br>
      <input type="number" id="duration" name="duration" required><br>
      <label for="type">Type of Exercise:</label><br>
      <input type="text" id="type" name="type" required><br>
      <label for="intensity">Intensity:</label><br>
      <select id="intensity" name="intensity">
        <option value="Low">Low</option>
        <option value="Medium">Medium</option>
        <option value="High">High</option>
      </select><br>
      <input type="submit" value="Log Exercise">
    </form>
</body>
</html>