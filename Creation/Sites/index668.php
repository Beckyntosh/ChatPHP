<?php
// This script is a simplistic approach to a web application for a DVD Carrier site with a search functionality,
// storing DVD information in a MySQL database. Adjustments and security enhancements are advised for real-world applications.

// Database configuration
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

// Ensure tables are created
$tables = [
    "CREATE TABLE IF NOT EXISTS locations (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255),
        address TEXT,
        city VARCHAR(100),
        zip_code VARCHAR(20)
    );",
    // Include your initial tables' definitions here, e.g., DVD table, categories, etc.
];

foreach ($tables as $table) {
    if (!$conn->query($table)) {
        echo "Error creating table: " . $conn->error;
    }
}

// Handle search
$search = $_GET['search'] ?? '';

// Fetch locations
$query = "SELECT * FROM locations WHERE name LIKE '%$search%' OR city LIKE '%$search%'";
$result = $conn->query($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nautical Navigator for DVDS</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            color: #333;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        header {
            background: #005f6b;
            color: #fff;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #077187 1px solid;
        }
        header h1 {
            text-align: center;
            margin: 0;
            padding-bottom: 10px;
        }
        input[type="text"], input[type="submit"] {
            padding: 10px;
            margin-top: 10px;
        }
        .search-container {
            text-align: center;
            padding-bottom: 20px;
        }
        table {
            width: 100%;
            margin-top: 20px;
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
            background-color: #005f6b;
            color: #fff;
        }
        tr:nth-child(even) {background-color: #f2f2f2;}
    </style>
</head>
<body>
    <header>
        <h1>Find Your Nearest DVD Locations</h1>
    </header>
    <div class="container">
        <form class="search-container">
            <input type="text" name="search" placeholder="Search Locations..." value="<?= htmlspecialchars($search) ?>">
            <input type="submit" value="Search">
        </form>
        <table>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>City</th>
                <th>ZIP Code</th>
            </tr>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= htmlspecialchars($row['address']) ?></td>
                        <td><?= htmlspecialchars($row['city']) ?></td>
                        <td><?= htmlspecialchars($row['zip_code']) ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No results found</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>