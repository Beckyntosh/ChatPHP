<?php
// Check if form was submitted:
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Variables for the database connection
    $servername = "db";
    $username = "root";
    $password = "root";
    $dbname = "my_database";
    
    try {
        // Create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Prepare SQL and bind parameters
        $stmt = $conn->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        
        // Insert user
        $name = htmlspecialchars(strip_tags($_POST['name']));
        $email = htmlspecialchars(strip_tags($_POST['email']));
        $stmt->execute();
        
        echo "New user registered successfully";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup Page</title>
    <style>
        body {font-family: 'Courier New', monospace; background-color: #f0f0f0;}
        form {padding: 20px; background-color: #fff; margin: 50px auto; width: 300px; box-shadow: 0 0 10px #aaa;}
        input[type=text], input[type=email] {width: 100%; padding: 10px; margin: 10px 0;}
        input[type=submit] {background-color: #333; color: #fff; padding: 10px; border: none; cursor: pointer;}
        input[type=submit]:hover {background-color: #555;}
    </style>
</head>
<body>

<div>
    <form action="" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <input type="submit" name="submit" value="Signup">
    </form>
</div>

</body>
</html>

<?php
// Create table script if not exists
$tableCreationQuery = "
CREATE TABLE IF NOT EXISTS users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP
) ENGINE = InnoDB;";

try {
    // Initialize the database connection
    $conn = new PDO("mysql:host=db;dbname=my_database", "root", "root");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Execute the query to create table if it doesn't exists
    $conn->exec($tableCreationQuery);
    
} catch(PDOException $e) {
    echo $tableCreationQuery . "<br>" . $e->getMessage();
}

$conn = null;
?>
