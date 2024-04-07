<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Paint Coverage Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: auto;
            padding: 20px;
        }
        .form-input {
            margin-bottom: 10px;
        }
        .form-input label {
            margin-right: 10px;
        }
        .form-input input[type="text"],
        .form-input input[type="number"] {
            padding: 8px;
            width: 100px;
        }
        .result {
            margin-top: 20px;
            padding: 10px;
            background-color: #f0f0f0;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h2>Paint Coverage Calculator</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-input">
            <label for="room_width">Room Width (ft):</label>
            <input type="number" id="room_width" name="room_width" required>
        </div>
        <div class="form-input">
            <label for="room_length">Room Length (ft):</label>
            <input type="number" id="room_length" name="room_length" required>
        </div>
        <div class="form-input">
            <label for="room_height">Room Height (ft):</label>
            <input type="number" id="room_height" name="room_height" required>
        </div>
        <div class="form-input">
            <label for="coats">Number of Coats:</label>
            <input type="number" id="coats" name="coats" required>
        </div>
        <input type="submit" value="Calculate">
    </form>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $width = $_POST['room_width'];
        $length = $_POST['room_length'];
        $height = $_POST['room_height'];
        $coats = $_POST['coats'];

        $coveragePerGallon = 350; // One gallon covers approximately 350 square feet

        // Calculate total room area to be painted
        $totalArea = ($width * $height * 2) + ($length * $height * 2);
        $totalPaintNeeded = ($totalArea / $coveragePerGallon) * $coats;

        echo "<div class='result'>You will need approximately " . round($totalPaintNeeded, 2) . 
                " gallons of paint to cover the room.</div>";

        // Database insertion
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
        
        $sql = "INSERT INTO paint_calculations (width, length, height, coats, paint_needed)
                VALUES ('$width', '$length', '$height', '$coats', '$totalPaintNeeded')";
        
        if ($conn->query($sql) === TRUE) {
            echo "<div class='result'>New record created successfully</div>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    ?>
</body>
</html>

