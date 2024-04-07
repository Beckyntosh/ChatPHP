<?php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect post data
    $clientName = $_POST['clientName'];
    $contactEmail = $_POST['contactEmail'];
    $contactNumber = $_POST['contactNumber'];

    // Database configuration
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

    // SQL to create table if not exists
    $sql = "CREATE TABLE IF NOT EXISTS Clients (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        clientName VARCHAR(30) NOT NULL,
        contactEmail VARCHAR(50),
        contactNumber VARCHAR(15),
        reg_date TIMESTAMP
    )";

    if ($conn->query($sql) === TRUE) {
        // Table created successfully or already exists
        // Insert new client
        $stmt = $conn->prepare("INSERT INTO Clients (clientName, contactEmail, contactNumber) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $clientName, $contactEmail, $contactNumber);

        if ($stmt->execute()) {
            echo "New client added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $stmt->close();
    } else {
        echo "Error creating table: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Client to CRM</title>
</head>
<body>

<h2>Add Client Form</h2>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <label for="clientName">Client Name:</label><br>
  <input type="text" id="clientName" name="clientName" required><br>
  <label for="contactEmail">Contact Email:</label><br>
  <input type="email" id="contactEmail" name="contactEmail" required><br>
  <label for="contactNumber">Contact Number:</label><br>
  <input type="text" id="contactNumber" name="contactNumber" required><br>
  <input type="submit" value="Submit">
</form> 

</body>
</html>
