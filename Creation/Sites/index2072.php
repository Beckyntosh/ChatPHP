<?php
// Connect to Database
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

// Create pet profile table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS pet_profiles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
pet_name VARCHAR(30) NOT NULL,
pet_type VARCHAR(30) NOT NULL,
health_info TEXT,
reg_date TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Insert new pet profile
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pet_name = $_POST['pet_name'];
    $pet_type = $_POST['pet_type'];
    $health_info = $_POST['health_info'];

    $sql = "INSERT INTO pet_profiles (pet_name, pet_type, health_info)
    VALUES ('$pet_name', '$pet_type', '$health_info')";

    if ($conn->query($sql) === TRUE) {
        echo "New pet profile created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Pet Profile</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { margin: 50px auto; width: 600px; }
        input, textarea { width: 100%; margin-bottom: 20px; padding: 10px; }
        label { font-weight: bold; }
        button { padding: 10px 20px; cursor: pointer; }
    </style>
</head>
<body>

<div class="container">
    <h2>Create a Pet Profile</h2>
    <form action="" method="post">
        <label for="pet_name">Pet Name:</label>
        <input type="text" id="pet_name" name="pet_name" required>

        <label for="pet_type">Pet Type:</label>
        <input type="text" id="pet_type" name="pet_type" required>

        <label for="health_info">Health Info:</label>
        <textarea id="health_info" name="health_info" required></textarea>
        
        <button type="submit">Submit</button>
    </form>
</div>

</body>
</html>

<?php
$conn->close();
?>
