<!DOCTYPE html>
<html>
<head>
    <title>Job Search - Office Supplies Website</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, .2);
        }
        input[type="text"], select {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Search for Job Listings</h2>
    <form method="POST">
        <label for="position">Position:</label>
        <input type="text" id="position" name="position" placeholder="e.g. Software Creator">

        <label for="type">Job Type:</label>
        <select id="type" name="type">
            <option value="remote">Remote</option>
            <option value="onsite">Onsite</option>
            <option value="hybrid">Hybrid</option>
        </select>

        <input type="submit" value="Search">
    </form>

    <?php
    $servername = "db";
    $username = "root";
    $password = "root";
    $dbname = "my_database";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $position = $_POST['position'];
            $type = $_POST['type'];

            $sql = "SELECT id, title, description, type FROM jobs WHERE title LIKE :position AND type = :type";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':position', $positionParam);
            $stmt->bindParam(':type', $type);
            
            $positionParam = "%$position%";
            $stmt->execute();

            $result = $stmt->fetchAll();
            
            if ($stmt->rowCount() > 0) {
                echo "<ul>";
                foreach($result as $row) {
                    echo "<li><strong>" . htmlspecialchars($row["title"]) . "</strong> - " . htmlspecialchars($row["description"]) . " (" . htmlspecialchars($row["type"]) . ")</li>";
                }
                echo "</ul>";
            } else {
                echo "No job listings found.";
            }
        }
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    ?>
</div>

</body>
</html>
