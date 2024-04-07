<?php
// Define MySQL connection parameters
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Attempt to connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if the table exists, if not, create it
$tableCheckSql = "SHOW TABLES LIKE 'users';";
$result = $conn->query($tableCheckSql);
if ($result->num_rows == 0) {
  $sql = "CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(60) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";

  if ($conn->query($sql) !== TRUE) {
    die("Error creating table: " . $conn->error);
  }
}

// Handle the signup POST request
$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $email = $_POST['email'];

  $insertSql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
  $stmt = $conn->prepare($insertSql);
  $stmt->bind_param("sss", $username, $password, $email);
  if(!$stmt->execute()) {
    $message = "Error: " . $sql . "<br>" . $conn->error;
  } else {
    $message = "Signup successful! Welcome to our premium file storage features.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup for Premium File Storage - Romeo & Juliet Cloud</title>
    <style>
        body {
            font-family: 'Times New Roman', serif;
            background-color: #f5f5f5;
            text-align: center;
            padding: 50px;
        }
        .container {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 10px;
            display: inline-block;
        }
        h2 {
            color: #800000;
        }
        input[type="text"], input[type="password"], input[type="email"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #800000;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #450000;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Signup for Premium File Storage</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="submit" value="Signup">
        </form>
        <?php if (!empty($message)): ?>
            <p><?= $message ?></p>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
$conn->close();
?>