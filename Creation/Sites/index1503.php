<?php

// Set up database credentials
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Creating table if it doesn't exist
$createTable = "
CREATE TABLE IF NOT EXISTS clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    contact_details TEXT NOT NULL,
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
";

if(!$conn->query($createTable)){
    die("ERROR: Could not create table. " . mysqli_error($conn));
}

$name = $contact_details = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate and assign input data
    $name = trim($_POST["name"]);
    $contact_details = trim($_POST["contact_details"]);

    // Prepare an insert statement
    $sql = "INSERT INTO clients (name, contact_details) VALUES (?, ?)";
    
    if($stmt = $conn->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("ss", $param_name, $param_contact_details);

        // Set parameters
        $param_name = $name;
        $param_contact_details = $contact_details;
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            echo "Client added successfully.";
        } else{
            echo "ERROR: Could not execute query: $sql. " . mysqli_error($conn);
        }
        
        // Close statement
        $stmt->close();
    }
  
    // Close connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add a New Client</title>
</head>
<body>
    <h2>Add a new client to the CRM</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
            <label>Name:</label>
            <input type="text" name="name" required>
        </div>
        <div>
            <label>Contact Details:</label>
            <textarea name="contact_details" required></textarea>
        </div>
        <div>
            <input type="submit" value="Submit">
        </div>
    </form>
</body>
</html>
