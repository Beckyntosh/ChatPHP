<?php
// Initialize a session
session_start();

// Include our database connection script
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

// Check if user has submitted the profile form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Capture and sanitize input
  $user_id = $_SESSION['user_id'];
  $favorite_cuisine = htmlspecialchars($_POST['favorite_cuisine']);
  $cooking_experience = htmlspecialchars($_POST['cooking_experience']);

  // Insert or update user profile information
  $sql = "INSERT INTO user_profiles (user_id, favorite_cuisine, cooking_experience) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE favorite_cuisine=?, cooking_experience=?";

  $stmt = $conn->prepare($sql);

  if ($stmt) {
    $stmt->bind_param("issss", $user_id, $favorite_cuisine, $cooking_experience, $favorite_cuisine, $cooking_experience);
    $stmt->execute();
    $stmt->close();
    echo "<p>Profile updated successfully.</p>";
  } else {
    echo "<p>Error updating profile: " . $conn->error . "</p>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile Setup</title>
</head>
<body>
    <h2>Customize Your Profile</h2>
    <form action="" method="post">
        <label for="favorite_cuisine">Favorite Cuisine:</label>
        <select name="favorite_cuisine" id="favorite_cuisine">
            <option value="Italian">Italian</option>
            <option value="Mexican">Mexican</option>
            <option value="Chinese">Chinese</option>
            <option value="Indian">Indian</option>
            <option value="American">American</option>
            <option value="Other">Other</option>
        </select>
        <br><br>
        <label for="cooking_experience">Cooking Experience:</label>
        <select name="cooking_experience" id="cooking_experience">
            <option value="Beginner">Beginner</option>
            <option value="Intermediate">Intermediate</option>
            <option value="Expert">Expert</option>
        </select>
        <br><br>
        <input type="submit" value="Save Profile">
    </form>
</body>
</html>

<?php $conn->close(); ?>
