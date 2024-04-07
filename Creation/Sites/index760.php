<?php
// Connection variables
$host = "db"; // since we are using docker-compose, the db host is the service name 'db'
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create Product table if not exists
$conn->query("CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    description TEXT,
    category VARCHAR(100),
    price DECIMAL(10, 2),
    stock_quantity INT
);");

// Create User table if not exists
$conn->query("CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30),
    name VARCHAR(30),
    email VARCHAR(50),
    password VARCHAR(255)
);");

// Create Profile table if not exists
$conn->query("CREATE TABLE IF NOT EXISTS profiles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    bio TEXT,
    website VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES users(id)
);");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Profile - Skateboards Crowdfunding Platform</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #F7ECE1;
            color: #333;
        }
        .container {
            width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: #FFF3CD;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h1 {
            color: #DAA520;
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input, textarea {
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            background-color: #DAA520;
            color: white;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #B8860B;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add Your Profile</h1>
        <form action="add_profile.php" method="post">
            <input type="text" name="user_id" placeholder="User ID" required>
            <textarea name="bio" placeholder="Your Bio" required></textarea>
            <input type="text" name="website" placeholder="Website URL">
            <input type="submit" name="submit" value="Add Profile">
        </form>
    </div>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect value of input field
    $user_id = $_POST['user_id'];
    $bio = $_POST['bio'];
    $website = $_POST['website'];

    // Insert profile into database
    $sql = "INSERT INTO profiles (user_id, bio, website) VALUES (?, ?, ?)";
    $stmt= $conn->prepare($sql);
    $stmt->bind_param("iss", $user_id, $bio, $website);
    $stmt->execute();

    echo "<p style='text-align: center;'>Profile added successfully!</p>";
}

// Close connection
$conn->close();
?>