<?php
// Define MySQL connection parameters
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

// Create table if it does not exist
$tableCreationQuery = "CREATE TABLE IF NOT EXISTS paint_calculations (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    room_name VARCHAR(30) NOT NULL,
    length DECIMAL(5,2) NOT NULL,
    width DECIMAL(5,2) NOT NULL,
    height DECIMAL(5,2) NOT NULL,
    coats INT(5) NOT NULL,
    paint_needed DECIMAL(10,2) NOT NULL,
    calculation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if (!$conn->query($tableCreationQuery)) {
    echo "Error creating table: " . $conn->error;
}

// Function to insert calculation result
function insertCalculationResult($conn, $room, $length, $width, $height, $coats, $paint_needed){
    $stmt = $conn->prepare("INSERT INTO paint_calculations (room_name, length, width, height, coats, paint_needed) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sdddid", $room, $length, $width, $height, $coats, $paint_needed);
    $stmt->execute();
}

// Calculate the amount of paint needed
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $length = $_POST['length'];
    $width = $_POST['width'];
    $height = $_POST['height'];
    $coats = $_POST['coats'];
    $room = $_POST['room_name'];

    // Assuming 1 liter of paint covers 10 square meters
    $coverage_per_liter = 10;

    // Total area to paint = 2*height*(length+width)
    $total_area = 2 * $height * ($length + $width);

    // Paint needed = (Total area * coats) / coverage_per_liter
    $paint_needed = ($total_area * $coats) / $coverage_per_liter;

    insertCalculationResult($conn, $room, $length, $width, $height, $coats, $paint_needed);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Paint Coverage Calculator</title>
</head>
<body>
    <h2>Paint Coverage Calculator</h2>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        Room Name: <input type="text" name="room_name" required><br>
        Length (m): <input type="number" step="0.01" name="length" required><br>
        Width (m): <input type="number" step="0.01" name="width" required><br>
        Height (m): <input type="number" step="0.01" name="height" required><br>
        Number of Coats: <input type="number" name="coats" required><br>
        <input type="submit" value="Calculate">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<p>To paint the {$room}, with dimensions {$length}m x {$width}m x {$height}m, covering {$coats} coats, you will need <strong>{$paint_needed} liters</strong> of paint.</p>";
    }
    ?>
</body>
</html>

<?php
$conn->close();
?>
