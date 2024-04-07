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

// Create tables
$sql = "CREATE TABLE IF NOT EXISTS Users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
trial_start_date DATE,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    // echo "Table Users created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $trial_start_date = date("Y-m-d"); // the current date as the start date of the trial

    // Insert user
    $stmt = $conn->prepare("INSERT INTO Users (firstname, lastname, email, trial_start_date) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $firstname, $lastname, $email, $trial_start_date);

    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription Service Signup with Trial Period</title>
</head>
<body>

<h2>Sign Up for Prescription Medications Website - Free 1 Month Trial</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <label for="firstname">First Name:</label><br>
  <input type="text" id="firstname" name="firstname" required><br>
  <label for="lastname">Last Name:</label><br>
  <input type="text" id="lastname" name="lastname" required><br>
  <label for="email">Email:</label><br>
  <input type="email" id="email" name="email" required><br>
  <input type="submit" value="Submit">
</form> 

</body>
</html>