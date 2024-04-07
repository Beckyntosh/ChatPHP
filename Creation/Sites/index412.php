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

// Create event table if not exists
$createEventsTable = "CREATE TABLE IF NOT EXISTS events (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(30) NOT NULL,
  description VARCHAR(255),
  event_date DATE,
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($createEventsTable) === TRUE) {
  // echo "Table Events created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Create volunteer table if not exists
$createVolunteerTable = "CREATE TABLE IF NOT EXISTS volunteers (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  event_id INT(6) UNSIGNED,
  name VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (event_id) REFERENCES events(id)
)";

if ($conn->query($createVolunteerTable) === TRUE) {
  // echo "Table Volunteers created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $eventId = $_POST['event_id'];

  $sql = "INSERT INTO volunteers (event_id, name, email) VALUES ('$eventId', '$name', '$email')";

  if ($conn->query($sql) === TRUE) {
    // echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Volunteer Sign-up</title>
<style>
body { font-family: Arial, sans-serif; background-color: #f0f0f0; }
.container { width: 600px; margin: 50px auto; background: #fff; padding: 20px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
form { margin-top: 20px; }
input[type=text], input[type=email], select { width: 100%; padding: 10px; margin: 10px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
input[type=submit] { width: 100%; background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer; }
input[type=submit]:hover { background-color: #45a049; }
</style>
</head>
<body>

<div class="container">
<h2>Volunteer Sign-up Form</h2>
<form action="" method="post">
  <label for="event">Event</label>
  <select id="event" name="event_id">
    <?php
      $sql = "SELECT id, name FROM events";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo '<option value="'. $row["id"].'">'. $row["name"].'</option>';
        }
      } else {
        echo '<option>No available events</option>';
      }
    ?>
  </select>
  
  <label for="name">Name</label>
  <input type="text" id="name" name="name" placeholder="Your name.." required>

  <label for="email">Email</label>
  <input type="email" id="email" name="email" placeholder="Your email.." required>
  
  <input type="submit" value="Submit">
</form>
</div>

</body>
</html>
<?php $conn->close(); ?>