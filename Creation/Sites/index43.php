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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS courses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255) NOT NULL,
duration INT(3),
difficulty VARCHAR(50),
instructor_rating FLOAT,
reg_date TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Search functionality
$search = $_GET['search'] ?? '';
$duration = $_GET['duration'] ?? '';
$difficulty = $_GET['difficulty'] ?? '';
$rating = $_GET['rating'] ?? '';

$query = "SELECT * FROM courses WHERE title LIKE ? ";

if (!empty($duration)) {
    $query .= "AND duration <= ? ";
}

if (!empty($difficulty)) {
    $query .= "AND difficulty = ? ";
}

if (!empty($rating)) {
    $query .= "AND instructor_rating >= ? ";
}

$stmt = $conn->prepare($query);

$params = ["%$search%"];
$types = "s";

if (!empty($duration)) {
    $params[] = $duration;
    $types .= "i";
}

if (!empty($difficulty)) {
    $params[] = $difficulty;
    $types .= "s";
}

if (!empty($rating)) {
    $params[] = $rating;
    $types .= "d";
}

$stmt->bind_param($types, ...$params);

$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html>
<head>
<title>Course Search</title>
<style>
body { 
    font-family: Arial, sans-serif; 
    background-color: #f0f0f0; 
}
.form-style {
    background-color: #ffffff; 
    padding: 20px; 
    margin-bottom: 20px;
}
.course-list {
    list-style: none;
}
.course-item {
    background-color: #e9e9e9; 
    margin-bottom: 10px; 
    padding: 10px; 
    border-radius: 5px;
}
</style>
</head>
<body>

<h2>Search for Courses</h2>

<form action="" method="get" class="form-style">
  <input type="text" name="search" placeholder="Course title" value="<?php echo htmlspecialchars($search); ?>">
  <input type="number" name="duration" placeholder="Max duration (hours)" value="<?php echo htmlspecialchars($duration); ?>">
  <select name="difficulty">
    <option value="" <?php echo ($difficulty === '' ? 'selected' : ''); ?>>Select difficulty</option>
    <option value="Beginner" <?php echo ($difficulty === 'Beginner' ? 'selected' : ''); ?>>Beginner</option>
    <option value="Intermediate" <?php echo ($difficulty === 'Intermediate' ? 'selected' : ''); ?>>Intermediate</option>
    <option value="Advanced" <?php echo ($difficulty === 'Advanced' ? 'selected' : ''); ?>>Advanced</option>
  </select>
  <input type="number" step="0.1" name="rating" placeholder="Minimum rating (1-5)" value="<?php echo htmlspecialchars($rating); ?>">
  <button type="submit">Search</button>
</form>

<ul class="course-list">
<?php while($row = $result->fetch_assoc()): ?>
    <li class="course-item">
        <h3><?php echo htmlspecialchars($row['title']); ?></h3>
        <p>Duration: <?php echo htmlspecialchars($row['duration']); ?> hours</p>
        <p>Difficulty: <?php echo htmlspecialchars($row['difficulty']); ?></p>
        <p>Instructor Rating: <?php echo htmlspecialchars($row['instructor_rating']); ?>/5</p>
    </li>
<?php endwhile; ?>
</ul>

</body>
</html>

<?php
$conn->close();
?>