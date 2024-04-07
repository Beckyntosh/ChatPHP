<?php
// Define MySQL connection parameters
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_DATABASE', 'my_database');
define('MYSQL_SERVER', 'db');

// Establish MySQL connection
$conn = new mysqli(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Table creation if not exists
$sql = "CREATE TABLE IF NOT EXISTS user_profiles (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(50) NOT NULL,
    favorite_brand VARCHAR(50) NOT NULL,
    budget VARCHAR(10) NOT NULL,
    reg_date TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    die("Error creating table: " . $conn->error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['fullname'];
    $favorite_brand = $_POST['favorite_brand'];
    $budget = $_POST['budget'];

    $stmt = $conn->prepare("INSERT INTO user_profiles (fullname, favorite_brand, budget) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $fullname, $favorite_brand, $budget);

    if ($stmt->execute()) {
        echo "<p>Profile saved successfully!</p>";
    } else {
        echo "<p>Error saving profile: " . $stmt->error . "</p>";
    }

    $stmt->close();
}
$conn->close();
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
    <form method="POST">
        <label for="fullname">Full Name:</label><br>
        <input type="text" id="fullname" name="fullname" required><br>

        <label for="favorite_brand">Favorite Laptop Brand:</label><br>
        <select id="favorite_brand" name="favorite_brand" required>
            <option value="Dell">Dell</option>
            <option value="HP">HP</option>
            <option value="Apple">Apple</option>
            <option value="Lenovo">Lenovo</option>
            <option value="Asus">Asus</option>
        </select><br>

        <label for="budget">Budget:</label><br>
        <input type="text" id="budget" name="budget" required><br><br>

        <input type="submit" value="Save Profile">
    </form>
</body>
</html>
