<?php
// Database connection
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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(100) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    //echo "Table users created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST["username"]);
    $password = password_hash(htmlspecialchars($_POST["password"]), PASSWORD_DEFAULT);
    $email = htmlspecialchars($_POST["email"]);

    $sql = "INSERT INTO users (username, password, email)
    VALUES ('$username', '$password', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Registration successful! Welcome, $username.</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup for Premium File Storage</title>
    <style>
        body { font-family: "Courier New", Courier, monospace; }
        form { max-width: 300px; margin: 0 auto; }
        input[type=text], input[type=password], input[type=email] { width: 100%; padding: 10px; margin: 5px 0; }
        input[type=submit] { width: 100%; padding: 10px; background-color: black; color: white; border: none; cursor: pointer; }
        input[type=submit]:hover { background-color: #333; }
    </style>
</head>
<body>

<h2>Signup Form</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username" required><br>

    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email"><br>

    <input type="submit" value="Submit">
</form>

</body>
</html>
