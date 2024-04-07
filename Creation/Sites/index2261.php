<?php
// Database Connection
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

// Create profile preferences table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS profile_preferences (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED NOT NULL,
favorite_color VARCHAR(30) NOT NULL,
size_preference VARCHAR(30) NOT NULL,
style_preference VARCHAR(50),
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table creation success
} else {
  echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Collect value of input field
  $user_id = $_POST['user_id']; // Assuming a session or similar mechanism provides user_id
  $favorite_color = $_POST['favorite_color'];
  $size_preference = $_POST['size_preference'];
  $style_preference = $_POST['style_preference'];

  // SQL to insert new profile preferences
  $sql = "INSERT INTO profile_preferences (user_id, favorite_color, size_preference, style_preference)
  VALUES ('$user_id', '$favorite_color', '$size_preference', '$style_preference')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
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
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Profile Setup</title>
<style>
  body { font-family: Arial, sans-serif; background-color: #F2F4F3; color: #333;}
  .container { max-width: 600px; margin: 0 auto; padding: 20px; background-color: #FFFFFF; border-radius: 8px; }
  form { display: flex; flex-direction: column; }
  label { margin-bottom: 0.5em; color: #333; }
  input, select { font-size: 16px; padding: 8px; margin-bottom: 1em; border-radius: 4px; border: 1px solid #CCC; }
  button { font-size: 16px; padding: 10px 20px; color: #FFF; background-color: #5D647B; border: none; border-radius: 4px; cursor: pointer; }
  button:hover { background-color: #3C4251; }
</style>
</head>
<body>

<div class="container">
  <h2>Customize Your Profile</h2>
  <form action="" method="post">
    <label for="user_id">User ID:</label>
In real application, User ID should be fetched automatically from session or user context
    <input type="text" id="user_id" name="user_id" required>
    
    <label for="favorite_color">Favorite Color:</label>
    <select id="favorite_color" name="favorite_color">
      <option value="Blue">Blue</option>
      <option value="Red">Red</option>
      <option value="Green">Green</option>
      <option value="Yellow">Yellow</option>
    </select>
    
    <label for="size_preference">Size Preference:</label>
    <select id="size_preference" name="size_preference">
      <option value="Small">Small</option>
      <option value="Medium">Medium</option>
      <option value="Large">Large</option>
    </select>
    
    <label for="style_preference">Style Preference (optional):</label>
    <input type="text" id="style_preference" name="style_preference"> 
    
    <button type="submit">Submit</button>
  </form>
</div>

</body>
</html>
