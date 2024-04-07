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

// Check if form is submitted
if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    
    // Insert user into database
    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
    
    if ($conn->query($sql) === TRUE) {
        echo "User created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Skateboards Digital Marketing Services</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #C5E1A5;
        }
    </style>
</head>
<body>
    <h2>Membership Registration</h2>
    <form method="post" action="">
        <input type="text" name="name" required placeholder="Name"><br>
        <input type="text" name="email" required placeholder="Email"><br>
        <input type="password" name="password" required placeholder="Password"><br>
        <input type="submit" name="submit" value="Register">
    </form>
</body>
</html>

<?php
// Close connection
$conn->close();
?>