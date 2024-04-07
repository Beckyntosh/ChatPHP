<?php

$MYSQL_ROOT_PSWD = 'root';
$MYSQL_DB = 'my_database';
$servername = 'db';

// Create connection
$conn = new mysqli($servername, 'root', $MYSQL_ROOT_PSWD, $MYSQL_DB);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table for language selection if it does not exist
$tableSql = "CREATE TABLE IF NOT EXISTS users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(30) NOT NULL,
  language VARCHAR(10) NOT NULL,
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($tableSql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle post request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $language = $_POST['language'];

  $stmt = $conn->prepare("INSERT INTO users (username, language) VALUES (?, ?)");
  $stmt->bind_param("ss", $username, $language);

  if ($stmt->execute()) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $stmt->error;
  }

  $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Language Preference Selection</title>
  <style>
    body { font-family: Arial, sans-serif; }
    .container { max-width: 600px; margin: 20px auto; padding: 20px; }
    label, select, input[type=text], button { display: block; width: 100%; margin-bottom: 10px; }
  </style>
</head>
<body>

<div class="container">
  <h2>Select Your Language Preference</h2>
  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>

    <label for="language">Preferred Language:</label>
    <select id="language" name="language" required>
      <option value="English">English</option>
      <option value="Spanish">Spanish</option>
      <option value="French">French</option>
      <option value="German">German</option>
Add more languages as needed
    </select>
    
    <button type="submit">Submit</button>
  </form>
</div>

</body>
</html>