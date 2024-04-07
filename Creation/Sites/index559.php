<html>
<head>
<title>Sporting Goods Video Sharing : User Profile Management</title>
<style>
body, div, h1, form, input, p { padding: 0; margin: 0; outline: none; }
body { background: #fafafa; }
h1 { font-size: 22px; color: #121212; text-align:center; margin-top: 25px;}
.container { margin: 25px auto; width: 300px; text-align: center; }
</style>
</head>
<body>
<div class="container">
<h1>User Profile Management</h1>
<form method="post" action="profile.php">
<p><input type="text" name="username" value="" placeholder="Username"></p>
<p><input type="text" name="email" value="" placeholder="Email"></p>
<p><input type="password" name="password" value="" placeholder="Password"></p>
<p class="submit"><input type="submit" name="commit" value="Submit"></p>
</form>
</div>
</body>
</html>

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

if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
   $username = $_POST['username'];
   $email = $_POST['email'];
   $password = $_POST['password'];

   // sql to insert a record
   $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

   if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
   } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
   }
}

$conn->close();
?>