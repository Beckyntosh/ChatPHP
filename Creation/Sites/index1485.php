<?php
// Connection parameters
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Check for post data
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect post data
    $clientName = $_POST['clientName'];
    $clientEmail = $_POST['clientEmail'];
    $clientPhone = $_POST['clientPhone'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // sql to create table if not exists
    $sql = "CREATE TABLE IF NOT EXISTS clients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    phone VARCHAR(20),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if ($conn->query($sql) === TRUE) {
        // Table created successfully or already exists
    } else {
        echo "Error creating table: " . $conn->error;
    }

    // Prepare statement
    $stmt = $conn->prepare("INSERT INTO clients (name, email, phone) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $clientName, $clientEmail, $clientPhone);

    // Execute statement
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connections
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Client to CRM</title>
</head>
<body>

<h2>Add a New Client</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Client Name: <input type="text" name="clientName" required><br>
  Client Email: <input type="email" name="clientEmail" required><br>
  Client Phone: <input type="tel" name="clientPhone" required><br>
  <input type="submit" value="Add Client">
</form>

</body>
</html>
