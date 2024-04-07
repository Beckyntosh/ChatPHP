<?php
// Define database connection parameters
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
    echo ""; // Success, do nothing
} else {
    echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $petName = $_POST['petName'];
    $petType = $_POST['petType'];
    $healthInfo = $_POST['healthInfo'];
    
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $petName, $petType, $healthInfo);
    
    // Execute and check
    if ($stmt->execute()) {
        echo "<p style='color:green;'>New pet profile created successfully.</p>";
    } else {
        echo "<p style='color:red;'>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
    
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create a Pet Profile</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f0f5; }
        .container { max-width: 600px; margin: 50px auto; padding: 20px; background-color: #fff; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        h2 { color: #333; }
        form { display: flex; flex-direction: column; }
        input, textarea { margin-bottom: 20px; padding: 10px; font-size: 16px; }
        input[type="submit"] { background-color: #007bff; color: #fff; border: none; cursor: pointer; }
        input[type="submit"]:hover { background-color: #0056b3; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Create a Pet Profile</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <input type="text" name="petName" placeholder="Pet's Name" required>
            <input type="text" name="petType" placeholder="Pet's Type (e.g. Dog, Cat)" required>
            <textarea name="healthInfo" placeholder="Health Information" rows="5"></textarea>
            <input type="submit" value="Create Profile">
        </form>
    </div>
</body>
</html>
