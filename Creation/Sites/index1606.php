<?php
// Connection parameters
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
try{
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Create events table if it doesn't exist
try {
    $createTableSQL = "CREATE TABLE IF NOT EXISTS events (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        event_date DATE NOT NULL,
        capacity INT DEFAULT 0,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $pdo->exec($createTableSQL);
} catch(PDOException $e){
    die("ERROR: Could not create table. " . $e->getMessage());
}

// Handling form submission
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate user input
    $title = trim($_POST["title"]);
    $date = trim($_POST["date"]);
    $capacity = trim($_POST["capacity"]);
    
    if(!empty($title) && !empty($date) && !empty($capacity) && is_numeric($capacity)){
        // Prepare an insert statement
        $sql = "INSERT INTO events (title, event_date, capacity) VALUES (:title, :event_date, :capacity)";
         
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":title", $param_title);
            $stmt->bindParam(":event_date", $param_date);
            $stmt->bindParam(":capacity", $param_capacity);
            
            // Set parameters
            $param_title = $title;
            $param_date = $date;
            $param_capacity = $capacity;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                echo "<script>alert('Event successfully added.');</script>";
            } else{
                echo "<script>alert('Oops! Something went wrong. Please try again later.');</script>";
            }

            unset($stmt);
        }
    }
    
    unset($pdo);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Virtual Event Calendar</title>
</head>
<body>
    <h2>Add a Virtual Book Club Meeting</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
            <label>Title:</label>
            <input type="text" name="title" required>
        </div>
        <div>
            <label>Date:</label>
            <input type="date" name="date" required>
        </div>
        <div>
            <label>Capacity:</label>
            <input type="number" name="capacity" required>
        </div>
        <div>
            <input type="submit" value="Add Event">
        </div>
    </form>

    <h2>Upcoming Events</h2>
    <?php 
    // Attempt select query execution
    $sql = "SELECT * FROM events WHERE event_date >= CURDATE() ORDER BY event_date ASC";
    if($result = $pdo->query($sql)){
        if($result->rowCount() > 0){
            echo "<table>";
                echo "<tr>";
                    echo "<th>Title</th>";
                    echo "<th>Date</th>";
                    echo "<th>Capacity</th>";
                echo "</tr>";
            while($row = $result->fetch()){
                echo "<tr>";
                    echo "<td>" . $row['title'] . "</td>";
                    echo "<td>" . $row['event_date'] . "</td>";
                    echo "<td>" . $row['capacity'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            unset($result);
        } else{
            echo "<p>No upcoming events found.</p>";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . $pdo->error;
    }
    
    // Close connection
    unset($pdo);
    ?>
</body>
</html>
