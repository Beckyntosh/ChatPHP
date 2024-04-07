<?php
$servername = "db";
$username = "root";
$password = "root";
$dbName = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS Users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
role VARCHAR(10)
)";

$conn->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS Products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
productname VARCHAR(50), 
description TEXT, 
price DECIMAL(8,2)
)";

$conn->query($sql);

//define a basic User class
class User {
    private $username ="";
    private $password ="";
    private $role ="";

    public function __construct($username, $password, $role){
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;
    }

    //insert user into the database
    public function insertIntoDB($conn){
        $sql = "INSERT INTO Users (username, password, role) VALUES ('$this->username', '$this->password', '$this->role')";
        $conn->query($sql);
    }
}

?>
<!DOCTYPE html> 
<html>
<head>
<title>Nautical Navigator Home Decor</title>
<style>
body{
    background: #e0f0ff;
    color: #006080;
}
</style>
</head>
<body>
  <h1>Nautical Navigator Home Decor</h1>
  <h2>Role Management</h2>
  <form action="" method="POST">
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username" ><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password"><br>
    <label for="role">Role:</label><br>
    <input type="text" id="role" name="role" ><br>
    <input type="submit" name="submit" value="Submit">
  </form>
</body>
</html>

<?php
//when form is submitted, create a new user and insert into the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"];
    $user = new User($username, $password, $role);
    $user->insertIntoDB($conn);
    echo "User created successfully!";
}
?>