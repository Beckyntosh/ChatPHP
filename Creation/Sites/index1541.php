

<?php
// Simple script to handle form submission and display vocabulary list
// WARNING: This script does not implement security best practices.

// Database credentials
$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if it doesn't exist
$table = "CREATE TABLE IF NOT EXISTS vocabulary (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
spanish VARCHAR(30) NOT NULL,
english VARCHAR(30) NOT NULL
)";

if (!$conn->query($table)) {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $spanish = $_POST['spanish'];
    $english = $_POST['english'];

    $sql = "INSERT INTO vocabulary (spanish, english) VALUES ('$spanish', '$english')";
    if ($conn->query($sql) !== TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Spanish for Beginners</title>
</head>
<body>
    <h1>Add New Vocabulary</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <label for="spanish">Spanish:</label><br>
        <input type="text" id="spanish" name="spanish" required><br>
        <label for="english">English:</label><br>
        <input type="text" id="english" name="english" required><br><br>
        <input type="submit" value="Submit">
    </form>
    
    <h2>Vocabulary List</h2>
    <ul>
    <?php
    $sql = "SELECT spanish, english FROM vocabulary";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<li>" . htmlspecialchars($row["spanish"]) . " - " . htmlspecialchars($row["english"]) . "</li>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
    </ul>
</body>
</html>

For a real-world application:

- Do not insert form data directly into a SQL query. Use prepared statements to prevent SQL injection.
- Error handling: Implement more robust error handling for both the database connection and operations.
- Implement user authentication and authorization to control access to adding and viewing vocabulary.
- Consider using a PHP framework (Laravel, Symfony, etc.) which provides structure and security measures.
- To improve the design, separate the PHP logic from the HTML output, ideally using a templating engine or an MVC approach.
- Always validate and sanitize user input, both on the client and server sides.
- Implement secure password handling if you introduce user accounts, using password hashing functions like `password_hash()` and `password_verify()`.