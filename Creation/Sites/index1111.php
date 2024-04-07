<?php

$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS artists (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    genre VARCHAR(30) NOT NULL,
    decade VARCHAR(10) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    // Table created successfully
} else {
    echo "Error creating table: " . $conn->error;
}

$search = isset($_GET['search']) ? $_GET['search'] : '';

// Search query
$sqlSearch = "SELECT * FROM artists WHERE genre LIKE '%Jazz%' AND decade='1960s' AND (name LIKE '%$search%' OR genre LIKE '%$search%')";
$result = $conn->query($sqlSearch);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Music and Artist Search</title>
    <style>
        body {
            font-family: 'Times New Roman', serif;
            color: #8B0000;
            background-color: #F5F5DC;
        }
        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
        }
        input[type="text"], button {
            padding: 10px;
        }
        table {
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            text-align: left;
            padding: 8px;
        }
        tr:nth-child(even) {background-color: #f2f2f2;}
    </style>
</head>
<body>
    <div class="container">
        <h2>Music and Artist Search</h2>
        <form action="" method="GET">
            <input type="text" name="search" value="<?= $search ?>" placeholder="Search for Jazz artists from the 1960s...">
            <button type="submit">Search</button>
        </form>
        <?php if ($result && $result->num_rows > 0): ?>
            <table>
                <tr>
                    <th>Artist</th>
                    <th>Genre</th>
                    <th>Decade</th>
                </tr>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row["name"] ?></td>
                    <td><?= $row["genre"] ?></td>
                    <td><?= $row["decade"] ?></td>
                </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p>No results found.</p>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
$conn->close();
?>
