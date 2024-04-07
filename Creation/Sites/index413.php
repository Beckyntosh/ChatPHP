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

// SQL to create table
$sql = "CREATE TABLE IF NOT EXISTS VolunteerEvents (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
eventName VARCHAR(30) NOT NULL,
eventDate DATE NOT NULL,
volunteerName VARCHAR(50),
volunteerEmail VARCHAR(50),
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  //echo "Table VolunteerEvents created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $eventName = $_POST['eventName'];
    $eventDate = $_POST['eventDate'];
    $volunteerName = $_POST['volunteerName'];
    $volunteerEmail = $_POST['volunteerEmail'];

    $stmt = $conn->prepare("INSERT INTO VolunteerEvents (eventName, eventDate, volunteerName, volunteerEmail) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $eventName, $eventDate, $volunteerName, $volunteerEmail);

    if($stmt->execute()) {
        echo "<p>Thank you for registering, $volunteerName. We've sent you a confirmation email at $volunteerEmail.</p>";
    } else {
        echo "<p>Sorry, there was an error. Please try again.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Volunteer Sign-up</title>
</head>
<body>
<h2>Volunteer for an Event</h2>

<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
  <label for="eventName">Event Name:</label><br>
  <input type="text" id="eventName" name="eventName" required><br>
  
  <label for="eventDate">Event Date:</label><br>
  <input type="date" id="eventDate" name="eventDate" required><br>
  
  <label for="volunteerName">Your Full Name:</label><br>
  <input type="text" id="volunteerName" name="volunteerName" required><br>
  
  <label for="volunteerEmail">Your Email:</label><br>
  <input type="email" id="volunteerEmail" name="volunteerEmail" required><br><br>
  
  <input type="submit" value="Submit">
</form> 

</body>
</html>
<?php
$conn->close();
?>