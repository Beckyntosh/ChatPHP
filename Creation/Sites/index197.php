<?php
// Set up database connection
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

// Create table if it doesn't exist
$tableSql = "CREATE TABLE IF NOT EXISTS pet_profiles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
pet_name VARCHAR(30) NOT NULL,
pet_type VARCHAR(30),
pet_breed VARCHAR(50),
owner_name VARCHAR(50),
health_info TEXT,
dietary_info TEXT,
reg_date TIMESTAMP
)";

if ($conn->query($tableSql) === TRUE) {
  // echo "Table pet_profiles created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Insert pet profile
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pet_name = $_POST['pet_name'];
    $pet_type = $_POST['pet_type'];
    $pet_breed = $_POST['pet_breed'];
    $owner_name = $_POST['owner_name'];
    $health_info = $_POST['health_info'];
    $dietary_info = $_POST['dietary_info'];

    $insertSql = "INSERT INTO pet_profiles (pet_name, pet_type, pet_breed, owner_name, health_info, dietary_info)
    VALUES ('$pet_name', '$pet_type', '$pet_breed', '$owner_name', '$health_info', '$dietary_info')";

    if ($conn->query($insertSql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $insertSql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Pet Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }
        .container {
            background: white;
            padding: 20px;
            max-width: 600px;
            margin: 20px auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type=text], textarea {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            box-sizing: border-box; /* Added for CSS box model consistency */
        }
        input[type=submit] {
            background-color: #5c8df9;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #3c6ecc;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Create Pet Profile</h2>
    <form action="" method="post">
        <label for="pet_name">Pet Name:</label>
        <input type="text" id="pet_name" name="pet_name" required>

        <label for="pet_type">Pet Type (e.g., Dog, Cat):</label>
        <input type="text" id="pet_type" name="pet_type" required>

        <label for="pet_breed">Pet Breed:</label>
        <input type="text" id="pet_breed" name="pet_breed" required>

        <label for="owner_name">Owner Name:</label>
        <input type="text" id="owner_name" name="owner_name" required>

        <label for="health_info">Health Information:</label>
        <textarea id="health_info" name="health_info" rows="4" required></textarea>

        <label for="dietary_info">Dietary Information:</label>
        <textarea id="dietary_info" name="dietary_info" rows="4" required></textarea>

        <input type="submit" value="Create Profile">
    </form>
</div>

</body>
</html>

<?php
$conn->close();
?>