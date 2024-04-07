<?php
// Simple PHP & MySQL integration script for adding a client to a CRM system for an Art Supplies website.

// Define MySQL connection parameters
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Attempt MySQL server connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Automatically create the necessary table if it does not exist
$tableCreationQuery = "CREATE TABLE IF NOT EXISTS clients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    clientName VARCHAR(50) NOT NULL,
    contactDetails TEXT NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($tableCreationQuery)) {
    die("Error creating table: " . $conn->error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $clientName = $_POST['clientName'];
    $contactDetails = $_POST['contactDetails'];

    // Insert new client into the database
    $stmt = $conn->prepare("INSERT INTO clients (clientName, contactDetails) VALUES (?, ?)");
    $stmt->bind_param("ss", $clientName, $contactDetails);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add a Client to CRM System</title>
</head>
<body>

<h2>Add a New Client</h2>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="clientName">Client Name:</label><br>
    <input type="text" id="clientName" name="clientName" required><br>
    <label for="contactDetails">Contact Details:</label><br>
    <textarea id="contactDetails" name="contactDetails" rows="4" required></textarea><br>
    <input type="submit" value="Submit">
</form>

</body>
</html>
