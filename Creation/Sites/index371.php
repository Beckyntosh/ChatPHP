<?php
// Assuming session already started after user signup
session_start();

// Database Connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create profile table if doesn't exist
$tableQuery = "CREATE TABLE IF NOT EXISTS user_profiles (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    user_id INT(6) UNSIGNED NOT NULL,
    vitamin_pref VARCHAR(255),
    daily_intake_goal VARCHAR(255),
    reg_date TIMESTAMP
)";

if ($conn->query($tableQuery) !== TRUE) {
    die("Error creating table: " . $conn->error);
}

$user_id = $_SESSION['user_id']; // assuming user_id is stored in session after registration

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vitamin_pref = $_POST['vitamin_pref'];
    $daily_intake_goal = $_POST['daily_intake_goal'];

    $stmt = $conn->prepare("INSERT INTO user_profiles (user_id, vitamin_pref, daily_intake_goal) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $user_id, $vitamin_pref, $daily_intake_goal);

    if ($stmt->execute()) {
        echo "<p>Profile updated successfully</p>";
    } else {
        echo "<p>Error updating record: " . $conn->error . "</p>";
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

<h2>Setup Your Profile</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <label for="vitamin_pref">Preferred Vitamins:</label><br>
  <input type="text" id="vitamin_pref" name="vitamin_pref" required><br>
  <label for="daily_intake_goal">Daily Intake Goal:</label><br>
  <input type="text" id="daily_intake_goal" name="daily_intake_goal" required><br><br>
  <input type="submit" value="Submit">
</form>

</body>
</html>