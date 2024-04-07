<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Historical Weather Data Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #2E5266;
            background-color: #E0E1DD;
        }
        .container {
            width: 60%;
            margin: auto;
            padding: 20px;
        }
        form {
            margin: 20px 0;
        }
        input[type=text], input[type=date] {
            padding: 10px;
            margin: 5px;
            width: calc(50% - 22px);
        }
        button {
            padding: 10px 20px;
            cursor: pointer;
            background-color: #5C946E;
            color: white;
            border: none;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #4C5B5C;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Search for Historical Weather Data</h2>
        <form method="post">
            <input type="date" name="date" required>
            <input type="text" name="location" placeholder="Location" required>
            <button type="submit" name="search">Search</button>
        </form>
        <?php
        $servername = "db";
        $username = "root";
        $password = "root";
        $dbname = "my_database";

        if (isset($_POST['search'])) {
            // Database connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $date = $_POST['date'];
            $location = $_POST['location'];

            // Check cache first
            $cacheTable = "weather_data_cache";
            $cacheCheck = "SELECT * FROM $cacheTable WHERE location = '$location' AND date = '$date'";
            $cacheResult = $conn->query($cacheCheck);

            if ($cacheResult->num_rows > 0) {
                // Use cached data
                $row = $cacheResult->fetch_assoc();
                echo "<table><tr><th>Date</th><th>Location</th><th>Temperature</th></tr>";
                echo "<tr><td>" . $date . "</td><td>" . $location . "</td><td>" . $row['temperature'] ." °C</td></tr>";
                echo "</table>";
            } else {
                // Simulate fetching data from an external API (this part is fictional for this example)
                $temperature = rand(15, 30); // Example temperature
                
                // Insert into cache
                $cacheInsert = "INSERT INTO $cacheTable (date, location, temperature) VALUES ('$date', '$location', '$temperature')";
                if ($conn->query($cacheInsert) === TRUE) {
                    echo "<table><tr><th>Date</th><th>Location</th><th>Temperature</th></tr>";
                    echo "<tr><td>" . $date . "</td><td>" . $location . "</td><td>" . $temperature ." °C</td></tr>";
                    echo "</table>";
                } else {
                    echo "Error: " . $cacheInsert . "<br>" . $conn->error;
                }
            }
            $conn->close();
        }
        ?>
    </div>
</body>
</html>