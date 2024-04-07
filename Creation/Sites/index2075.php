<?php
// Connection parameters
$servername = "db"; // Assuming docker-compose usage which defines `db` as the hostname for the DB service
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS pet_profiles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pet_name VARCHAR(50),
    pet_type VARCHAR(30),
    pet_breed VARCHAR(50),
    health_info TEXT,
    owner_name VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    die("Error creating table: " . $conn->error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $petName = $_POST['petName'];
    $petType = $_POST['petType'];
    $petBreed = $_POST['petBreed'];
    $healthInfo = $_POST['healthInfo'];
    $ownerName = $_POST['ownerName'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO pet_profiles (pet_name, pet_type, pet_breed, health_info, owner_name) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $petName, $petType, $petBreed, $healthInfo, $ownerName);

    // Execute
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<body>

<h2>Create Pet Profile</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Pet Name: <input type="text" name="petName" required><br>
  Pet Type: <input type="text" name="petType" required><br>
  Pet Breed: <input type="text" name="petBreed"><br>
  Health Info: <textarea name="healthInfo" required></textarea><br>
  Owner Name: <input type="text" name="ownerName" required><br>
  <input type="submit" value="Submit">
</form>

</body>
</html>
