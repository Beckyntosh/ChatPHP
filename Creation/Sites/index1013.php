<?php
// Initialize the connection variables
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
$tables_sql = "CREATE TABLE IF NOT EXISTS Classes (
    class_id INT AUTO_INCREMENT PRIMARY KEY, 
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL
);
CREATE TABLE IF NOT EXISTS Instructors (
    instructor_id INT AUTO_INCREMENT PRIMARY KEY, 
    name VARCHAR(255) NOT NULL
);
CREATE TABLE IF NOT EXISTS Reviews (
    review_id INT AUTO_INCREMENT PRIMARY KEY,
    class_id INT, 
    instructor_id INT, 
    member_name VARCHAR(255), 
    rating INT NOT NULL, 
    comment TEXT,
    FOREIGN KEY (class_id) REFERENCES Classes(class_id),
    FOREIGN KEY (instructor_id) REFERENCES Instructors(instructor_id)
);";

if ($conn->multi_query($tables_sql) === TRUE) {
    // Wait for multi queries to finish
    do {
        if ($result = $conn->store_result()) {
            $result->free();
        }
    } while ($conn->next_result());
} else {
    echo "Error creating tables: " . $conn->error;
}

// Insert logic and form handling
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_review'])) {
    $class_id = $_POST['class_id'];
    $instructor_id = $_POST['instructor_id'];
    $member_name = $_POST['member_name'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    $sql = "INSERT INTO Reviews (class_id, instructor_id, member_name, rating, comment) VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iisis", $class_id, $instructor_id, $member_name, $rating, $comment);

    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// HTML + PHP for showing forms and existing data
?>
<!DOCTYPE html>
<html>
<head>
    <title>Fitness Class Ratings</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f0f0; color: #333; }
        .container { width: 80%; margin: auto; background-color: #fff; padding: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        form { margin-top: 20px; }
        input, select, textarea { width: 100%; margin-bottom: 20px; padding: 10px; }
        input[type=submit] { background-color: #5cb85c; color: white; cursor: pointer; }
        input[type=submit]:hover { background-color: #4cae4c; }
    </style>
</head>
<body>
<div class="container">
    <h1>Class & Instructor Rating System</h1>
    <form action="" method="post">
        <label for="class_id">Class:</label>
        <select id="class_id" name="class_id">
            <?php
            $class_query = "SELECT * FROM Classes";
            $class_result = $conn->query($class_query);
            while($row = $class_result->fetch_assoc()) {
                echo "<option value='" . $row['class_id'] . "'>" . $row['title'] . "</option>";
            }
            ?>
        </select>

        <label for="instructor_id">Instructor:</label>
        <select id="instructor_id" name="instructor_id">
            <?php
            $instructor_query = "SELECT * FROM Instructors";
            $instructor_result = $conn->query($instructor_query);
            while($row = $instructor_result->fetch_assoc()) {
                echo "<option value='" . $row['instructor_id'] . "'>" . $row['name'] . "</option>";
            }
            ?>
        </select>

        <label for="member_name">Your Name:</label>
        <input type="text" id="member_name" name="member_name">

        <label for="rating">Rating (1-5):</label>
        <input type="number" id="rating" name="rating" min="1" max="5">

        <label for="comment">Comment:</label>
        <textarea id="comment" name="comment"></textarea>

        <input type="submit" name="submit_review" value="Submit Review">
    </form>

    <h2>Reviews</h2>
    <?php
    $reviews_query = "SELECT Classes.title AS class_title, Instructors.name AS instructor_name, Reviews.member_name, Reviews.rating, Reviews.comment FROM Reviews JOIN Classes ON Reviews.class_id = Classes.class_id JOIN Instructors ON Reviews.instructor_id = Instructors.instructor_id";
    $reviews_result = $conn->query($reviews_query);
    while($row = $reviews_result->fetch_assoc()) {
        echo "<div><h4>" . $row['class_title'] . " by " . $row['instructor_name'] . "</h4><p>Rated " . $row['rating'] . " by " . $row['member_name'] . "</p><p>" . $row['comment'] . "</p></div>";
    }
    ?>
</div>
</body>
</html>
<?php
$conn->close();
?>
