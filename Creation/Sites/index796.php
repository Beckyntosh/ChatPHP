<!DOCTYPE html>
<html>
<head>
    <style>
        body { background-color: #FFB6C1; color: #5F9EA0; font-family: 'Arial', sans-serif; } /* Easter Themed Styles */
    </style>
</head>
<body>
<?php
$server = "db";
$database = "my_database";
$username = "root";
$password = "root";

// Create connection
$conn = new mysqli($server, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "Welcome ". $row["name"];
        }
    } 
    else {
        echo "Invalid login details";
    }
}
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Username: <input type="text" name="username" required>
  <br><br>
  Password: <input type="password" name="password" required>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

</body>
</html>