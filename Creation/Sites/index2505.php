<?php
// Connection parameters.
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

// Create table for languages if it doesn't exist
$langTable = "CREATE TABLE IF NOT EXISTS languages (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
language_name VARCHAR(30) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($langTable) === TRUE) {
  echo "";
} else {
  echo "Error creating table: " . $conn->error;
}

// Create table for users if it doesn't exist
$userTable = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50),
password VARCHAR(50),
language_preference VARCHAR(30),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($userTable) === TRUE) {
  echo "";
} else {
  echo "Error creating table: " . $conn->error;
}

//Insert initial languages into the languages table
$insertLanguages = "INSERT INTO languages (language_name) VALUES ('English'),('Spanish'),('French'),('German'),('Italian') ON DUPLICATE KEY UPDATE language_name=language_name";

if ($conn->query($insertLanguages) === TRUE) {
  echo "";
} else {
  echo "Error: " . $insertLanguages . "<br>" . $conn->error;
}

// Function to sanitize data
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// Signup form processing
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = test_input($_POST["email"]);
  $password = test_input($_POST["password"]);
  $language_preference = test_input($_POST["language_preference"]);
  
  $stmt = $conn->prepare("INSERT INTO users (email, password, language_preference) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $email, password_hash($password, PASSWORD_DEFAULT), $language_preference);
  
  if($stmt->execute()) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Signup Page</title>
</head>
<body>

<h2>Signup Form</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Email: <input type="text" name="email" required>
  <br><br>
  Password: <input type="password" name="password" required>
  <br><br>
  Language Preference: 
  <select name="language_preference">
    <?php
      // Fetching languages from the database to show in the select options.
      $conn = new mysqli($servername, $username, $password, $dbname);
      $result = $conn->query("SELECT language_name FROM languages");
      
      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo '<option value="' . $row["language_name"] . '">' . $row["language_name"] . '</option>';
        }
      } else {
        echo '<option value="English">English</option>';
      }
      $conn->close();
    ?>
  </select>
  <br><br>
  <input type="submit" value="Signup">
</form>

</body>
</html>
