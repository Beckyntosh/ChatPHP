<?php

// Set up the connection variables
$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if they don't exist
$createTablesSql = "
CREATE TABLE IF NOT EXISTS destinations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    city VARCHAR(255) NOT NULL,
    country VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS hotels (
    id INT AUTO_INCREMENT PRIMARY KEY,
    destination_id INT,
    name VARCHAR(255) NOT NULL,
    booking_url VARCHAR(255),
    FOREIGN KEY (destination_id) REFERENCES destinations(id)
);

CREATE TABLE IF NOT EXISTS flights (
    id INT AUTO_INCREMENT PRIMARY KEY,
    departure_city VARCHAR(255) NOT NULL,
    arrival_city VARCHAR(255) NOT NULL,
    flight_details VARCHAR(255)
);
";

if (!$conn->multi_query($createTablesSql)) {
    echo "Error creating tables: " . $conn->error;
}

// Wait for multi_query to finish
do {
    if ($res = $conn->store_result()) {
        $res->free();
    }
} while ($conn->more_results() && $conn->next_result());

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Planner</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        header {
            background: #50a3a2;
            color: #fff;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #077187 1px solid;
        }
        header h1 {
            text-align: center;
            margin: 0;
            padding-bottom: 10px;
        }
        input[type="text"], input[type="url"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }
        input[type="submit"]:hover {
            opacity:1;
        }
        .input-group {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Travel Planner for Your Wines Website</h1>
        </div>
    </header>

    <div class="container">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <h2>Add a New Destination</h2>
            <div class="input-group">
                <label for="city">City</label>
                <input type="text" name="city" id="city" required>
            </div>
            <div class="input-group">
                <label for="country">Country</label>
                <input type="text" name="country" id="country" required>
            </div>
            <input type="submit" name="addDestination" value="Add Destination">
        </form>
    </div>

    <?php
    if (isset($_POST['addDestination'])) {
        $city = $_POST['city'];
        $country = $_POST['country'];

        $stmt = $conn->prepare("INSERT INTO destinations (city, country) VALUES (?, ?)");
        $stmt->bind_param("ss", $city, $country);

        if ($stmt->execute()) {
            echo "<p>Destination added successfully.</p>";
        } else {
            echo "<p>Error adding destination: " . $stmt->error . "</p>";
        }

        $stmt->close();
    }
    ?>

</body>
</html>

<?php $conn->close(); ?>
