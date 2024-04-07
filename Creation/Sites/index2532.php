<?php
// Handle database connection
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
$volunteersTable = "CREATE TABLE IF NOT EXISTS volunteers (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fullname VARCHAR(50) NOT NULL,
email VARCHAR(50),
event VARCHAR(100),
registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($volunteersTable) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $event = $_POST['event'];

  // Insert into database
  $sql = "INSERT INTO volunteers (fullname, email, event) VALUES ('$fullname', '$email', '$event')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Volunteer Sign-up</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
            line-height: 1.6;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
            padding: 20px;
        }
        form {
            margin-top: 30px;
        }
        form div {
            margin-bottom: 10px;
        }
        form input[type=text], form input[type=email] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }
        form select {
            width: 100%;
            padding: 10px;
            margin: 5px 0 22px 0;
            border: none;
            background: #f1f1f1;
        }
        form button {
            background-color: #333;
            color: #ffffff;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }
        form button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Volunteer Sign-up Form</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div>
            <label for="fullname">Full Name:</label>
            <input type="text" name="fullname" id="fullname" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div>
            <label for="event">Select Event:</label>
            <select name="event" id="event">
                <option value="Local Charity Event">Local Charity Event</option>
                <option value="Community Clean-up">Community Clean-up</option>
                <option value="Food Drive">Food Drive</option>
            </select>
        </div>
        <button type="submit">Submit</button>
    </form>
</div>
</body>
</html>
