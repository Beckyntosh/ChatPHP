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
$createTableSql = "CREATE TABLE IF NOT EXISTS gallery_images (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    image_name VARCHAR(255) NOT NULL,
    artist_name VARCHAR(255),
    creation_date DATE,
    tags VARCHAR(255),
    image_path VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if (!$conn->query($createTableSql)) {
    echo "Error creating table: " . $conn->error;
}

// Insert dummy data - this part should be in a separate script in real applications
$insertSql = "INSERT INTO gallery_images (image_name, artist_name, creation_date, tags, image_path)
VALUES ('Sneakers in the Run', 'John Doe', '2022-03-15', 'sneakers,run,blue', 'images/sneakers_run.jpg');";
if (!$conn->query($insertSql)) {
    echo "Error inserting data: " . $conn->error;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shoe Gallery</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .image-gallery { display: flex; flex-wrap: wrap; gap: 20px; }
        .image-card { width: calc(33.333% - 20px); box-shadow: 0 2px 4px rgba(0,0,0,.2); padding: 10px; }
        .image-card img { width: 100%; height: auto; }
    </style>
</head>
<body>
    <h1>Shoe Gallery Search</h1>
    <form action="" method="GET">
        <input type="text" name="search" placeholder="Search by tags, artist...">
        <button type="submit">Search</button>
    </form>

    <div class="image-gallery">
        <?php
        $search = isset($_GET['search']) ? "%" . $_GET['search'] . "%" : "%";
        $sql = $conn->prepare("SELECT * FROM gallery_images WHERE tags LIKE ? OR artist_name LIKE ?");
        $sql->bind_param("ss", $search, $search);
        $sql->execute();
        
        $result = $sql->get_result();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='image-card'>
                        <img src='".$row["image_path"]."' alt='".$row["image_name"]."'>
                        <p>Artist: ".$row["artist_name"]."</p>
                        <p>Date: ".$row["creation_date"]."</p>
                        <p>Tags: ".$row["tags"]."</p>
                      </div>";
            }
        } else {
            echo "0 results found";
        }
        ?>
    </div>
</body>
</html>
<?php $conn->close(); ?>