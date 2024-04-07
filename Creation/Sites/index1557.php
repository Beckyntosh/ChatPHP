<?php
// Database configuration
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

// Create table if not exists
$tableSql = "CREATE TABLE IF NOT EXISTS pet_profiles (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    pet_name VARCHAR(30) NOT NULL,
    pet_type VARCHAR(30) NOT NULL,
    health_info TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($tableSql) === TRUE) {
  // echo "Table pet_profiles created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle post request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $petName = $_POST['petName'];
  $petType = $_POST['petType'];
  $healthInfo = $_POST['healthInfo'];

  // Insert into database
  $insertSQL = "INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES (?, ?, ?)";

  // Prepare statement
  $stmt = $conn->prepare($insertSQL);
  $stmt->bind_param("sss", $petName, $petType, $healthInfo);

  // Execute query
  if($stmt->execute()){
    echo "<div>Pet Profile Created Successfully.</div>";
  } else{
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Pet Profile</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 40px; }
        form { background: white; padding: 20px; border-radius: 8px; }
        label { display: block; margin-bottom: 8px; }
        input[type="text"], textarea { width: 100%; padding: 8px; margin-bottom: 20px; border-radius: 4px; border: 1px solid #ddd; }
        input[type="submit"] { background: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; }
        input[type="submit"]:hover { background: #0056b3; }
    </style>
</head>
<body>
    <h2>Create Pet Profile</h2>
    <form method="post">
        <div>
            <label for="petName">Pet Name:</label>
            <input type="text" name="petName" required>
        </div>
        <div>
            <label for="petType">Pet Type (e.g., Dog, Cat):</label>
            <input type="text" name="petType" required>
        </div>
        <div>
            <label for="healthInfo">Health Information:</label>
            <textarea name="healthInfo" required></textarea>
        </div>
        <div>
            <input type="submit" value="Create Profile">
        </div>   
    </form>
</body>
</html>

<?php
$conn->close();
?>
