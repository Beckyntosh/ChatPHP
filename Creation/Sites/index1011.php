<?php
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

// Create tables if they don't exist
$createClassesTable = "CREATE TABLE IF NOT EXISTS classes (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$createRatingsTable = "CREATE TABLE IF NOT EXISTS ratings (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    class_id INT(6) UNSIGNED,
    rating INT(1),
    review TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (class_id) REFERENCES classes(id)
)";

if (!$conn->query($createClassesTable) || !$conn->query($createRatingsTable)) {
    echo "Error creating table: " . $conn->error;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['title']) && !empty($_POST['description'])) {
        // Inserting a new class
        $stmt = $conn->prepare("INSERT INTO classes (title, description) VALUES (?, ?)");
        $stmt->bind_param("ss", $_POST['title'], $_POST['description']);
        $stmt->execute();
        $stmt->close();
    } elseif (!empty($_POST['class_id']) && !empty($_POST['rating']) && !empty($_POST['review'])) {
        // Inserting a new rating
        $stmt = $conn->prepare("INSERT INTO ratings (class_id, rating, review) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $_POST['class_id'], $_POST['rating'], $_POST['review']);
        $stmt->execute();
        $stmt->close();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fitness Class Rating System</title>
</head>
<body>
    <h1>Add Fitness Class</h1>
    <form method="post">
        <label for="title">Class Title:</label><br>
        <input type="text" id="title" name="title" required><br>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description" required></textarea><br>
        <input type="submit" value="Submit">
    </form>

    <h1>Add Rating</h1>
    <form method="post">
        <label for="class_id">Class:</label><br>
        <select name="class_id" id="class_id">
            <?php
            $result = $conn->query("SELECT id, title FROM classes");
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value=\"" . $row["id"] . "\">" . $row["title"] . "</option>";
                }
            }
            ?>
        </select><br>
        <label for="rating">Rating (1-5):</label><br>
        <input type="number" id="rating" name="rating" min="1" max="5" required><br>
        <label for="review">Review:</label><br>
        <textarea id="review" name="review" required></textarea><br>
        <input type="submit" value="Submit">
    </form>

    <h1>Class Ratings</h1>
    <?php
    $result = $conn->query("SELECT classes.title, ratings.rating, ratings.review FROM ratings INNER JOIN classes ON classes.id = ratings.class_id");
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div><strong>" . $row["title"] . "</strong> - Rating: " . $row["rating"] . "/5<br>" . $row["review"] . "</div><br>";
        }
    } else {
        echo "No ratings yet!";
    }
    ?>

</body>
</html>
<?php
$conn->close();
?>
