<?php
// Check if form is submitted
if($_SERVER['REQUEST_METHOD'] == 'POST') {
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

    // sanitize user input
    $email = $conn->real_escape_string($_POST['email']);
    $name = $conn->real_escape_string($_POST['name']);
    $today = date("Y-m-d");
    $expire_date = date('Y-m-d', strtotime("+1 month", strtotime($today)));

    // Sql query to insert user data into table
    $sql = "INSERT INTO users (email, full_name, trial_start, trial_end)
            VALUES ('$email', '$name', '$today', '$expire_date')";

    if($conn->query($sql) === TRUE) {
        echo "<p>You're all set! Enjoy your 1-month free trial.</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Signup for a Free Trial</title>
<style>
    body { font-family: Arial, sans-serif; }
    .container { max-width: 600px; margin: 20px auto; padding: 20px; }
    input[type="text"], input[type="email"] { width: 100%; padding: 10px; margin: 10px 0; }
    input[type="submit"] { background-color: #4CAF50; color: white; padding: 10px 20px; border: none; cursor: pointer; }
    input[type="submit"]:hover { background-color: #45a049; }
</style>
</head>
<body>

<div class="container">
    <h2>Sign Up for Your Free Trial</h2>
    <form action="" method="post">
        <label for="name">Full Name:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <input type="submit" value="Start Free Trial">
    </form>
</div>

</body>
</html>
<?php
// Creating tables and database if not exist
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if not exists
$sql = "CREATE DATABASE IF NOT EXISTS my_database";
if ($conn->query($sql) === TRUE) {
    $conn->select_db($dbname);
    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    full_name VARCHAR(50) NOT NULL,
    trial_start DATE NOT NULL,
    trial_end DATE NOT NULL,
    UNIQUE (email)
    )";

    if ($conn->query($sql) === FALSE) {
        echo "Error creating table: " . $conn->error;
    }
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();
?>
