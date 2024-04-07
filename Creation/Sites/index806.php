<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['follow'])){
    
    $user_id = $_POST['user_id'];
    $follower_id = $_POST['follower_id'];

    $sql = "INSERT INTO `users` (user_id, follower_id) VALUES ('$user_id', '$follower_id')";

    if ($conn->query($sql) === TRUE) {
    echo "You are now following this user!";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<style>
body {background-color: #FF6060; color: white; font-family: Arial, sans-serif;}
form {margin: 50px auto; width: 300px; text-align: center;}
input[type=submit] {background-color: #FFC1C1; color: black; padding: 14px 20px; border: none; cursor: pointer; width: 100%;}
</style>
</head>
<body>
<form method="post" action="">
  <label for="user_id">Your User ID:</label><br>
  <input type="text" id="user_id" name="user_id"><br>
  <label for="follower_id">User ID to follow:</label><br>
  <input type="text" id="follower_id" name="follower_id"><br>
  <input type="submit" value="Follow" name="follow">
</form>
</body>
</html>