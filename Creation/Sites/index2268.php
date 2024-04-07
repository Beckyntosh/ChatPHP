<?php
// Initialize variables to connect to the database
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if they don't exist
$sql = "CREATE TABLE IF NOT EXISTS Users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    // Table created successfully
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS UserPreferences (
    userId INT(6) UNSIGNED,
    favoriteGenre VARCHAR(50),
    favoriteDecade VARCHAR(50),
    newsletterSubscription BOOLEAN,
    FOREIGN KEY (userId) REFERENCES Users(id)
)";

if ($conn->query($sql) === TRUE) {
    // Table created successfully
} else {
    echo "Error creating table: " . $conn->error;
}

// Process the form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $favoriteGenre = htmlspecialchars($_POST['favoriteGenre']);
    $favoriteDecade = htmlspecialchars($_POST['favoriteDecade']);
    $newsletterSubscription = isset($_POST['newsletterSubscription']) ? 1 : 0;

    // Insert user into Users table
    $stmt = $conn->prepare("INSERT INTO Users (username, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $last_id = $stmt->insert_id;
    $stmt->close();

    // Insert preferences into UserPreferences table
    $stmt = $conn->prepare("INSERT INTO UserPreferences (userId, favoriteGenre, favoriteDecade, newsletterSubscription) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("issi", $last_id, $favoriteGenre, $favoriteDecade, $newsletterSubscription);
    $stmt->execute();
    $stmt->close();

    echo "<p>Profile Setup Complete!</p>";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Vinyl Records - Profile Setup</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f0f0; color: #333; }
        .container { max-width: 600px; margin: 30px auto; background: white; padding: 20px; border-radius: 8px; }
        form { display: flex; flex-direction: column; }
        label { margin: 10px 0 5px; }
        input[type=text], select { padding: 8px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px; }
        input[type=submit] { background-color: #4CAF50; color: white; padding: 14px 20px; margin: 10px 0; border: none; border-radius: 4px; cursor: pointer; }
        input[type=submit]:hover { background-color: #45a049; }
    </style>
</head>
<body>

<div class="container">
    <h2>Customize your profile</h2>
    <form method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required>

        <label for="favoriteGenre">Favorite Genre:</label>
        <select id="favoriteGenre" name="favoriteGenre">
            <option value="rock">Rock</option>
            <option value="jazz">Jazz</option>
            <option value="pop">Pop</option>
            <option value="classical">Classical</option>
            <option value="metal">Metal</option>
        </select>

        <label for="favoriteDecade">Favorite Decade:</label>
        <select id="favoriteDecade" name="favoriteDecade">
            <option value="1960s">1960s</option>
            <option value="1970s">1970s</option>
            <option value="1980s">1980s</option>
            <option value="1990s">1990s</option>
            <option value="2000s">2000s</option>
        </select>

        <label><input type="checkbox" name="newsletterSubscription" value="1"> Subscribe to newsletter</label>

        <input type="submit" value="Complete Setup">
    </form>
</div>

</body>
</html>
