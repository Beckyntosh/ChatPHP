<?php
// Check if form was submitted:
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connection info
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

    $plant_name = $_POST['plant_name'];
    $care_schedule = $_POST['care_schedule'];

    $sql = "INSERT INTO GardeningTracker (plant_name, care_schedule) VALUES (?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $plant_name, $care_schedule);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}

// Generate the HTML form
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add a Plant to Gardening Tracker</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            width: 400px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input[type=text], textarea {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type=submit] {
            background-color: #5aab5a;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #498949;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Add a Plant to Gardening Tracker</h2>
    <form action="" method="post">
        <label for="plant_name">Plant Name:</label>
        <input type="text" id="plant_name" name="plant_name" required>

        <label for="care_schedule">Care Schedule:</label>
        <textarea id="care_schedule" name="care_schedule" required></textarea>

        <input type="submit" value="Add Plant">
    </form>
</div>
</body>
</html>

<?php

// At the first run, make sure to create the GardeningTracker table
*
CREATE TABLE GardeningTracker (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    plant_name VARCHAR(30) NOT NULL,
    care_schedule TEXT NOT NULL,
    reg_date TIMESTAMP
)
*/
?>
