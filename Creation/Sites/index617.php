<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM users WHERE username='".$username."' AND password='".md5($password)."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "Login Successful";
    } else {
        echo "Invalid Credentials";
    }
}

$conn->close();

?>

<!DOCTYPE html>
<html>
<head>
<style>
body {background-color: pink;}
</style>
</head>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <label for="username">Username:</label><br>
  <input type="text" id="username" name="username"><br>
  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password"><br>
  <input type="submit" value="Submit">
</form>

</body>
</html>