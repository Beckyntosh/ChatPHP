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

if(isset($_POST['username']) && isset($_POST['password'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  
  $sql = "SELECT id FROM users WHERE username = '$username' AND password = '$password'";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
    echo "Login successful!";
    //Start your session here
  } else {
    echo "Invalid login!";
  }
}

$conn->close();
?>

<html>
<body style="color: navy; background-color: lightblue;">
<h2>Nautical Navigator Themed Travel Online Comic and Graphic Novel Library Login</h2>
<form action="" method="POST">
  <label for="username">Username:</label><br>
  <input type="text" id="username" name="username"><br>
  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password">
  <input type="submit" value="Submit">
</form>
</body>
</html>