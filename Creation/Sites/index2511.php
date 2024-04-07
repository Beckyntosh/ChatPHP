<?php

// Database connection
$dbUsername = "root";
$dbPassword = "root";
$dbName = "my_database";
$dbServername = "db";

$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table for languages if it does not exist
$createLanguagesTable = "CREATE TABLE IF NOT EXISTS Languages (
id INT AUTO_INCREMENT PRIMARY KEY,
language_name VARCHAR(50) NOT NULL
)";

if (!$conn->query($createLanguagesTable)) {
    echo "Error creating table: " . $conn->error;
}

// Insert some language options (do it once)
$insertLanguages = "INSERT INTO Languages (language_name) VALUES 
('English'), 
('French'), 
('Spanish')
ON DUPLICATE KEY UPDATE language_name=language_name;";
    
$conn->query($insertLanguages);

// Create table for Users if it does not exist
$createUsersTable = "CREATE TABLE IF NOT EXISTS Users (
id INT AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(50) NOT NULL,
email VARCHAR(50) NOT NULL,
language_id INT,
FOREIGN KEY(language_id) REFERENCES Languages(id)
)";

if (!$conn->query($createUsersTable)) {
    echo "Error creating table: " . $conn->error;
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $language_id = $_POST['language'];

    $stmt = $conn->prepare("INSERT INTO Users (username, email, language_id) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $username, $email, $language_id);
    if ($stmt->execute()) {
        echo "Signup successful!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup with Language Preference</title>
    <style>
        body { font-family: Arial, sans-serif; }
        form { max-width: 300px; margin: 20px auto; }
        input, select { width: 100%; padding: 8px; margin: 8px 0; }
        button { width: 100%; padding: 8px; }
    </style>
</head>
<body>
    <h2>Signup Form</h2>
    <form action="" method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <select name="language" required>
            <option value="">Select Language...</option>
            <?php
            $sql = "SELECT id, language_name FROM Languages";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='".$row["id"]."'>".$row["language_name"]."</option>";
                }
            }
            ?>
        </select>
        <button type="submit">Signup</button>
    </form>
</body>
</html>

<?php
$conn->close();
?>
