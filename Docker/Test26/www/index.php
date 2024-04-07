// PARAMETERS: Function: Volunteer Sign-up Platform for Events and Causes: create an example signup platform for volunteering at events and social causes. Example: User registers to volunteer at a local charity event Product: Tablets Style: all-encompassing
<?php
// Establish database connection
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

// Create volunteers table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS volunteers (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fullname VARCHAR(50) NOT NULL,
email VARCHAR(50),
event VARCHAR(100),
register_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  //echo "Table volunteers created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fullname = $_POST["fullname"];
  $email = $_POST["email"];
  $event = $_POST["event"];

  $stmt = $conn->prepare("INSERT INTO volunteers (fullname, email, event) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $fullname, $email, $event);

  if ($stmt->execute()) {
    echo "<p>Thank you for volunteering, ".$fullname.". We have received your submission.</p>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Volunteer Sign-up Platform</title>
<style>
  body { font-family: Arial, sans-serif; }
  .container { max-width: 600px; margin: 0 auto; padding: 20px; }
  form { margin-top: 20px; }
  label { display: block; margin-bottom: 5px; }
  input, select { width: 100%; margin-bottom: 20px; padding: 10px; }
  button { padding: 10px 20px; }
</style>
</head>
<body>
<div class="container">
  <h1>Volunteer Signup Form</h1>
  <form action="" method="post">
    <label for="fullname">Full Name</label>
    <input type="text" id="fullname" name="fullname" required>

    <label for="email">Email</label>
    <input type="email" id="email" name="email" required>

    <label for="event">Select Event</label>
    <select id="event" name="event">
      <option value="Local Charity Event">Local Charity Event</option>
      <option value="Community Clean-Up">Community Clean-Up</option>
      <option value="Food Drive">Food Drive</option>
    </select>

    <button type="submit">Submit</button>
  </form>
</div>
</body>
</html>

<?php $conn->close(); ?>
