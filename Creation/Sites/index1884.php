<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Insert user and start date, end date of trial
    $email = $conn->real_escape_string($_POST["email"]);
    $startDate = date("Y-m-d");
    $endDate = date("Y-m-d", strtotime("+1 month"));

    $sql = "INSERT INTO users (email, trial_start, trial_end) VALUES ('$email', '$startDate', '$endDate')";

    if ($conn->query($sql) === TRUE) {
        echo "You are successfully signed up for a 1-month free trial.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup for Free Trial</title>
    <style>
        body {font-family: Arial, sans-serif; max-width: 600px; margin: auto; padding: 20px;}
        form {display: grid; gap: 10px;}
        input[type="email"], button {padding: 10px; font-size: 1rem;}
    </style>
</head>
<body>
    <h1>Signup for a 1-month Free Trial</h1>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <input type="email" name="email" required placeholder="Enter your email">
        <button type="submit">Sign Up</button>
    </form>
</body>
</html>

<?php
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

// SQL to create table
$sql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50) NOT NULL,
trial_start DATE NOT NULL,
trial_end DATE NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    //echo "Table users created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
