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

// Create table if not exists
$tableSql = "CREATE TABLE IF NOT EXISTS event_feedback (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  attendee_name VARCHAR(50) NOT NULL,
  event_name VARCHAR(100),
  rating INT(1),
  feedback VARCHAR(255),
  reg_date TIMESTAMP
)";

$conn->query($tableSql);

// Handle form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $attendee_name = $_POST['attendee_name'];
  $event_name = $_POST['event_name'];
  $rating = $_POST['rating'];
  $feedback = $_POST['feedback'];

  $stmt = $conn->prepare("INSERT INTO event_feedback (attendee_name, event_name, rating, feedback) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssis", $attendee_name, $event_name, $rating, $feedback);
  
  if ($stmt->execute()) {
    echo "<script>alert('Feedback submitted successfully!');</script>";
  } else {
    echo "<script>alert('Error submitting feedback.');</script>";
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
<title>Event Feedback Portal</title>
<style>
  body {font-family: Arial, sans-serif; background-color: #f0f0f0; margin: 20px; padding: 20px;}
  .container {background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 5px rgba(0,0,0,0.2);}
  h2 {color: #333;}
  label {font-weight: bold;}
  input[type=text], select, textarea {width: 100%; padding: 12px; margin-top: 6px; margin-bottom: 16px; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;}
  input[type=submit] {background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer;}
  input[type=submit]:hover {background-color: #45a049;}
</style>
</head>
<body>

<div class="container">
  <h2>Event Feedback Form</h2>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    
    <label for="attendee_name">Your Name:</label>
    <input type="text" id="attendee_name" name="attendee_name" required>
    
    <label for="event_name">Event Name:</label>
    <input type="text" id="event_name" name="event_name" required>
    
    <label for="rating">Rating (1-5):</label>
    <select id="rating" name="rating" required>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
    </select>
    
    <label for="feedback">Feedback:</label>
    <textarea id="feedback" name="feedback" style="height:200px" required></textarea>
    
    <input type="submit" value="Submit Feedback">
  </form>
</div>

</body>
</html>
