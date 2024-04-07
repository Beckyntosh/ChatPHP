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

// SQL query to check if the table already exists and creates it if not
$sql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Users created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// HTML form to create a profile
?>
<!DOCTYPE html>
<html>
<head>
    <title>Create Profile</title>

Simple Valentine themed style
    <style>
        body {
        background-color: lightpink;
        }
        h1, h2 {
        color: red;
        }
        input[type=submit] {
        background-color: red;
        color: white;
        font-weight: bold;
        }
    </style>
</head>
<body>
<h1>Makeup Webshop</h1>
<h2>Create Profile</h2>

Create Profile form
<form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
    <input type="text" name="firstname" placeholder="First Name" required><br>
    <input type="text" name="lastname" placeholder="Last Name" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="submit" name="submit" value="Create Profile">
</form>
<?php

// Capture form input and insert into database
if ($_POST['submit']){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];

    $sql = "INSERT INTO users (firstname, lastname, email)
    VALUES ('$firstname', '$lastname', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Profile created successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>

</body>
</html>