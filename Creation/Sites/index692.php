<?php

$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
$new_password = $_POST['new_password'];
$id = $_POST['id']; 

$sql = "UPDATE users SET password='$new_password' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
  echo "Password changed successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
}
?>
<html>
<head>
<title>Change Password</title>
<style>
body {
background-color: pink;
color: red;
font-family: Arial, Helvetica, sans-serif;
}

h1 {
text-align: center;
}

.container {
width: 300px;
padding: 16px;
background-color: white;
margin: 0 auto;
margin-top: 100px;
border: 1px solid black;
border-radius: 4px;
}
</style>
</head>
<body>

<div class="container">
<h1>Change Password</h1>
<form action="" method="post">
<input type="hidden" id="id" name="id">
<label for="new_password">New Password:</label><br>
<input type="password" id="new_password" name="new_password"><br><br>
<input type="submit" value="Submit">
</form>
</div>

</body>
</html>