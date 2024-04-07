<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connection variables
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

    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Consider hashing the password before storing it
    $loyalty = isset($_POST['loyalty']) ? 1 : 0;

    // SQL to create tables if they do not exist
    $sqlUserTable = "CREATE TABLE IF NOT EXISTS Users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        password VARCHAR(50),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    $sqlLoyaltyTable = "CREATE TABLE IF NOT EXISTS LoyaltyProgram (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        user_id INT(6) UNSIGNED,
        loyalty_points INT(10) DEFAULT 0,
        FOREIGN KEY (user_id) REFERENCES Users(id)
    )";

    // Attempt to create the tables
    $conn->query($sqlUserTable);
    $conn->query($sqlLoyaltyTable);

    // Prepare SQL and bind parameters
    $stmt = $conn->prepare("INSERT INTO Users (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $password);
    
    // Execute the statement
    $stmt->execute();

    $last_id = $stmt->insert_id;

    // If the user opted into the loyalty program, add them
    if($loyalty) {
        $stmt = $conn->prepare("INSERT INTO LoyaltyProgram (user_id, loyalty_points) VALUES (?, ?)");
        $loyaltyPoints = 0; // Initial loyalty points
        $stmt->bind_param("ii", $last_id, $loyaltyPoints);
        $stmt->execute();
    }

    $stmt->close();
    $conn->close();

    // Redirect to thank you page or similar
    echo "Registration Successful"; // Placeholder success message
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
</head>
<body>
<h2>Sign Up</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" required><br>
    
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br>
    
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required><br>

    <input type="checkbox" id="loyalty" name="loyalty">
    <label for="loyalty">Join the Loyalty Program</label><br>

    <input type="submit" value="Submit">
</form>
</body>
</html>
