<?php
// Simple script to handle post-signup profile customization for a Baby Products website
// Connects to the database and updates the user's profile based on their selections
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

// Handle the POST request from the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $fav_brand = $_POST['fav_brand'];
    $child_age = $_POST['child_age'];
    $preferences = $_POST['preferences'];

    // Prepare SQL to insert into the database
    $stmt = $conn->prepare("INSERT INTO user_profiles (user_id, fav_brand, child_age, preferences) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isis", $user_id, $fav_brand, $child_age, $preferences);

    // Execute the statement and check for success
    if ($stmt->execute()) {
        echo "Profile updated successfully!";
    } else {
        echo "Error updating profile: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile Customization</title>
</head>
<body>
    <h2>Customize Your Profile</h2>
    <form method="POST">
Assume user_id is 1 for this example
        <label for="fav_brand">Favorite Brand:</label>
        <input type="text" id="fav_brand" name="fav_brand" required><br><br>
        <label for="child_age">Child's Age:</label>
        <input type="number" id="child_age" name="child_age" required><br><br>
        <label for="preferences">Preferences:</label>
        <textarea id="preferences" name="preferences" required></textarea><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
