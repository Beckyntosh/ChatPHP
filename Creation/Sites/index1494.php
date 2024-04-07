<?php
// Initialize the database connection
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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Collect post data
  $clientName = $_POST['clientName'];
  $contactDetails = $_POST['contactDetails'];

  // Prepare an insert statement
  $sql = "INSERT INTO clients (name, contact_details) VALUES (?, ?)";

  if ($stmt = $conn->prepare($sql)) {
    // Bind variables to the prepared statement as parameters
    $stmt->bind_param("ss", $clientName, $contactDetails);
    
    // Attempt to execute the prepared statement
    if ($stmt->execute()) {
      echo "Client added successfully.";
    } else {
      echo "Error: " . $stmt->error;
    }
    
    // Close statement
    $stmt->close();
  }
}

// Create clients table if it doesn't exist
$tableCreationQuery = "CREATE TABLE IF NOT EXISTS clients (
                          id INT AUTO_INCREMENT PRIMARY KEY,
                          name VARCHAR(255) NOT NULL,
                          contact_details TEXT NOT NULL,
                          reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                      )";

if (!$conn->query($tableCreationQuery)) {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add a Client to CRM</title>
</head>
<body>
    <h2>Add a New Client</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="clientName">Client Name:</label><br>
        <input type="text" id="clientName" name="clientName" required><br>
        <label for="contactDetails">Contact Details:</label><br>
        <textarea id="contactDetails" name="contactDetails" required></textarea><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
