<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($_POST) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "You've successfully logged in.";
    } else {
        echo "Login failed.";
    }
}
$conn->close();

echo '<!DOCTYPE html><html>';
echo '<head><style> body {background-color: red;} </style></head>';
echo '<body>';
echo '<form method="post">';
echo 'Username:<br>';
echo '<input type="text" name="username"><br>';
echo 'Password:<br>';
echo '<input type="password" name="password"><br><br>';
echo '<input type="submit" value="Login">';
echo '</form>';
echo '</body></html>';
?>