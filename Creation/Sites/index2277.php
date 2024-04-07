<?php
// Assuming the user is already signed up and we are focusing on post-signup profile customization.

// Database connection setup
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

// Create table for profile preferences if not exists
$sql = "CREATE TABLE IF NOT EXISTS user_preferences (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED NOT NULL,
favorite_genre VARCHAR(30) NOT NULL,
receive_newsletters BOOLEAN,
FOREIGN KEY (user_id) REFERENCES users(id)
)";

if ($conn->query($sql) === TRUE) {
    // Table creation success
} else {
    echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form data
    $user_id = $_POST['user_id'];
    $favorite_genre = $_POST['favorite_genre'];
    $receive_newsletters = isset($_POST['receive_newsletters']) ? 1 : 0;

    // Insert or update user preferences
    $stmt = $conn->prepare("INSERT INTO user_preferences (user_id, favorite_genre, receive_newsletters) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE favorite_genre=?, receive_newsletters=?");
    $stmt->bind_param("issii", $user_id, $favorite_genre, $receive_newsletters, $favorite_genre, $receive_newsletters);
    
    if ($stmt->execute()) {
        echo "Profile updated successfully.";
    } else {
        echo "Error updating profile: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();

?>

<!DOCTYPE html>
<html>
<head>
    <title>User Profile Setup</title>
</head>
<body>
    <h2>Customize Your Profile</h2>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
Assuming User ID is 1 for demo
        <label for="favorite_genre">Favorite Magazine Genre:</label>
        <select name="favorite_genre" required>
            <option value="Sci-Fi">Sci-Fi</option>
            <option value="History">History</option>
            <option value="Technology">Technology</option>
            <option value="Art">Art</option>
        </select><br><br>
        <label for="receive_newsletters">Receive Newsletters:</label>
        <input type="checkbox" name="receive_newsletters"><br><br>
        <input type="submit" value="Save Profile">
    </form>
</body>
</html>
