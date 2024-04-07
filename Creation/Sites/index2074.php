<?php
// Handling database connection
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

// Create table if it doesn't exist
$table_sql = "CREATE TABLE IF NOT EXISTS pet_profiles (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  pet_name VARCHAR(50) NOT NULL,
  pet_type VARCHAR(50),
  health_info TEXT,
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($table_sql) === TRUE) {
  echo ""; // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Form submission logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $pet_name = $_POST['pet_name'];
  $pet_type = $_POST['pet_type'];
  $health_info = $_POST['health_info'];

  $insert_sql = "INSERT INTO pet_profiles (pet_name, pet_type, health_info)
  VALUES ('$pet_name', '$pet_type', '$health_info')";

  if ($conn->query($insert_sql) === TRUE) {
    echo "<script>alert('New pet profile created successfully!');</script>";
  } else {
    echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create a Pet Profile</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: auto; padding: 20px; }
        input[type='text'], textarea { width: 100%; padding: 10px; margin: 10px 0; }
        input[type='submit'] { padding: 10px 20px; background-color: #007bff; color: white; border: none; cursor: pointer; }
        input[type='submit']:hover { background-color: #0056b3; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Create Pet Profile</h2>
        <form method="post">
            <label for="pet_name">Pet's Name:</label>
            <input type="text" id="pet_name" name="pet_name" required>

            <label for="pet_type">Pet's Type:</label>
            <input type="text" id="pet_type" name="pet_type" required>

            <label for="health_info">Health Information:</label>
            <textarea id="health_info" name="health_info" required></textarea>

            <input type="submit" value="Create Profile">
        </form>
    </div>
</body>
</html>

<?php $conn->close(); ?>
