<?php
// Define MySQL connection parameters
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Establish MySQL connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if it doesn't exist
$tableQuery = "CREATE TABLE IF NOT EXISTS paint_calculations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    length FLOAT NOT NULL,
    width FLOAT NOT NULL,
    height FLOAT NOT NULL,
    coats INT NOT NULL,
    paint_needed FLOAT NOT NULL,
    calculation_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if (!$conn->query($tableQuery)) {
    die("Error creating table: " . $conn->error);
}

// Function to calculate paint needed
function calculatePaint($length, $width, $height, $coats){
    $area = 2 * $height * ($length + $width); // 2 walls each for length and width
    $coveragePerLitre = 10; // Assume 1 litre covers 10 square meters
    $paintNeeded = ($area / $coveragePerLitre) * $coats;
    return $paintNeeded;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $length = floatval($_POST['length']);
    $width = floatval($_POST['width']);
    $height = floatval($_POST['height']);
    $coats = intval($_POST['coats']);

    $paintNeeded = calculatePaint($length, $width, $height, $coats);

    // Insert calculation into database
    $insertQuery = $conn->prepare("INSERT INTO paint_calculations (length, width, height, coats, paint_needed) VALUES (?, ?, ?, ?, ?)");
    $insertQuery->bind_param("fffff", $length, $width, $height, $coats, $paintNeeded);

    if ($insertQuery->execute()) {
        echo "Calculation saved successfully!";
    } else {
        echo "Error saving calculation: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Paint Coverage Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            text-align: center;
            padding: 20px;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            margin: auto;
            width: 50%;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input, button {
            padding: 10px;
            margin: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        button {
            cursor: pointer;
            background-color: #5cb85c;
            color: white;
            border: none;
        }
        button:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Paint Coverage Calculator</h2>
    <form action="" method="post">
        <input type="number" step="0.1" name="length" required placeholder="Room Length (m)"><br>
        <input type="number" step="0.1" name="width" required placeholder="Room Width (m)"><br>
        <input type="number" step="0.1" name="height" required placeholder="Room Height (m)"><br>
        <input type="number" name="coats" required placeholder="Number of Coats"><br>
        <button type="submit">Calculate</button>
    </form>
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <p><b>Paint Required:</b> <?=number_format($paintNeeded, 2)?> Litres</p>
    <?php endif; ?>
</div>
</body>
</html>
<?php $conn->close(); ?>