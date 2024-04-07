<!DOCTYPE html>
<html>
<head>
    <title>Time Zone Converter - Spirits Website</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .container {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            max-width: 600px;
            margin: auto;
        }
        h1 {
            color: #444;
        }
        .form-control {
            margin-bottom: 10px;
            display: flex;
            flex-direction: column;
        }
        .form-control label {
            margin-bottom: 5px;
        }
        .form-control input, .form-control select {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Time Zone Converter</h1>
        <form id="timezoneForm">
            <div class="form-control">
                <label for="time">Time (e.g. 9:00 AM):</label>
                <input type="text" id="time" name="time" required>
            </div>
            <div class="form-control">
                <label for="fromTimeZone">From Time Zone:</label>
                <select id="fromTimeZone" name="fromTimeZone" required>
                    <option value="America/New_York">EST</option>
                </select>
            </div>
            <div class="form-control">
                <label for="toTimeZone">To Time Zone:</label>
                <select id="toTimeZone" name="toTimeZone" required>
                    <option value="Europe/London">London</option>
                </select>
            </div>
            <button type="button" onclick="convertTime()">Convert</button>
        </form>
        <p id="result"></p>
    </div>

    <script>
        function convertTime() {
            const time = document.getElementById('time').value;
            const fromTimeZone = document.getElementById('fromTimeZone').value;
            const toTimeZone = document.getElementById('toTimeZone').value;

            const date = new Date(`2023-01-01T${time}:00.000Z`);
            const options = { hour: '2-digit', minute: '2-digit', timeZone: toTimeZone, hour12: true };
            
            const convertedTime = new Intl.DateTimeFormat('en-US', options).format(date);

            document.getElementById('result').textContent = `Converted Time: ${convertedTime}`;
        }
    </script>
</body>
</html>

<?php
// Database connection
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
$sql = "CREATE TABLE IF NOT EXISTS TimezoneConversions (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fromTimezone VARCHAR(50) NOT NULL,
toTimezone VARCHAR(50) NOT NULL,
convertedTime VARCHAR(50) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table TimezoneConversions created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>