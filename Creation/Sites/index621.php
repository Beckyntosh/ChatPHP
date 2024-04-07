<?php
// Connection parameters
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

// Creating the events table if it does not exist
$createEventsTable = "CREATE TABLE IF NOT EXISTS events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    description TEXT,
    date DATE,
    time TIME,
    capacity INT
);";

if ($conn->query($createEventsTable) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// HTML and PHP to handle Event Registration
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoes Counseling and Therapy Service - Event Registration</title>
    <style>
        body {
            background-color: #0A0F23;
            color: #C1C8E4;
            font-family: Arial, sans-serif;
        }
        .container {
            width: 600px;
            margin: 0 auto;
        }
        input[type=text], input[type=date], input[type=time], input[type=number], input[type=submit] {
            margin-top: 10px;
            padding: 8px;
            width: calc(100% - 20px);
            box-sizing: border-box;
            border-radius: 4px;
            border: 1px solid #2d2f5b;
            background: #1c2033;
            color: #C1C8E4;
        }
        input[type=submit] {
            cursor: pointer;
            background: #3D426B;
            color: #FFF;
        }
        input[type=submit]:hover {
            background: #2d2f5b;
        }
        .event-form {
            border-radius: 5px;
            background: #161A3C;
            padding: 20px;
            margin-top: 20px;
        }
        .event-form h2 {
            color: #D9D4E7;
        }
        .message {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="event-form">
            <h2>Event Registration Form</h2>
            <form action="" method="post">
                <input type="text" name="title" placeholder="Event Title" required><br>
                <textarea name="description" placeholder="Event Description" required style="width: calc(100% - 20px); margin-top: 10px; padding: 8px; height: 100px; background: #1c2033; color: #C1C8E4; border: 1px solid #2d2f5b; border-radius: 4px;"></textarea><br>
                <input type="date" name="date" required><br>
                <input type="time" name="time" required><br>
                <input type="number" name="capacity" placeholder="Capacity" required><br>
                <input type="submit" name="register" value="Register Event">
            </form>
            <?php
                if(isset($_POST['register'])) {
                    $title = $conn->real_escape_string($_POST['title']);
                    $description = $conn->real_escape_string($_POST['description']);
                    $date = $conn->real_escape_string($_POST['date']);
                    $time = $conn->real_escape_string($_POST['time']);
                    $capacity = $conn->real_escape_string($_POST['capacity']);

                    $insertEvent = "INSERT INTO events (title, description, date, time, capacity) VALUES ('$title', '$description', '$date', '$time', '$capacity')";

                    if ($conn->query($insertEvent) === TRUE) {
                        echo "<div class='message'>New event registered successfully!</div>";
                    } else {
                        echo "<div class='message'>Error: " . $insertEvent . "<br>" . $conn->error . "</div>";
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>
<?php $conn->close(); ?>