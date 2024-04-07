<?php
// Define MySQL connection parameters
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

// Check if the table exists, if not, create it
$tableCheckSql = "SHOW TABLES LIKE 'subscriptions'";
$result = $conn->query($tableCheckSql);

if ($result->num_rows == 0) {
    // SQL to create table
    $sql = "CREATE TABLE subscriptions (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(50) NOT NULL,
        subscription_start DATE NOT NULL,
        subscription_end DATE NOT NULL,
        status VARCHAR(10) NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Table subscriptions created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
}

// Handle the subscription form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $subscriptionStart = date("Y-m-d");
    $subscriptionEnd = date("Y-m-d", strtotime("+1 month"));
    $status = 'active';

    // Insert subscription into the database
    $stmt = $conn->prepare("INSERT INTO subscriptions (email, subscription_start, subscription_end, status) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $email, $subscriptionStart, $subscriptionEnd, $status);

    if ($stmt->execute() === TRUE) {
        echo "Subscription added successfully with 1 month free trial!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta viewport="width=device-width, initial-scale=1.0">
    <title>Sign Up for Free Trial</title>
</head>
<body>
    <h2>Sign Up for a 1-Month Free Trial</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <input type="submit" value="Subscribe">
    </form>
</body>
</html>
