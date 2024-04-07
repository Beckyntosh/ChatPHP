<?php
// DB configuration
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Create table if it does not exist
$tableQuery = "CREATE TABLE IF NOT EXISTS pets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    petName VARCHAR(255) NOT NULL,
    petType VARCHAR(50) NOT NULL,
    petBreed VARCHAR(50),
    healthInfo TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

$pdo->exec($tableQuery);

// Insert pet information
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['petName'])) {
    $sql = "INSERT INTO pets (petName, petType, petBreed, healthInfo) VALUES (:petName, :petType, :petBreed, :healthInfo)";
    
    if ($stmt = $pdo->prepare($sql)) {
        $stmt->bindParam(":petName", $param_petName, PDO::PARAM_STR);
        $stmt->bindParam(":petType", $param_petType, PDO::PARAM_STR);
        $stmt->bindParam(":petBreed", $param_petBreed, PDO::PARAM_STR);
        $stmt->bindParam(":healthInfo", $param_healthInfo, PDO::PARAM_STR);
        
        $param_petName = trim($_POST["petName"]);
        $param_petType = trim($_POST["petType"]);
        $param_petBreed = trim($_POST["petBreed"]);
        $param_healthInfo = trim($_POST["healthInfo"]);
        
        if ($stmt->execute()) {
            echo "<script>alert('Pet profile created successfully.');</script>";
        } else {
            echo "<script>alert('Oops! Something went wrong. Please try again later.');</script>";
        }
        unset($stmt);
    }
}
unset($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Pet Profile</title>
    <style>
        body {font-family: Arial, sans-serif; background-color: #f0f0f0; margin: 40px;}
        .container {background-color: #fff; padding: 20px; border-radius: 5px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);}
        form {display: flex; flex-direction: column;}
        label {margin-top: 10px;}
        input, textarea {padding: 10px; margin-top: 5px; border-radius: 5px; border: 1px solid #ddd; font-size: 16px;}
        button {padding: 10px 15px; color: #fff; background-color: #007bff; border: none; border-radius: 5px; margin-top: 20px; cursor: pointer;}
        button:hover {background-color: #0056b3;}
    </style>
</head>
<body>
    <div class="container">
        <h2>Create Pet Profile</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="petName">Pet Name:</label>
            <input type="text" name="petName" id="petName" required>
            
            <label for="petType">Pet Type:</label>
            <input type="text" name="petType" id="petType" required>
            
            <label for="petBreed">Pet Breed (optional):</label>
            <input type="text" name="petBreed" id="petBreed">
            
            <label for="healthInfo">Health Information:</label>
            <textarea name="healthInfo" id="healthInfo" rows="4" required></textarea>
            
            <button type="submit">Create Profile</button>
        </form>
    </div>
</body>
</html>
