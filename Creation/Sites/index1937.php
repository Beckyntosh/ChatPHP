<?php
// Simple Code Review System for Prescription Medications Website

// Database Credentials
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root'); 
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . $conn->connect_error);
}

// Function to create necessary tables if they don't exist
function createTables($conn) {
    $sql = "CREATE TABLE IF NOT EXISTS code_reviews (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        code TEXT NOT NULL,
        status ENUM('submitted', 'reviewed') DEFAULT 'submitted',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    
    if (!$conn->query($sql)) {
        die("ERROR: Could not create table " . $conn->error);
    }
}

// Call function to create tables
createTables($conn);

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $code = $conn->real_escape_string(file_get_contents($_FILES['sourceCode']['tmp_name']));
    
    $sql = "INSERT INTO code_reviews (title, code) VALUES ('$title', '$code')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Review Upload</title>
</head>
<body>
    <h1>Upload Source Code for Review</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <div>
            <label for="title">Feature Title:</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div>
            <label for="sourceCode">Source Code:</label>
            <input type="file" id="sourceCode" name="sourceCode" accept=".php,.html,.js" required>
        </div>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
<?php
$conn->close();
?>
