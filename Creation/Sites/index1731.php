<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database configuration
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

    // SQL to create table if not exists
    $sql = "CREATE TABLE IF NOT EXISTS pets (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        pet_name VARCHAR(30) NOT NULL,
        pet_type VARCHAR(30) NOT NULL,
        health_info TEXT NOT NULL,
        reg_date TIMESTAMP
    )";

    if ($conn->query($sql) === TRUE) {
        //echo "Table pets created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO pets (pet_name, pet_type, health_info) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $pet_name, $pet_type, $health_info);

    // Set parameters and execute
    $pet_name = $_POST['pet_name'];
    $pet_type = $_POST['pet_type'];
    $health_info = $_POST['health_info'];
    $stmt->execute();

    echo "New pet profile created successfully";

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pet Care App - Create Pet Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        form {
            width: 300px;
            padding: 20px;
            border: 1px solid #ccc;
            margin: auto;
        }
        input[type=text], textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 10px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #45a049;
        }
        .container {
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Create a Profile for Your Pet</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="pet_name">Pet Name:</label>
        <input type="text" id="pet_name" name="pet_name" required>

        <label for="pet_type">Pet Type:</label>
        <input type="text" id="pet_type" name="pet_type" required>

        <label for="health_info">Health Info:</label>
        <textarea id="health_info" name="health_info" required></textarea>

        <input type="submit" value="Create Profile">
    </form>
</div>
</body>
</html>
