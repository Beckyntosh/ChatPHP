<?php
// First part: PHP backend
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

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $petName = $_POST['petName'];
  $petType = $_POST['petType'];
  $healthInfo = $_POST['healthInfo'];

  $sql = "INSERT INTO pet_profiles (petName, petType, healthInfo) VALUES (?, ?, ?)";

  $stmt = $conn->prepare($sql);
  
  if($stmt !== false){
    $stmt->bind_param("sss", $petName, $petType, $healthInfo);
    $stmt->execute();
    echo "New record created successfully";
    $stmt->close();
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();

// HTML and PHP for Frontend
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Pet Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        form {
            display: flex;
            flex-direction: column;
            width: 300px;
            margin: auto;
        }
        input, textarea, button {
            margin: 10px 0;
        }
    </style>
</head>

<body>

    <h2>Create Your Pet's Profile</h2>

    <form action="" method="post">
        <label for="petName">Pet Name:</label>
        <input type="text" id="petName" name="petName" required>

        <label for="petType">Pet Type:</label>
        <input type="text" id="petType" name="petType" required>

        <label for="healthInfo">Health Info:</label>
        <textarea id="healthInfo" name="healthInfo" required></textarea>

        <button type="submit">Submit</button>
    </form>

</body>

</html>
