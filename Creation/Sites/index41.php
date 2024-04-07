<?php
$servername = "db";
$username = "root";
$password = 'root';
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create courses table if it does not exist
$createTable = "CREATE TABLE IF NOT EXISTS courses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    duration INT(10),
    difficulty_level VARCHAR(30),
    instructor_rating INT(2),
    reg_date TIMESTAMP
)";

if ($conn->query($createTable) === TRUE) {
    //echo "Table courses created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$search = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect value of input field
    $search = $_POST['search'];
    $duration = $_POST['duration'];
    $difficulty_level = $_POST['difficulty_level'];
    $instructor_rating = $_POST['instructor_rating'];

    $sql = "SELECT * FROM courses WHERE title LIKE '%$search%' 
            AND (duration <= $duration OR $duration = 0) 
            AND difficulty_level LIKE '%$difficulty_level%'
            AND (instructor_rating >= $instructor_rating OR $instructor_rating = 0)";
} else {
    $sql = "SELECT * FROM courses";
}
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Online Learning Courses Search</title>
    <style>
        body {font-family: Arial, sans-serif;}
        .container {max-width: 1200px; margin: auto; padding: 20px;}
        table {width: 100%; border-collapse: collapse;}
        th, td {padding: 8px; text-align: left; border-bottom: 1px solid #ddd;}
    </style>
</head>
<body>

<div class="container">
    <h2>Search for Online Learning Courses</h2>
    <form method="POST">
        <label for="search">Course Title:</label><br>
        <input type="text" id="search" name="search" value=""><br>
        <label for="duration">Max Duration (Hours):</label><br>
        <input type="number" id="duration" name="duration" value="0"><br>
        <label for="difficulty_level">Difficulty Level:</label><br>
        <input type="text" id="difficulty_level" name="difficulty_level" value=""><br>
        <label for="instructor_rating">Minimum Instructor Rating (1-5):</label><br>
        <input type="number" id="instructor_rating" name="instructor_rating" value="0" min="1" max="5"><br><br>
        <input type="submit" value="Search">
    </form>
    <h3>Search Results:</h3>
    <table>
        <tr>
            <th>Title</th>
            <th>Duration (Hours)</th>
            <th>Difficulty Level</th>
            <th>Instructor Rating</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                      <td>".$row["title"]."</td>
                      <td>".$row["duration"]."</td>
                      <td>".$row["difficulty_level"]."</td>
                      <td>".$row["instructor_rating"]."</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No results found</td></tr>";
        }
        ?>
    </table>
</div>

</body>
</html>
<?php $conn->close(); ?>