<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS Exercises (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
exercise VARCHAR(30) NOT NULL,
duration INT(10),
intensity VARCHAR(30),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table Exercises created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $exercise = $_POST["exercise"];
    $duration = $_POST["duration"];
    $intensity = $_POST["intensity"];

    $stmt = $conn->prepare("INSERT INTO Exercises (exercise, duration, intensity) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $exercise, $duration, $intensity);

    if ($stmt->execute() === TRUE) {
        echo "New exercise record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Log Exercise - Digital Workout Log</title>
    <style>
        body {font-family: "Times New Roman", Times, serif; margin: 40px; background-color: #F5F5DC;}
        form {margin: auto; width: 60%; padding: 20px; background-color: #FFFAF0; border: solid thin #F4A460; border-radius: 5px;}
        h2 {text-align: center; color: #8B4513;}
        .input-group {margin: 10px 0px 10px 0px;}
        .input-group label {display: block; text-align: left; margin: 3px;}
        .input-group input {height: 30px; width: 93%; padding: 5px 10px; font-size: 16px; border-radius: 5px; border: 1px solid gray;}
        .btn {padding: 10px; font-size: 15px; color: white; background: #5F9EA0; border: none; border-radius: 5px; cursor: pointer;}
    </style>
</head>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <h2>Add Exercise to Your Digital Workout Log</h2>
  <div class="input-group">
    <label for="exercise">Exercise:</label>
    <input type="text" name="exercise" id="exercise" required>
  </div>
  <div class="input-group">
    <label for="duration">Duration (in minutes):</label>
    <input type="number" name="duration" id="duration" required>
  </div>
  <div class="input-group">
    <label for="intensity">Intensity:</label>
    <select name="intensity" id="intensity" required>
      <option value="low">Low</option>
      <option value="moderate">Moderate</option>
      <option value="high">High</option>
    </select>
  </div>
  <button type="submit" class="btn">Add Exercise</button>
</form>

</body>
</html>
