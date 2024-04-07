<?php
// Set up connection variables
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
$createTable = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    signup_date DATE,
    trial_end_date DATE,
    reg_date TIMESTAMP
)";

if ($conn->query($createTable) === TRUE) {
    echo "Table users created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $signupDate = date("Y-m-d");
    $trialEndDate = date("Y-m-d", strtotime("+1 month", strtotime($signupDate)));

    $stmt = $conn->prepare("INSERT INTO users (username, email, signup_date, trial_end_date) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $email, $signupDate, $trialEndDate);

    if ($stmt->execute() === TRUE) {
        echo "<br/>New record created successfully. Enjoy your 1-month free trial!";
    } else {
        echo "<br/>Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Subscription Signup</title>
</head>
<body>
    <h2>Signup for a Free 1-Month Trial</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Username: <input type="text" name="username" required><br><br>
        Email: <input type="email" name="email" required><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
