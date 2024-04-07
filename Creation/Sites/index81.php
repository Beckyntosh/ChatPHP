<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Digital Gallery Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        header {
            background: #333;
            color: #fff;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #0779e4 3px solid;
        }
        header h1 {
            text-align: center;
            margin: 0;
            padding-bottom: 10px;
        }
        .search-form {
            margin-top: 20px;
        }
        .search-form input[type='text'], .search-form select {
            padding: 10px;
            margin-right: 5px;
            margin-bottom: 10px;
        }
        .search-form input[type='submit'] {
            padding: 10px;
            cursor: pointer;
        }
        .gallery {
            margin-top: 20px;
        }
        .gallery img {
            width: 23%;
            margin-right: 2%;
            margin-bottom: 20px;
            float: left;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Digital Gallery Search</h1>
        </div>
    </header>
    <div class="container">
        <div class="search-form">
            <form action="" method="GET">
                <input type="text" name="search" placeholder="Search by tags, dates, artists...">
                <input type="submit" value="Search">
            </form>
        </div>
        <div class="gallery">
            <?php
            $mysqli = new mysqli("db", "root", "root", "my_database");
            if ($mysqli->connect_error) {
                die("Connection failed: " . $mysqli->connect_error);
            }

            if (isset($_GET['search']) && !empty($_GET['search'])) {
                $search = $mysqli->real_escape_string($_GET['search']);
                $query = "SELECT * FROM images WHERE tags LIKE '%$search%' OR artist LIKE '%$search%'";

                $result = $mysqli->query($query);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<img src="uploads/' . htmlspecialchars($row['image_path']) . '" alt="' . htmlspecialchars($row['tags']) . '">';
                    }
                } else {
                    echo "No results found for '".htmlspecialchars($search)."'.";
                }
            } else {
                $query = "SELECT * FROM images";
                $result = $mysqli->query($query);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<img src="uploads/' . htmlspecialchars($row['image_path']) . '" alt="' . htmlspecialchars($row['tags']) . '">';
                    }
                } else {
                    echo "No images found in the gallery.";
                }
            }
            $mysqli->close();
            ?>
        </div>
    </div>
</body>
</html>