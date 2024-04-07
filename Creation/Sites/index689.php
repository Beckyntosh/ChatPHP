<?php
// Settings for database connection
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

// Check if flight search table exists, if not create it
$checkTable = "CREATE TABLE IF NOT EXISTS flight_search (
    id INT AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(255),
    departure_date DATE,
    return_date DATE
);";
$conn->query($checkTable);

// Form submission logic
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["search"])) {
    $destination = $_POST['destination'];
    $departure_date = $_POST['departure_date'];
    $return_date = $_POST['return_date'];

    // Insert search query into flight_search table (Example purpose, might not make sense for a beers webshop)
    $insertQuery = "INSERT INTO flight_search (destination, departure_date, return_date) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("sss", $destination, $departure_date, $return_date);
    $stmt->execute();
    $stmt->close();

    // Ideally, here would be API call to search flights based on input data or search within an existing table with flight details
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Cosmic Voyage Craft Beers</title>
    <style>
        body {
            background-color: #000;
            color: #fff;
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            margin: auto;
            padding-top: 20px;
        }
        input, button {
            padding: 10px;
            margin-bottom: 10px;
        }
        .search-results {
            padding-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Cosmic Voyage Craft Beers - Flight Search (Demo)</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="destination">Destination:</label>
            <input type="text" id="destination" name="destination" required><br>
            <label for="departure_date">Departure Date:</label>
            <input type="date" id="departure_date" name="departure_date" required><br>
            <label for="return_date">Return Date:</label>
            <input type="date" id="return_date" name="return_date" required><br>
            <button type="submit" name="search">Search Flights</button>
        </form>

        <div class="search-results">
            <h2>Recent Searches</h2>
            <?php
            // Fetch and display recent searches
            $query = "SELECT * FROM flight_search ORDER BY id DESC LIMIT 5";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<p>Destination: " . $row["destination"]. " - Departure: " . $row["departure_date"]. " - Return: " . $row["return_date"]. "</p>";
                }
            } else {
                echo "<p>No recent searches found.</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>
<?php
$conn->close();
?>