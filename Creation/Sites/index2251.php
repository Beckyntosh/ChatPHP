<?php
// Define server connection parameters
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table for subscriptions if it does not exist
$tableCreationQuery = "CREATE TABLE IF NOT EXISTS wine_subscribers (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
email VARCHAR(50) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($tableCreationQuery)) {
    echo "Error creating table: " . $conn->error;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    
    // Prepare statement to insert data into the table
    $stmt = $conn->prepare("INSERT INTO wine_subscribers (email) VALUES (?)");
    $stmt->bind_param("s", $email);
    
    // Execute the prepared statement
    if ($stmt->execute()) {
        echo "Thank you for signing up for product updates!";
    } else {
        echo "Error: " . $stmt . "<br>" . $conn->error;
    }
    
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up for Wine Updates</title>
</head>
<body>
    <h2>Sign Up to Receive Notifications About New Wine Releases</h2>
    <form action="" method="post">
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" required><br>
        <input type="submit" value="Subscribe">
    </form>
</body>
</html>
