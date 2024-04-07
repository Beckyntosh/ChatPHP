<?php
$host = "db";
$username = "root";
$password = "root";
$database = "my_database";
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "CREATE TABLE IF NOT EXISTS users(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    username VARCHAR(50),
    password VARCHAR(100)
)";

if ($conn->query($query) === TRUE) {
    echo "Table users created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

if(isset($_POST['register'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $query = "INSERT INTO users (firstname, lastname, email, username, password) VALUES ('$firstname', '$lastname', '$email', '$username', '$password')";
    $conn->query($query);
}

$conn->close();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Makeup Webshop - Create Profile</title>
    <style>
        body { background-color: red; color: white; }
    </style>
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Firstname: <input type="text" name="firstname"><br>
        Lastname: <input type="text" name="lastname"><br>
        Email: <input type="text" name="email"><br>
        Username: <input type="text" name="username"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" name="register" value="Create Profile">
    </form>
</body>
</html>
