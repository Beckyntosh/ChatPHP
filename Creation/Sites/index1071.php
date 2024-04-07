<?php
// Simple Healthcare Provider Rating System in PHP with MySQL
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

// Create table for providers if doesn't exist
$createProvidersTable = "CREATE TABLE IF NOT EXISTS Providers (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

if(!$conn->query($createProvidersTable)){
    echo "Error creating Providers table: " . $conn->error;
}

// Create table for ratings if doesn't exist
$createRatingsTable = "CREATE TABLE IF NOT EXISTS Ratings (
id INT AUTO_INCREMENT PRIMARY KEY,
provider_id INT NOT NULL,
rating INT NOT NULL,
comment TEXT,
FOREIGN KEY (provider_id) REFERENCES Providers(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

if(!$conn->query($createRatingsTable)){
    echo "Error creating Ratings table: " . $conn->error;
}

// Add rating
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['rating'])) {
    $provider_id = $_POST['provider_id'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    $stmt = $conn->prepare("INSERT INTO Ratings (provider_id, rating, comment) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $provider_id, $rating, $comment);

    if($stmt->execute()){
        echo "<p>Rating added successfully</p>";
    } else {
        echo "<p>Error adding rating: " . $conn->error . "</p>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Healthcare Provider Ratings</title>
    <style>
        body {font-family: Arial, sans-serif; line-height: 1.6;}
        .container {width: 80%; margin: auto; overflow: hidden;}
        form {margin: 20px 0;}
        input[type="text"], input[type="number"], textarea {width: 100%; margin: 5px 0; box-sizing: border-box;}
    </style>
</head>
<body>
    <div class="container">
        <h2>Rate Your Healthcare Provider</h2>
        <form action="" method="post">
            <label for="provider_id">Provider</label>
            <select name="provider_id" required>
                <?php 
                $result = $conn->query("SELECT id, name FROM Providers");
                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='".$row['id']."'>".$row['name']."</option>";
                    }
                }
                ?>
            </select>

            <label for="rating">Rating</label>
            <input type="number" name="rating" required min="1" max="5">

            <label for="comment">Comment</label>
            <textarea name="comment"></textarea>

            <input type="submit" value="Submit Rating">
        </form>

        <h3>Latest Ratings</h3>
        <?php
        $ratingsQuery = "SELECT Providers.name, Ratings.rating, Ratings.comment FROM Ratings JOIN Providers ON Providers.id = Ratings.provider_id ORDER BY Ratings.id DESC LIMIT 10";
        $result = $conn->query($ratingsQuery);

        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<p><strong>".$row['name']."</strong>: ".$row['rating']."/5<br>".$row['comment']."</p>";
            }
        } else {
            echo "<p>No ratings found.</p>";
        }
        ?>
    </div>
</body>
</html>
<?php
$conn->close();
?>
