<?php
$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Creating connection
$conn = new mysqli($servername, $username, $password, $database);

// Checking connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['submit'])){

    $playlistName = $_POST['playlistName'];
    $videoList = implode(", ",$_POST['videos']);

    $sql = "INSERT INTO playlists (name, videos) VALUES ('$playlistName', '$videoList')";

    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

}

$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Adventure Awaits - Create Playlist</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
    </style>
</head>

<body>
    <h2>Create Playlist</h2>

    <form action="" method="post">
        Playlist Name: <input type="text" name="playlistName"><br>
        Videos:<br>
        <?php
        $sql = "SELECT id, name FROM videos";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // Out put data of each row
            while($row = $result->fetch_assoc()) {
                echo '<input type="checkbox" id="'. $row["id"]. '" name="videos[]" value="'. $row["id"]. '">
                <label for="'. $row["id"]. '">'. $row["name"]. '</label><br>';
            }
        } else {
            echo "No videos available.";
        }
        ?>
        <input type="submit" name="submit" value="Create Playlist">
    </form>

</body>

</html>