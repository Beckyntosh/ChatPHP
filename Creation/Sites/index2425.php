<?php

// Connecting to MySQL database
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

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Escape user inputs for security
    $username = mysqli_real_escape_string($conn, $_REQUEST['username']);
    $password = mysqli_real_escape_string($conn, $_REQUEST['password']);
    $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
    $preferences = mysqli_real_escape_string($conn, implode(',', $_REQUEST['preferences']));

    // attempt insert query execution
    $sql = "INSERT INTO users (username, password, email, preferences) VALUES ('$username', '". md5($password) ."', '$email', '$preferences')";

    if (mysqli_query($conn, $sql)) {
        echo "Records added successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
}

// Close connection
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up - Gardening Tools News Feed</title>
</head>
<body>
    
    <form action="" method="post">
        <p>Username: <input type="text" name="username" required></p>
        <p>Password: <input type="password" name="password" required></p>
        <p>Email: <input type="email" name="email" required></p>
        <p>Preferences: 
            <select name="preferences[]" multiple required>
                <option value="gardening_tips">Gardening Tips</option>
                <option value="new_tools">New Tools</option>
                <option value="plant_care">Plant Care</option>
            </select>
        </p>
        <input type="submit" value="Submit">
    </form>

</body>
</html>

<?php

// Creating database and tables if don't exist
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Creating database if not exists
$sql = "CREATE DATABASE IF NOT EXISTS my_database";
if ($conn->query($sql) === TRUE) {
    // Selecting the database
    $conn->select_db($dbname);

    // SQL to create table
    $sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(40) NOT NULL,
    email VARCHAR(50),
    preferences VARCHAR(100),
    reg_date TIMESTAMP
    )";

    if ($conn->query($sql) === TRUE) {
        // Table created successfully
    } else {
        echo "Error creating table: " . $conn->error;
    }

} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();
?>
