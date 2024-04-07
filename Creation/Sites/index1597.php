

<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Connect to the MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS artworks (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    artist_name VARCHAR(255) NOT NULL,
    artwork_title VARCHAR(255) NOT NULL,
    description TEXT,
    creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $artist_name = $_POST['artist_name'];
    $artwork_title = $_POST['artwork_title'];
    $description = $_POST['description'];

    $sql = "INSERT INTO artworks (artist_name, artwork_title, description)
    VALUES ('$artist_name', '$artwork_title', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Online Art Gallery Entry</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>

<h2>Upload Artwork</h2>

<form method="post">
    Artist Name:<br>
    <input type="text" name="artist_name" required><br>
    Artwork Title:<br>
    <input type="text" name="artwork_title" required><br>
    Description:<br>
    <textarea name="description" required></textarea><br>
    <input type="submit" value="Submit">
</form>

</body>
</html>

**Important Security and Design Considerations:**
- The direct use of user input in SQL queries can lead to SQL injection vulnerabilities. Use prepared statements instead.
- Passwords, especially for databases, should not be hard-coded. Consider using environment variables or secure configuration files.
- The application lacks CSRF protection, which is essential for form submissions.
- Proper input validation and sanitation are missing, posing risks of XSS and other security vulnerabilities.
- This basic example does not implement any file upload functionality for artworks, which would involve considerations for file validation, storage, and securely serving files to users.
- For real applications, especially those handling user data or content uploads, implementing a comprehensive security strategy is essential.