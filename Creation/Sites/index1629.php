<?php
// PHP code to connect to the database
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
$sql = "CREATE TABLE IF NOT EXISTS VirtualEvents (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
eventName VARCHAR(30) NOT NULL,
eventDate DATE NOT NULL,
capacity INT(10),
regCount INT(10) DEFAULT 0,
regEnd BOOLEAN NOT NULL DEFAULT 0,
PRIMARY KEY (id)
)";

if ($conn->query($sql) === TRUE) {
  echo "Table VirtualEvents created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// HTML and PHP code for the frontend
?>

<!DOCTYPE html>
<html>
<head>
<title>Children's Clothing Virtual Event Calendar</title>
<style>
    body {font-family: Arial, sans-serif; background-color: #f0e4d7; color: #4a4a4a;}
    .container {max-width: 600px; margin: 20px auto; padding: 20px; background-color: #fff0e1; border-radius: 8px;}
    h2 {color: #ff6347; text-align: center;}
    form {display: flex; flex-direction: column;}
    input, button {margin: 10px 0; padding: 10px; border: 1px solid #ccc; border-radius: 4px;}
    button {background-color: #ff6347; color: white; cursor:pointer;}
</style>
</head>
<body>

<div class="container">
<h2>Create a Virtual Book Club Meeting</h2>
<form action="" method="post">
  <label for="eventName">Event Name:</label>
  <input type="text" id="eventName" name="eventName" required>
  
  <label for="eventDate">Event Date:</label>
  <input type="date" id="eventDate" name="eventDate" required>
  
  <label for="capacity">Capacity:</label>
  <input type="number" id="capacity" name="capacity" min="1" max="100" required>
  
  <button type="submit" name="createEvent">Create Event</button>
</form>
</div>

<?php
// PHP code to handle the form submission
if (isset($_POST['createEvent'])) {
  $eventName = $_POST['eventName'];
  $eventDate = $_POST['eventDate'];
  $capacity = $_POST['capacity'];

  $sql = "INSERT INTO VirtualEvents (eventName, eventDate, capacity) VALUES (?, ?, ?)";
  
  $stmt = $conn->prepare($sql);
  
  $stmt->bind_param("ssi", $eventName, $eventDate, $capacity);
  
  if ($stmt->execute() === TRUE) {
    echo "<p style='text-align:center;'>New event created successfully!</p>";
  } else {
    echo "<p style='text-align:center;'>Error: " . $sql . "<br>" . $conn->error . "</p>";
  }
  
  $stmt->close();
}

$conn->close();
?>
</body>
</html>
