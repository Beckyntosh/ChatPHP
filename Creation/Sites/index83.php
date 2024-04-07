<?php
// DB Connection
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Create images table if not exists
$sql = "CREATE TABLE IF NOT EXISTS images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    artist VARCHAR(255) NOT NULL,
    title VARCHAR(255) NOT NULL,
    tags VARCHAR(255),
    image_url VARCHAR(255) NOT NULL,
    upload_date DATE NOT NULL
);";

if(!mysqli_query($link, $sql)){
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

$search = $_GET['search'] ?? '';
$artist = $_GET['artist'] ?? '';
$date = $_GET['date'] ?? '';

$query = "SELECT * FROM images WHERE title LIKE ? ";

$params = ["%$search%"];

if ($artist !== '') {
    $query .= " AND artist = ?";
    $params[] = $artist;
}
if ($date !== '') {
    $query .= " AND upload_date = ?";
    $params[] = $date;
}

$stmt = mysqli_prepare($link, $query);
mysqli_stmt_bind_param($stmt, str_repeat('s', count($params)), ...$params);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Gallery</title>
    <style>
        body { background-color: #f0f0f0; font-family: Arial, sans-serif; }
        .gallery-grid { display: flex; flex-wrap: wrap; padding: 8px; }
        .gallery-grid img { margin: 4px; border-radius: 8px; width: 220px; height: 220px; object-fit: cover; }
        .search-bar { text-align: center; margin: 20px; }
        input[type="text"], select { padding: 10px; margin-right: 10px; border-radius: 5px; border: 1px solid #ddd; }
        input[type="submit"] { padding: 10px 20px; background-color: #009688; color: white; border: none; border-radius: 5px; cursor: pointer; }
        input[type="submit"]:hover { background-color: #00796b; }
    </style>
</head>
<body>
    <div class="search-bar">
        <form action="" method="GET">
            <input type="text" name="search" placeholder="Search title..." value="<?= htmlspecialchars($search) ?>">
            <input type="text" name="artist" placeholder="Artist..." value="<?= htmlspecialchars($artist) ?>">
            <input type="date" name="date" value="<?= htmlspecialchars($date) ?>">
            <input type="submit" value="Search">
        </form>
    </div>
    <div class="gallery-grid">
        <?php if(mysqli_num_rows($result) > 0): ?>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                <div>
                    <img src="<?= htmlspecialchars($row['image_url']) ?>" alt="<?= htmlspecialchars($row['title']) ?>">
                    <p><?= htmlspecialchars($row['title']) ?></p>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No images found.</p>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
mysqli_close($link);
?>