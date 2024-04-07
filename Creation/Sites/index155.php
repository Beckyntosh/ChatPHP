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

// Table creation
$clientTable = "CREATE TABLE IF NOT EXISTS clients (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
name VARCHAR(30) NOT NULL,
email VARCHAR(50),
contact_number VARCHAR(15),
register_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$interactionLogTable = "CREATE TABLE IF NOT EXISTS interaction_logs (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
client_id INT(6) UNSIGNED,
interaction_detail TEXT,
interaction_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
FOREIGN KEY (client_id) REFERENCES clients(id)
)";

if ($conn->query($clientTable) === TRUE && $conn->query($interactionLogTable) === TRUE) {
  // Tables created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $contact_number = $_POST["contact_number"];

    // Insert client
    $stmt = $conn->prepare("INSERT INTO clients (name, email, contact_number) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $contact_number);
    $stmt->execute();
    $last_id = $stmt->insert_id;
    $stmt->close();

    // Assuming interaction detail comes from the form as well
    $interaction_detail = $_POST["interaction_detail"];
    // Insert interaction log
    $stmt = $conn->prepare("INSERT INTO interaction_logs (client_id, interaction_detail) VALUES (?, ?)");
    $stmt->bind_param("is", $last_id, $interaction_detail);
    $stmt->execute();
    $stmt->close();
    
    echo "New client added successfully.";
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
    <h2>Add Client</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="contact_number">Contact Number:</label>
        <input type="text" id="contact_number" name="contact_number" required><br><br>

        <label for="interaction_detail">Interaction Detail:</label>
        <textarea id="interaction_detail" name="interaction_detail" required></textarea><br><br>

        <input type="submit" value="Add Client">
    </form>
</body>
</html>