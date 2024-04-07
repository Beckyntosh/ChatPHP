<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Art Gallery Entry</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f3f4f6; color: #333; }
        .container { max-width: 800px; margin: 20px auto; background: #fff; padding: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        form { display: flex; flex-direction: column; }
        input, textarea { margin-bottom: 20px; padding: 10px; }
        button { cursor: pointer; padding: 10px 20px; background: #007bff; color: #fff; border: none; }
        .gallery { display: flex; flex-wrap: wrap; }
        .artwork { margin: 10px; border: 1px solid #ddd; padding: 10px; }
        img { max-width: 100px; max-height: 100px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Upload Artwork</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="text" name="title" required placeholder="Artwork Title">
            <input type="text" name="artist" required placeholder="Artist Name">
            <textarea name="description" placeholder="Artwork Description"></textarea>
            <input type="file" name="image" required>
            <button type="submit" name="upload">Upload</button>
        </form>
        <div class="gallery">
Gallery items will be displayed here
        </div>
    </div>

    <?php
    $serverName = "db";
    $userName = "root";
    $password = "root";
    $dbName = "my_database";

    try {
        $conn = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Create table if not exists
        $sql = "CREATE TABLE IF NOT EXISTS artworks (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    title VARCHAR(255) NOT NULL,
                    artist VARCHAR(255) NOT NULL,
                    description TEXT,
                    image VARCHAR(255),
                    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )";

        $conn->exec($sql);

        if(isset($_POST['upload'])) {
            $title = $_POST['title'];
            $artist = $_POST['artist'];
            $description = $_POST['description'];
            $image = $_FILES['image']['name'];
            $target = "uploads/".basename($image);

            $sql = "INSERT INTO artworks (title, artist, description, image) VALUES (?, ?, ?, ?)";
            $stmt= $conn->prepare($sql);
            $stmt->execute([$title, $artist, $description, $image]);

            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                echo "<p>Artwork uploaded successfully.</p>";
            } else {
                echo "<p>Failed to upload artwork.</p>";
            }
        }

        $stmt = $conn->prepare("SELECT title, artist, description, image FROM artworks");
        $stmt->execute();

        $result = $stmt->fetchAll();
        foreach ($result as $row) {
            echo "<div class='artwork'>";
            echo "<img src='uploads/".$row['image']."' alt='".$row['title']."'>";
            echo "<h3>".$row['title']."</h3>";
            echo "<p>".$row['artist']."</p>";
            echo "<p>".$row['description']."</p>";
            echo "</div>";
        }

    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    ?>
</body>
</html>
