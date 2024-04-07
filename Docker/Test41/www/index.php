// PARAMETERS: Function: Volunteer Sign-up Platform for Events and Causes: create an example signup platform for volunteering at events and social causes. Example: User registers to volunteer at a local charity event Product: Skin Care Products Style: cheerful
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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS volunteers (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fullname VARCHAR(50) NOT NULL,
email VARCHAR(50),
event VARCHAR(255),
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  //echo "Table Volunteers created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $event = $_POST['event'];

  $sql = "INSERT INTO volunteers (fullname, email, event)
  VALUES ('$fullname', '$email', '$event')";

  if ($conn->query($sql) === TRUE) {
    echo "<h3>Thank you for signing up, $fullname! You will receive an email with further details.</h3>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Volunteer Sign-Up</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0e8d9;
            color: #333;
            text-align: center;
        }
        .container {
            width: 50%;
            margin: 0 auto;
        }
        input[type=text], input[type=email] {
            width: 100%;
            padding: 12px 20px;
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
        .signup-form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Volunteer Sign-Up</h1>
    <p>Please fill in this form to sign up for a volunteering event.</p>
    <form class="signup-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="fullname">Full Name</label>
        <input type="text" id="fullname" name="fullname" placeholder="Your full name.." required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Your email.." required>

        <label for="event">Select Event</label>
        <select id="event" name="event" required>
            <option value="Local Charity Event">Local Charity Event</option>
            <option value="Beach Cleanup">Beach Cleanup</option>
            <option value="Soup Kitchen">Soup Kitchen</option>
        </select>

        <input type="submit" value="Submit">
    </form>
</div>
</body>
</html>
