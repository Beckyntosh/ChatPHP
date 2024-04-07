<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Music & Artist Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0ebe8;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .search-box {
            margin-bottom: 20px;
        }
        .search-form input[type=text] {
            padding: 10px;
            font-size: 17px;
            border: 1px solid grey;
            float: left;
            width: 80%;
            background: #f1f1f1;
        }
        .search-form button {
            float: left;
            width: 20%;
            padding: 10px;
            background: #2196F3;
            color: white;
            font-size: 17px;
            border: 1px solid grey;
            border-left: none;
            cursor: pointer;
        }
        .search-form button:hover {
            background: #0b7dda;
        }
        .search-result {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="search-box">
    <form class="search-form" action="" method="POST">
        <input type="text" placeholder="Search songs, albums, artists..." name="search">
        <button type="submit">Search</button>
    </form>
</div>

<?php

$mysqli = new mysqli("db", "root", "root", "my_database");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

function searchMusic($mysqli, $query) {
    $sql = "SELECT songs.name AS song_name, albums.name AS album_name, artists.name AS artist_name 
            FROM songs JOIN albums ON songs.album_id = albums.id
            JOIN artists ON albums.artist_id = artists.id 
            WHERE songs.name LIKE ? OR albums.name LIKE ? OR artists.name LIKE ?";

    if ($stmt = $mysqli->prepare($sql)) {
        $likeQuery = '%' . $query . '%';
        $stmt->bind_param("sss", $likeQuery, $likeQuery, $likeQuery);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<div class='search-result'>";
            while($row = $result->fetch_assoc()) {
                echo "<p><strong>Song:</strong> " . htmlspecialchars($row["song_name"]) . 
                     " | <strong>Album:</strong> " . htmlspecialchars($row["album_name"]) .
                     " | <strong>Artist:</strong> " . htmlspecialchars($row["artist_name"]) . "</p>";
            }
            echo "</div>";
        } else {
            echo "<p>No results found.</p>";
        }
        $stmt->close();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchQuery = trim($_POST["search"]);
    if (!empty($searchQuery)) {
        searchMusic($mysqli, $searchQuery);
    } else {
        echo "<p>Please enter a search query.</p>";
    }
}

$mysqli->close();
?>

</body>
</html>