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

// Create tables if not exists
$usersTable = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
reg_date TIMESTAMP
)";

$preferencesTable = "CREATE TABLE IF NOT EXISTS preferences (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
category VARCHAR(50),
FOREIGN KEY (user_id) REFERENCES users(id)
)";

if ($conn->query($usersTable) === TRUE && $conn->query($preferencesTable) === TRUE) {
  // echo "Table Users and Preferences created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $email = $_POST["email"];
  $password = md5($_POST["password"]); // Simple hash for the example
  $categories = $_POST["categories"]; // Array

  $insertUser = "INSERT INTO users (firstname, lastname, email, password) VALUES ('$firstname', '$lastname', '$email', '$password')";
  
  if ($conn->query($insertUser) === TRUE) {
    $last_id = $conn->insert_id;
    foreach ($categories as $category) {
      $insertPreference = "INSERT INTO preferences (user_id, category) VALUES ('$last_id', '$category')";
      $conn->query($insertPreference);
    }
    echo "<p>Registration successful. Customize your news feed!</p>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Registration Form for Customizable News Feed</title>
</head>
<body>
  <h2>User Registration</h2>
  <form method="post" action="">
    <label for="firstname">First Name:</label><br>
    <input type="text" id="firstname" name="firstname" required><br>
    <label for="lastname">Last Name:</label><br>
    <input type="text" id="lastname" name="lastname" required><br>
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required><br>
    <fieldset>
      <legend>Select your news feed preferences:</legend>
      <input type="checkbox" id="sports" name="categories[]" value="Sports">
      <label for="sports">Sports</label><br>
      <input type="checkbox" id="fashion" name="categories[]" value="Fashion">
      <label for="fashion">Fashion</label><br>
      <input type="checkbox" id="technology" name="categories[]" value="Technology">
      <label for="technology">Technology</label><br>
    </fieldset>
    <input type="submit" value="Register">
  </form>
</body>
</html>