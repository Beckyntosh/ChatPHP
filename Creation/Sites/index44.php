<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vinyl Records Online Learning Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0e7db;
            color: #333;
            text-align: center;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        form {
            margin-bottom: 20px;
        }
        input, select {
            padding: 10px;
            margin: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #fa8231;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Search for Online Learning Courses</h1>
    <form action="" method="get">
        <input type="text" name="name" placeholder="Course Name" />
        <select name="duration">
            <option value="">Any Duration</option>
            <option value="short">Less than 3 months</option>
            <option value="medium">3-6 months</option>
            <option value="long">More than 6 months</option>
        </select>
        <select name="difficulty">
            <option value="">Any Difficulty</option>
            <option value="beginner">Beginner</option>
            <option value="intermediate">Intermediate</option>
            <option value="advanced">Advanced</option>
        </select>
        <select name="rating">
            <option value="">Any Rating</option>
            <option value="4">4 Stars & Up</option>
            <option value="3">3 Stars & Up</option>
            <option value="2">2 Stars & Up</option>
            <option value="1">1 Star & Up</option>
        </select>
        <input type="submit" value="Search" />
    </form>
    <?php
    $servername = "db";
    $username = "root";
    $password = "root";
    $dbname = "my_database";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT courses.name, courses.duration, courses.difficulty, AVG(reviews.rating) as avg_rating FROM courses LEFT JOIN reviews ON courses.id = reviews.course_id WHERE 1";

        if (!empty($_GET['name'])) {
            $sql .= " AND courses.name LIKE '%" . $_GET['name'] . "%'";
        }

        if (!empty($_GET['duration'])) {
            switch ($_GET['duration']) {
                case 'short':
                    $sql .= " AND courses.duration < 3";
                    break;
                case 'medium':
                    $sql .= " AND courses.duration BETWEEN 3 AND 6";
                    break;
                case 'long':
                    $sql .= " AND courses.duration > 6";
                    break;
            }
        }

        if (!empty($_GET['difficulty'])) {
            $sql .= " AND courses.difficulty = '" . $_GET['difficulty'] . "'";
        }

        if (!empty($_GET['rating'])) {
            $sql .= " HAVING avg_rating >= " . $_GET['rating'];
        }

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $courses = $stmt->fetchAll();

        echo "<table><tr><th>Name</th><th>Duration (Months)</th><th>Difficulty</th><th>Avg Rating</th></tr>";
        foreach ($courses as $course) {
            echo "<tr><td>" . htmlspecialchars($course['name']) . "</td><td>" . htmlspecialchars($course['duration']) . "</td><td>" . htmlspecialchars($course['difficulty']) . "</td><td>" . htmlspecialchars(number_format($course['avg_rating'], 1)) . "</td></tr>";
        }
        echo "</table>";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
    ?>
</div>
</body>
</html>