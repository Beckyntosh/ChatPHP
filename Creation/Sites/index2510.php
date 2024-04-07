<?php
// Setup connection variables
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

// Create table for users if not exists
$sql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
language VARCHAR(10),
reg_date TIMESTAMP
)";
if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle user registration
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $language = $_POST['language'];

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO users (username, email, language) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $language);

    if($stmt->execute()){
        $message = "User registered successfully";
    } else {
        $message = "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup Form</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 400px; margin: auto; padding: 20px; }
        form { display: flex; flex-direction: column; }
        label { margin-bottom: 5px; }
        input, button { margin-bottom: 20px; padding: 10px; }
        select { padding: 10px; }
        .message { color: green; }
    </style>
</head>
<body>

<div class="container">
    <h2>Signup Form</h2>
    <?php if ($message !== "") { echo "<div class='message'>$message</div>"; } ?>
    <form action="" method="post">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>

      <label for="language">Language Preference:</label>
      <select id="language" name="language">
          <option value="English">English</option>
          <option value="French">French</option>
          <option value="Spanish">Spanish</option>
          <option value="German">German</option>
          <option value="Chinese">Chinese</option>
      </select>

      <button type="submit">Signup</button>
    </form>
</div>

</body>
</html>
