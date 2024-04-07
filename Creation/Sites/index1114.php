<?php
// Initialize connection variables
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

// Table creation if not exists
$sql = "CREATE TABLE IF NOT EXISTS artists (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    genre VARCHAR(30) NOT NULL,
    year INT(4) NOT NULL
    )";

if ($conn->query($sql) === TRUE) {
    echo "Table artists created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$search = '';
$results = [];

// Search functionality
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search = $_POST['search'];
    $sql = "SELECT name, genre, year FROM artists WHERE genre = 'Jazz' AND year BETWEEN 1960 AND 1969 AND name LIKE ?";
    $stmt = $conn->prepare($sql);
    $search_param = "%$search%";
    $stmt->bind_param("s", $search_param);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $results[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Music and Artist Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 5px 10px rgba(0,0,0,0.1);
        }
        .search-box {
            margin-bottom: 20px;
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
            background-color: #f8f8f8;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Music and Artist Search</h2>
    <form method="post" class="search-box">
        <input type="text" name="search" placeholder="Search for Jazz artists from the 1960s..." value="<?php echo htmlspecialchars($search); ?>">
        <button type="submit">Search</button>
    </form>
    <?php if (!empty($results)): ?>
        <table>
            <thead>
            <tr>
                <th>Name</th>
                <th>Genre</th>
                <th>Year</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($results as $artist): ?>
                <tr>
                    <td><?php echo htmlspecialchars($artist['name']); ?></td>
                    <td><?php echo htmlspecialchars($artist['genre']); ?></td>
                    <td><?php echo htmlspecialchars($artist['year']); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No results found</p>
    <?php endif; ?>
</div>
</body>
</html>
