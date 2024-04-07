<?php
// Setup connection parameters
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
$volunteerTable = "CREATE TABLE IF NOT EXISTS Volunteers (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50) NOT NULL,
email VARCHAR(50),
event VARCHAR(100),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($volunteerTable) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $event = $_POST["event"];

  // Prepare and bind
  $stmt = $conn->prepare("INSERT INTO Volunteers (name, email, event) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $name, $email, $event);

  // Execute
  if ($stmt->execute()) {
    echo "<p style='color: green;'>Volunteer registration successful!</p>";
  } else {
    echo "<p style='color: red;'>Error: " . $sql . "<br>" . $conn->error . "</p>";
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
<title>Volunteer Sign-up</title>
<style>
  body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background-color: #f4f4f4; }
  .container { background-color: #fff; padding: 20px; border-radius: 5px; box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1); }
  h2 { color: #333; }
  form { margin-top: 20px; }
  label { font-weight: bold; }
  input[type="text"], input[type="email"] { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 5px; }
  input[type="submit"] { background-color: #333; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; }
  input[type="submit"]:hover { background-color: #555; }
</style>
</head>
<body>
<div class="container">
<h2>Volunteer Sign-up</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
  <label for="name">Name:</label><br>
  <input type="text" id="name" name="name" required><br>
  <label for="email">Email:</label><br>
  <input type="email" id="email" name="email" required><br>
  <label for="event">Event:</label><br>
  <input type="text" id="event" name="event" required><br>
  <input type="submit" value="Submit">
</form>
</div>
</body>
</html>