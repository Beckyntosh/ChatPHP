<?php
// Connect to Database
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

// Create Profile Table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS user_profiles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fullname VARCHAR(50) NOT NULL,
email VARCHAR(50),
travel_preference VARCHAR(50),
bio TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  //echo "Table user_profiles created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle Post Request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $travel_preference = $_POST['travel_preference'];
    $bio = $_POST['bio'];

    $stmt = $conn->prepare("INSERT INTO user_profiles (fullname, email, travel_preference, bio) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $fullname, $email, $travel_preference, $bio);
    
    if ($stmt->execute()) {
        //echo "New record created successfully";
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
    <title>User Profile Setup</title>
</head>
<body>

<h2>Setup Your Profile</h2>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <label for="fullname">Full Name:</label><br>
  <input type="text" id="fullname" name="fullname" required><br>
  <label for="email">Email:</label><br>
  <input type="email" id="email" name="email" required><br>
  <label for="travel_preference">Travel Preference:</label><br>
  <select id="travel_preference" name="travel_preference">
    <option value="beach">Beach</option>
    <option value="mountains">Mountains</option>
    <option value="city">City</option>
    <option value="countryside">Countryside</option>
  </select><br>
  <label for="bio">Bio:</label><br>
  <textarea id="bio" name="bio" rows="4" cols="50"></textarea><br><br>
  
  <input type="submit" value="Submit">
</form> 

</body>
</html>
