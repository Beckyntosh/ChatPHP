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

// Create table if not exists
$createTable = "CREATE TABLE IF NOT EXISTS volunteers (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fullname VARCHAR(30) NOT NULL,
email VARCHAR(50),
event VARCHAR(50),
registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
// Execute query
$conn->query($createTable);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $event = $_POST['event'];

  $stmt = $conn->prepare("INSERT INTO volunteers (fullname, email, event) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $fullname, $email, $event);
  
  if($stmt->execute()){
    echo "<p>Thank you for signing up, $fullname!</p>";
  }else{
    echo "<p>There was a problem with your registration.</p>";
  }
  
  $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Volunteer Sign-up</title>
<style>
    body { font-family: Arial, sans-serif; }
    .container { max-width: 400px; margin: 50px auto; padding: 20px; }
    form { display: flex; flex-direction: column; }
    label, input, select, button { margin-bottom: 10px; }
</style>
</head>
<body>

<div class="container">
  <h2>Volunteer Sign-up Form for Charity Events</h2>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="fullname">Full Name:</label>
    <input type="text" id="fullname" name="fullname" required>
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    
    <label for="event">Select Event:</label>
    <select id="event" name="event">
      <option value="Local Charity Event">Local Charity Event</option>
      <option value="Beach Cleanup">Beach Cleanup</option>
      <option value="Food Drive">Food Drive</option>
      <option value="Other">Other</option>
    </select>
    
    <button type="submit">Submit</button>
  </form>
</div>

</body>
</html>
