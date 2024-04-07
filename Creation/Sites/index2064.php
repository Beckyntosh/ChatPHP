<?php
// Establish connection to MySQL database
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

// SQL to create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS pet_profiles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
type VARCHAR(30) NOT NULL,
health_info TEXT,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission for creating a new pet profile
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["name"])) {
  $name = $_POST["name"];
  $type = $_POST["type"];
  $health_info = $_POST["health_info"];

  $stmt = $conn->prepare("INSERT INTO pet_profiles (name, type, health_info) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $name, $type, $health_info);

  if ($stmt->execute() === TRUE) {
    echo "<p>Pet profile created successfully</p>";
  } else {
    echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
  }
  $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Pet Profile</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: auto; padding: 20px; }
        form { display: flex; flex-flow: column; }
        label { font-weight: bold; }
        input[type="text"], textarea { margin-bottom: 20px; }
        input[type="submit"] { background-color: #007bff; color: white; border: none; padding: 10px; cursor: pointer; }
        input[type="submit"]:hover { background-color: #0056b3; }
    </style>
</head>
<body>
<div class="container">
    <h2>Create a Pet Profile</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="name">Pet Name:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="type">Pet Type (e.g., Dog, Cat):</label>
        <input type="text" id="type" name="type" required>
        
        <label for="health_info">Health Info:</label>
        <textarea id="health_info" name="health_info" rows="4" required></textarea>
        
        <input type="submit" value="Create Profile">
    </form>
</div>
</body>
</html>
