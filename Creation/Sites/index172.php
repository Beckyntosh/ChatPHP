<?php
// Simplified example for educational purposes

// Connect to the database
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

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cameraName = $_POST["cameraName"];
    $location = $_POST["location"];

    // Insert new camera
    $sql = "INSERT INTO Cameras (cameraName, location) VALUES (?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $cameraName, $location);

    if ($stmt->execute()) {
        echo "<p>New camera added successfully!</p>";
    } else {
        echo "<p>Failed to add new camera: " . $stmt->error . "</p>";
    }
}

// Create Cameras table if not exists
$sql = "CREATE TABLE IF NOT EXISTS Cameras (
id INT AUTO_INCREMENT PRIMARY KEY,
cameraName VARCHAR(255) NOT NULL,
location VARCHAR(255) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Security Camera</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f0f0; }
        .container { max-width: 600px; margin: auto; background: white; padding: 20px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        h2 { text-align: center; color: #333; }
        form { display: flex; flex-direction: column; }
        label { font-weight: bold; margin-bottom: 5px; }
        input[type="text"], input[type="submit"] { margin-bottom: 20px; padding: 10px; }
        input[type="submit"] { background-color: #4CAF50; color: white; border: none; cursor: pointer; }
        input[type="submit"]:hover { background-color: #45a049; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add Security Camera</h2>
        <form method="POST">
            <label for="cameraName">Camera Name:</label>
            <input type="text" id="cameraName" name="cameraName" required>
            
            <label for="location">Location:</label>
            <input type="text" id="location" name="location" required>

            <input type="submit" value="Add Camera">
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>