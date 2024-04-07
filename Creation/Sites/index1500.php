<?php
// Simple script to add a client to a CRM system for a Bicycles website
// DISCLAIMER: This is a basic example, for real applications consider security practices like prepared statements, validation, and sanitization

// Database credentials
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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $clientName = $_POST['clientName'];
    $contactName = $_POST['contactName'];
    $contactEmail = $_POST['contactEmail'];
    $contactPhone = $_POST['contactPhone'];

    $sql = "INSERT INTO clients (clientName, contactName, contactEmail, contactPhone) VALUES ('$clientName', '$contactName', '$contactEmail', '$contactPhone')";

    if ($conn->query($sql) === TRUE) {
        echo "New client added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New Client</title>
</head>
<body>

<h2>Add Client to CRM</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Client Name: <input type="text" name="clientName" required><br>
  Contact Name: <input type="text" name="contactName" required><br>
  Contact Email: <input type="email" name="contactEmail" required><br>
  Contact Phone: <input type="text" name="contactPhone" required><br>
  <input type="submit" value="Submit">
</form>

</body>
</html>

**Note:** Before using this script, ensure to have a table named `clients` created in your MySQL database named `my_database` with at least the following columns: `clientName`, `contactName`, `contactEmail`,`contactPhone`. Also, this script uses root access to the database without placeholders and does not incorporate contemporary best practices for secure and efficient database interaction, like prepared statements.