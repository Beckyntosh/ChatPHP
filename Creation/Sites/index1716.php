<?php
// Establish connection to database
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
$table = "CREATE TABLE IF NOT EXISTS pet_profiles (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    pet_name VARCHAR(30) NOT NULL,
    pet_type VARCHAR(30) NOT NULL,
    health_info TEXT,
    reg_date TIMESTAMP
)";

if ($conn->query($table) === TRUE) {
    // Table created successfully or already exists
} else {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pet_name = $_POST["pet_name"];
    $pet_type = $_POST["pet_type"];
    $health_info = $_POST["health_info"];

    $sql = "INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $pet_name, $pet_type, $health_info);
    
    if ($stmt->execute() === TRUE) {
        echo "<p>Profile created successfully. Redirecting...</p>";
        header("Refresh: 2; url=./");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create a Pet Profile</title>
    <style>
        /* Basic Styling */
        body { font-family: Arial, sans-serif; background-color: #f0f0f0; margin: 20px; }
        .container { background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        h1 { color: #333; }
        form { margin-top: 20px; }
        input[type="text"], textarea { width: 100%; padding: 10px; margin-bottom: 20px; border-radius: 4px; border: 1px solid #ccc; }
        input[type="submit"] { background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; }
        input[type="submit"]:hover { background-color: #0056b3; }
    </style>
</head>
<body>
<div class="container">
    <h1>Create Pet Profile</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="pet_name">Pet Name:</label>
        <input type="text" id="pet_name" name="pet_name" required>
        
        <label for="pet_type">Pet Type:</label>
        <input type="text" id="pet_type" name="pet_type" required>
        
        <label for="health_info">Health Info:</label>
        <textarea id="health_info" name="health_info"></textarea>
        
        <input type="submit" value="Create Profile">
    </form>
</div>
</body>
</html>
