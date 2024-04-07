<?php
$mysql_root = 'root';
$mysql_db = 'my_database';
$servername = 'db';

// Create connection to the database
$conn = new mysqli($servername, 'root', $mysql_root, $mysql_db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create travel plans table if it doesn't exist
$createTableSql = "CREATE TABLE IF NOT EXISTS travel_plans (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(30) NOT NULL,
    departure_date DATE NOT NULL,
    return_date DATE NOT NULL,
    flight_details VARCHAR(255),
    hotel_details VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if (!$conn->query($createTableSql)) {
    die("Error creating table: " . $conn->error);
}

// Insert new travel plan from the form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destination = $_POST['destination'];
    $departure_date = $_POST['departure_date'];
    $return_date = $_POST['return_date'];
    $flight_details = $_POST['flight_details'];
    $hotel_details = $_POST['hotel_details'];

    $insertSql = "INSERT INTO travel_plans (destination, departure_date, return_date, flight_details, hotel_details)
    VALUES ('$destination', '$departure_date', '$return_date', '$flight_details', '$hotel_details')";

    if (!$conn->query($insertSql)) {
        die("Error: " . $sql . "<br>" . $conn->error);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Travel Plan App</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }
        form, table {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
        }
        input[type=text], input[type=date] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
        }
        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<h2>Add a New Travel Plan</h2>

<form action="" method="post">
    <label for="destination">Destination:</label>
    <input type="text" id="destination" name="destination" required>
    <label for="departure_date">Departure Date:</label>
    <input type="date" id="departure_date" name="departure_date" required>
    <label for="return_date">Return Date:</label>
    <input type="date" id="return_date" name="return_date" required>
    <label for="flight_details">Flight Details:</label>
    <input type="text" id="flight_details" name="flight_details">
    <label for="hotel_details">Hotel Details:</label>
    <input type="text" id="hotel_details" name="hotel_details">
    <input type="submit" value="Add Travel Plan">
</form>

<h2>Current Travel Plans</h2>
<table>
    <tr>
        <th>Destination</th>
        <th>Departure Date</th>
        <th>Return Date</th>
        <th>Flight Details</th>
        <th>Hotel Details</th>
    </tr>
    <?php
    $sql = "SELECT id, destination, departure_date, return_date, flight_details, hotel_details FROM travel_plans";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".htmlspecialchars($row["destination"])."</td>
                    <td>".htmlspecialchars($row["departure_date"])."</td>
                    <td>".htmlspecialchars($row["return_date"])."</td>
                    <td>".htmlspecialchars($row["flight_details"])."</td>
                    <td>".htmlspecialchars($row["hotel_details"])."</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No travel plans found</td></tr>";
    }
    ?>
</table>

</body>
</html>

<?php
$conn->close();
?>
