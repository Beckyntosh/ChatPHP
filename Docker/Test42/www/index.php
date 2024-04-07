// PARAMETERS: Function: Volunteer Sign-up Platform for Events and Causes: create an example signup platform for volunteering at events and social causes. Example: User registers to volunteer at a local charity event Product: Shoes Style: statistical
<?php
// Establish connection to the MySQL database
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

// Create table for Volunteer Sign-Up if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS Volunteers (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fullName VARCHAR(30) NOT NULL,
email VARCHAR(50),
event VARCHAR(50) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // echo "Table Volunteers created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle the form submission
if($_SERVER["REQUEST_METHOD"] == "POST") {
  $fullName = $_POST['fullName'];
  $email = $_POST['email'];
  $event = $_POST['event'];

  $stmt = $conn->prepare("INSERT INTO Volunteers (fullName, email, event) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $fullName, $email, $event);

  if($stmt->execute()) {
    $success_message = "You have successfully registered as a volunteer!";
  } else {
    $error_message = "Error: " . $sql . "<br>" . $conn->error;
  }

  $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Volunteer Sign-up Platform</title>
</head>
<body>

<h2>Volunteer Sign-up for Events and Social Causes</h2>

<?php if(isset($success_message)) echo "<p style='color:green;'>$success_message</p>"; ?>
<?php if(isset($error_message)) echo "<p style='color:red;'>$error_message</p>"; ?>

<form method="post" action="">
  <label for="fullName">Full Name:</label><br>
  <input type="text" id="fullName" name="fullName" required><br>
  <label for="email">Email:</label><br>
  <input type="email" id="email" name="email" required><br>
  <label for="event">Event:</label><br>
  <select id="event" name="event" required>
    <option value="Local Charity Event">Local Charity Event</option>
    <option value="Community Cleanup">Community Cleanup</option>
    <option value="Food Drive">Food Drive</option>
Add more events as needed
  </select><br><br>
  <input type="submit" value="Submit">
</form> 

</body>
</html>
