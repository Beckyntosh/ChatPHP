<?php
// Database Connection
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

// Handle profile setup form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract submitted data
    $userId = $_POST['userId']; // Assuming you're passing user ID after signup
    $favoriteFruit = $_POST['favoriteFruit'];
    $preferredStore = $_POST['preferredStore'];
    
    // Insert user preferences into the database
    $sql = "INSERT INTO user_preferences (userId, favoriteFruit, preferredStore) VALUES (?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $userId, $favoriteFruit, $preferredStore);
    
    if ($stmt->execute()) {
        echo "Profile updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $stmt->close();
}

// Create table for user preferences if not exists
$tableSql = "CREATE TABLE IF NOT EXISTS user_preferences (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  userId VARCHAR(30) NOT NULL,
  favoriteFruit VARCHAR(50),
  preferredStore VARCHAR(50),
  reg_date TIMESTAMP
)";

if ($conn->query($tableSql) === TRUE) {
  // Table created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>User Profile Setup</title>
  <style>
    body {font-family: Arial, sans-serif; background-color: #f0f0f0; color: #333;}
    .container {max-width: 600px; margin: 20px auto; padding: 20px; background-color: white; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,.1);}
    h2 {color: #2c3e50;}
    form {margin-top: 20px;}
    input, select {width: 100%; padding: 10px; margin: 10px 0; border-radius: 5px; border: 1px solid #ccc;}
    button {padding: 10px 20px; background-color: #2ecc71; color: white; border: none; border-radius: 5px; cursor: pointer;}
    button:hover {background-color: #27ae60;}
  </style>
</head>
<body>

<div class="container">
  <h2>Setup Your Profile</h2>

  <form method="POST">
Assuming user ID is known, replace with actual user ID
    <label for="favoriteFruit">Favorite Fruit:</label>
    <select name="favoriteFruit">
        <option value="Apples">Apples</option>
        <option value="Oranges">Oranges</option>
        <option value="Bananas">Bananas</option>
    </select>
    
    <label for="preferredStore">Preferred Store:</label>
    <select name="preferredStore">
        <option value="Whole Foods">Whole Foods</option>
        <option value="Trader Joe's">Trader Joe's</option>
        <option value="Safeway">Safeway</option>
    </select>
    
    <button type="submit">Save Preferences</button>
  </form>
</div>

</body>
</html>
