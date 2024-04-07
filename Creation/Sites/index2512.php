<?php
// Define server info
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

// Create table for user data if it doesn't exist
$userTableSql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
preferred_language VARCHAR(5) NOT NULL,
reg_date TIMESTAMP
)";

if (!$conn->query($userTableSql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $preferred_language = $_POST['preferred_language'];

    $stmt = $conn->prepare("INSERT INTO users (username, preferred_language) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $preferred_language);

    // execute and redirect to welcome page
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup Form</title>
</head>
<body>
    <h2>Signup Form</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Username:<br>
        <input type="text" name="username" required>
        <br>
        Preferred Language:<br>
        <select name="preferred_language" required>
            <option value="en">English</option>
            <option value="fr">French</option>
            <option value="de">German</option>
            <option value="es">Spanish</option>
        </select>
        <br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
