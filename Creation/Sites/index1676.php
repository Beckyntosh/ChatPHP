<?php
// Define MySQL connection parameters
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Create courses and learning paths tables if not exists
try {
    $createCoursesTableQuery = "
    CREATE TABLE IF NOT EXISTS courses (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        description TEXT NOT NULL,
        category VARCHAR(255) NOT NULL
    )";

    $createLearningPathsTableQuery = "
    CREATE TABLE IF NOT EXISTS learning_paths (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        courses_ids VARCHAR(255) NOT NULL
    )";

    $pdo->exec($createCoursesTableQuery);
    $pdo->exec($createLearningPathsTableQuery);
} catch (PDOException $e) {
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

// Insert dummy courses data (This part should be executed only once ideally)
try {
    $coursesData = [
        ['Introduction to Data Science', 'Learn the basics of data science', 'Data Science'],
        ['Statistics for Data Science', 'Deep dive into statistics needed for data science', 'Data Science'],
        ['Machine Learning Concepts', 'Understanding ML concepts for data science', 'Data Science'],
    ];

    $insertCourseQuery = "INSERT INTO courses (title, description, category) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($insertCourseQuery);
    foreach ($coursesData as $course) {
        $stmt->execute($course);
    }
} catch (PDOException $e) {
    // In a real application, this exception should be handled or logged properly
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Personalized Learning Path</title>
</head>
<body>

<h2>Create your Data Science Learning Path</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <?php
    // Retrieve available courses
    $sql = "SELECT id, title FROM courses WHERE category = 'Data Science'";
    if ($result = $pdo->query($sql)) {
        while ($row = $result->fetch()) {
            echo '<input type="checkbox" name="courses[]" value="' . $row['id'] . '"> ' . $row['title'] . '<br>';
        }
    }
    ?>
    <input type="text" name="learningPathName" placeholder="Enter name for your learning path"><br>
    <input type="submit" value="Submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["courses"]) && !empty($_POST["learningPathName"])) {
        $coursesIds = implode(',', $_POST["courses"]);
        $learningPathName = $_POST["learningPathName"];

        try {
            $insertLearningPathQuery = "INSERT INTO learning_paths (name, courses_ids) VALUES (?, ?)";
            $stmt = $pdo->prepare($insertLearningPathQuery);
            $stmt->execute([$learningPathName, $coursesIds]);

            echo "<p>Learning path created successfully!</p>";
        } catch (PDOException $e) {
            echo "ERROR: Could not able to execute $sql. " . $e->getMessage();
        }
    } else {
        echo "<p>Please select at least one course and provide a name for your learning path.</p>";
    }
}
?>

</body>
</html>
