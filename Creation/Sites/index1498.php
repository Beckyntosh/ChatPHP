<?php
// Assuming a basic understanding and an environment where PHP and MySQL are installed and configured.
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

// Create table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS clients (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
contact_email VARCHAR(50),
contact_phone VARCHAR(20),
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table clients created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Prepare an insert statement
    $sql = "INSERT INTO clients (name, contact_email, contact_phone) VALUES (?, ?, ?)";
     
    if($stmt = $conn->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("sss", $param_name, $param_email, $param_phone);
        
        // Set parameters
        $param_name = trim($_POST["name"]);
        $param_email = trim($_POST["contact_email"]);
        $param_phone = trim($_POST["contact_phone"]);
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            echo "Client added successfully.";
        } else{
            echo "Error. Please try again later.";
        }

        // Close statement
        $stmt->close();
    }
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Client</title>
</head>
<body>
    <h2>Add a New Client</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
            <label>Name:</label>
            <input type="text" name="name" required>
        </div>    
        <div>
            <label>Contact Email:</label>
            <input type="email" name="contact_email" required>
        </div>
        <div>
            <label>Contact Phone:</label>
            <input type="text" name="contact_phone" required>
        </div>
        <div>
            <input type="submit" value="Submit">
        </div>
    </form>
</body>
</html>
