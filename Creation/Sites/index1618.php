<?php
// DB Connection
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
$sql = "CREATE TABLE IF NOT EXISTS pet_profiles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
type VARCHAR(30) NOT NULL,
age INT(3),
health_info TEXT,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table pet_profiles created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$name = $type = $age = $health_info = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $type = $_POST['type'];
  $age = $_POST['age'];
  $health_info = $_POST['health_info'];

  $sql = "INSERT INTO pet_profiles (name, type, age, health_info) VALUES (?, ?, ?, ?)";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssis", $name, $type, $age, $health_info);

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Pet Profile</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 400px; margin: auto; padding: 20px; }
        form { display: flex; flex-direction: column; }
        input, textarea { margin-bottom: 10px; padding: 10px; border-radius: 5px; border: 1px solid #ccc; }
        button { background-color: #007bff; color: white; padding: 10px; border: none; border-radius: 5px; cursor: pointer; }
        button:hover { background-color: #0056b3; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Create Pet Profile</h2>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="name">Pet Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="type">Pet Type:</label>
            <input type="text" id="type" name="type" required>

            <label for="age">Pet Age:</label>
            <input type="number" id="age" name="age" required>

            <label for="health_info">Health Info:</label>
            <textarea id="health_info" name="health_info" rows="4" required></textarea>

            <button type="submit">Create Profile</button>
        </form>
    </div>
</body>
</html>
