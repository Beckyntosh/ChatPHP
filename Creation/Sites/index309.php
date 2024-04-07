<?php
// Database connection
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

// Create tables if not exists
$profileTableSql = "CREATE TABLE IF NOT EXISTS profiles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
profile_picture VARCHAR(255),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$auditTableSql = "CREATE TABLE IF NOT EXISTS audit_logs (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
action VARCHAR(50) NOT NULL,
description VARCHAR(255),
change_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$conn->query($profileTableSql);
$conn->query($auditTableSql);

function logAudit($conn, $userId, $action, $description) {
    $stmt = $conn->prepare("INSERT INTO audit_logs (user_id, action, description) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $userId, $action, $description);
    $stmt->execute();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle profile picture update
    if (isset($_FILES["profile_picture"])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);
        if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
            $userId = $_POST["user_id"];
            // Update profile picture in database
            $stmt = $conn->prepare("UPDATE profiles SET profile_picture = ? WHERE id = ?");
            $stmt->bind_param("si", $target_file, $userId);
            $stmt->execute();

            // Log this update
            logAudit($conn, $userId, "Update Profile", "Updated profile picture to " . basename($_FILES["profile_picture"]["name"]));

            echo "The file " . htmlspecialchars(basename($_FILES["profile_picture"]["name"])) . " has been uploaded and profile updated.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Profile Picture Update</title>
</head>
<body>
<h2>Update Profile Picture</h2>
<form action="profile_edit_with_audit.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="profile_picture" id="profile_picture">
Assuming a user ID 1 for demo
  <input type="submit" value="Upload Image" name="submit">
</form>
</body>
</html>
<?php
$conn->close();
?>