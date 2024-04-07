
This is purely for educational and illustrative purposes. 


<?php
// This is a simplified example. Do not use in production without significant modifications.

// Assuming you've set up a Google API Console project and obtained an OAuth 2.0 Client ID and Client Secret

session_start();

$dbServername = "db";
$dbUsername = "root";
$dbPassword = "root";
$dbName = "my_database";

// Create connection
$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Adding user table if not exists (simplified schema)
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    google_id VARCHAR(255) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
)";
if ($conn->query($sql) === TRUE) {
    echo "Table users created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Frontend (Basic and simplified for illustration)
?>
<html>
<head>
    <title>Skateboard Website Signup</title>
</head>
<body>
    <h1>Register with Google</h1>
    <a href="YOUR_GOOGLE_AUTH_LINK_HERE">Sign up with Google</a>
</body>
</html>

<?php
// Process the authentication callback (simplified!)

if (isset($_GET['code'])) {
    // Imagine this is where you'd handle the OAuth flow,
    // exchange `code` for an access token, and get user info from Google.
    // This part is significantly simplified and not functional as real code.

    $google_id = "fake_google_id"; // Placeholder - you'd get this from Google
    $email = "user@example.com"; // Placeholder - you'd get this from Google

    // Check if google_id is already in the database
    $query = "SELECT * FROM users WHERE google_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $google_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 0) {
        // New user
        $insert_query = "INSERT INTO users (google_id, email) VALUES (?, ?)";
        $insert_stmt = $conn->prepare($insert_query);
        $insert_stmt->bind_param("ss", $google_id, $email);
        $insert_stmt->execute();
        
        if ($insert_stmt->affected_rows == 1) {
            echo 'User registered/signed-in successfully.';
        } else {
            echo 'Error during registration/sign-in.';
        }
    } else {
        echo 'User already exists, sign-in successful.';
    }
}

// Close connection
$conn->close();

?>

In the real world, you'll need to handle far more than this, including securing your application, correctly handling OAuth tokens, storing credentials securely, ensuring your user's data is protected, and complying with the OAuth provider's requirements and guidelines. Seek comprehensive guides or consulting to implement social media logins securely and efficiently.