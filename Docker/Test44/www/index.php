// PARAMETERS: Function: Volunteer Sign-up Platform for Events and Causes: create an example signup platform for volunteering at events and social causes. Example: User registers to volunteer at a local charity event Product: Magazines Style: standalone
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

// Create table for Volunteer Sign-up if not exists
$sql = "CREATE TABLE IF NOT EXISTS volunteer_signups (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fullname VARCHAR(50) NOT NULL,
email VARCHAR(50),
event VARCHAR(100),
signup_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // echo "Table volunteer_signups created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $event = $_POST['event'];

  $sql = "INSERT INTO volunteer_signups (fullname, email, event)
  VALUES ('$fullname', '$email', '$event')";

  if ($conn->query($sql) === TRUE) {
    echo "<p>Thank you for signing up, $fullname! You will receive an email confirmation soon.</p>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Volunteer Sign-up Platform</title>
<style>
  body { font-family: Arial, sans-serif; }
  form { max-width: 400px; margin: auto; padding: 20px; border: 1px solid #ccc; }
  input[type=text], input[type=email] { width: 100%; padding: 12px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; box-sizing: border-box; }
  select { width: 100%; padding: 12px; margin: 10px 0; display: inline-block; border: 1px solid #ccc; box-sizing: border-box; }
  button { background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; cursor: pointer; width: 100%; }
  button:hover { opacity: 0.8; }
</style>
</head>
<body>

<h2>Volunteer Sign-up Form</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <label for="fullname">Full Name:</label>
  <input type="text" id="fullname" name="fullname" required>

  <label for="email">Email:</label>
  <input type="email" id="email" name="email" required>

  <label for="event">Select Event:</label>
  <select id="event" name="event">
    <option value="Local Charity Event">Local Charity Event</option>
    <option value="Beach Clean-Up">Beach Clean-Up</option>
    <option value="Food Drive">Food Drive</option>
    <option value="Other">Other</option>
  </select>

  <button type="submit">Sign Up</button>
</form>

</body>
</html>
