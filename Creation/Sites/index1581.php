<?php
// Define database connection variables
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt to create the artwork table if it doesn't exist
$sqlCreateTable = "CREATE TABLE IF NOT EXISTS artwork (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    artist_name VARCHAR(30) NOT NULL,
    artwork_title VARCHAR(50),
    artwork_description TEXT,
    artwork_image VARCHAR(100),
    reg_date TIMESTAMP
)";
if (!$conn->query($sqlCreateTable)) {
    echo "Error creating table: " . $conn->error;
}

// Check for form submission
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $artist_name = $_POST['artist_name'];
    $artwork_title = $_POST['artwork_title'];
    $artwork_description = $_POST['artwork_description'];
    $artwork_image = $_POST['artwork_image'];

    $sqlInsert = "INSERT INTO artwork (artist_name, artwork_title, artwork_description, artwork_image) VALUES (?, ?, ?, ?)";

    if($stmt = $conn->prepare($sqlInsert)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("ssss", $artist_name, $artwork_title, $artwork_description, $artwork_image);

        // Attempt to execute the prepared statement
        if($stmt->execute()){
            echo "Artwork added successfully.";
        } else{
            echo "Error: Could not execute query: $sqlInsert. " . mysqli_error($conn);
        }

        // Close statement
        $stmt->close();
    }
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Online Art Gallery Entry</title>
    <meta charset="utf-8">
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 80%; margin: 0 auto; }
        form { margin-top: 20px; }
        input, textarea { width: 100%; margin-bottom: 20px; }
        label { font-weight: bold; }
        .submit-btn { cursor: pointer; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Submit New Artwork</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label>Artist Name</label>
            <input type="text" name="artist_name" required>
            <label>Artwork Title</label>
            <input type="text" name="artwork_title" required>
            <label>Artwork Description</label>
            <textarea name="artwork_description" required></textarea>
            <label>Artwork Image URL</label>
            <input type="text" name="artwork_image" required>
            <input type="submit" class="submit-btn" value="Submit">
        </form>
    </div>
</body>
</html>
