<?php
$host = 'db';
$db   = 'my_database';
$user = 'root';
$pass = 'root';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Create table for GPA Calculator if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR(255) NOT NULL,
    grade FLOAT NOT NULL,
    credit INT NOT NULL
)";
$pdo->exec($sql);

function insertCourse($name, $grade, $credit, $pdo) {
    $sql = "INSERT INTO courses (course_name, grade, credit) VALUES (?, ?, ?)";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$name, $grade, $credit]);
}

function calculateGPA($pdo) {
    $sql = "SELECT SUM(grade * credit) / SUM(credit) as gpa FROM courses";
    $stmt= $pdo->query($sql);
    $row = $stmt->fetch();
    return round($row['gpa'], 2);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["calculate"])) {
    $gpa = calculateGPA($pdo);
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['course_name'] ?? '';
    $grade = $_POST['grade'] ?? 0;
    $credit = $_POST['credit'] ?? 0;
    if ($name && $grade && $credit) {
        insertCourse($name, $grade, $credit, $pdo);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>GPA Calculator</title>
    <style>
        body { font-family: Arial, sans-serif; font-weight: bold; }
        .container { width: 60%; margin: 30px auto; }
        input[type="text"], input[type="number"], button { padding: 10px; margin: 10px 0; font-weight: bold; }
    </style>
</head>
<body>
<div class="container">
    <h1>GPA Calculator</h1>
    <form action="" method="post">
        <div>
            <label for="course">Course Name:</label>
            <input type="text" name="course_name" required>
        </div>
        <div>
            <label for="grade">Grade (0.0 - 4.0):</label>
            <input type="number" step="0.01" name="grade" min="0.0" max="4.0" required>
        </div>
        <div>
            <label for="credit">Credit Hours:</label>
            <input type="number" name="credit" min="1" required>
        </div>
        <button type="submit">Add Course</button>
        <button type="submit" name="calculate">Calculate GPA</button>
    </form>
    <?php if(isset($gpa)): ?>
        <h2>Your GPA is: <?= $gpa ?></h2>
    <?php endif; ?>
</div>
</body>
</html>
