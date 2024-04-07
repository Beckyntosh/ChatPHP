<?php
//Database connection
$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Creating table if it doesn't exist
    $sql = "CREATE TABLE IF NOT EXISTS travel_plans (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        destination VARCHAR(30) NOT NULL,
        departure_date DATE NOT NULL,
        return_date DATE NOT NULL,
        flight_info TEXT,
        hotel_info TEXT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
    $conn->exec($sql);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}

// Post method to insert data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destination = $_POST['destination'];
    $departure_date = $_POST['departure_date'];
    $return_date = $_POST['return_date'];
    $flight_info = $_POST['flight_info'];
    $hotel_info = $_POST['hotel_info'];
    
    $sql = "INSERT INTO travel_plans (destination, departure_date, return_date, flight_info, hotel_info) VALUES (?, ?, ?, ?, ?)";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$destination, $departure_date, $return_date, $flight_info, $hotel_info]);
    
    header("Location: ".$_SERVER['PHP_SELF']);
    die;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Travel Plan App</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 90%; margin: auto; }
        .form-group { margin-bottom: 15px; }
        label { display: block; }
        input[type="text"],
        input[type="date"],
        textarea { width: 100%; padding: 8px; }
        button { padding: 10px 15px; background-color: #4CAF50; color: white; border: none; cursor: pointer; }
        button:hover { background-color: #45a049; }
        table { width: 100%; border-collapse: collapse; }
        th, td { text-align: left; padding: 8px; border-bottom: 1px solid #ddd; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

<div class="container">
    <h2>Add Travel Plan</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="form-group">
            <label for="destination">Destination:</label>
            <input type="text" id="destination" name="destination" required>
        </div>
        <div class="form-group">
            <label for="departure_date">Departure Date:</label>
            <input type="date" id="departure_date" name="departure_date" required>
        </div>
        <div class="form-group">
            <label for="return_date">Return Date:</label>
            <input type="date" id="return_date" name="return_date" required>
        </div>
        <div class="form-group">
            <label for="flight_info">Flight Information:</label>
            <textarea id="flight_info" name="flight_info"></textarea>
        </div>
        <div class="form-group">
            <label for="hotel_info">Hotel Information:</label>
            <textarea id="hotel_info" name="hotel_info"></textarea>
        </div>
        <button type="submit">Submit</button>
    </form>
    
    <h2>Your Travel Plans</h2>
    <table>
        <tr>
            <th>Destination</th>
            <th>Departure Date</th>
            <th>Return Date</th>
            <th>Flight Information</th>
            <th>Hotel Information</th>
        </tr>
        <?php
        $stmt = $conn->prepare("SELECT destination, departure_date, return_date, flight_info, hotel_info FROM travel_plans");
        $stmt->execute();
        
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach(new RecursiveArrayIterator($stmt->fetchAll()) as $k=>$v) {
            echo "<tr>";
            echo "<td>".$v["destination"]."</td>";
            echo "<td>".$v["departure_date"]."</td>";
            echo "<td>".$v["return_date"]."</td>";
            echo "<td>".$v["flight_info"]."</td>";
            echo "<td>".$v["hotel_info"]."</td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>

</body>
</html>
