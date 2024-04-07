<?php
// Connection parameters
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
name VARCHAR(30) NOT NULL,
email VARCHAR(50),
event VARCHAR(50) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($volunteersTable) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Insert data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $event = $_POST['event'];

    $insertSql = "INSERT INTO volunteers (name, email, event) VALUES ('$name', '$email', '$event')";

    if ($conn->query($insertSql) === TRUE) {
        echo "<p>Thank you for signing up, $name! You'll receive an email with further instructions.</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer Sign-Up</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
            text-align: center;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input[type=text], input[type=email], select {
            width: 100%;
            padding: 10px 15px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #45a049;
        }
        .footer {
            margin-top: 20px;
            font-size: 14px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Volunteer Sign-up for Events</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Your name.." required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Your email.." required>

        <label for="event">Event</label>
        <select id="event" name="event">
            <option value="Local Charity Event">Local Charity Event</option>
            <option value="Community Clean-up">Community Clean-up</option>
            <option value="Food Drive">Food Drive</option>
        </select>
      
        <input type="submit" value="Submit">
    </form>
</div>
</body>
</html>
