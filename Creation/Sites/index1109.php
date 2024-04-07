<?php

// Database connection
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

// Create table for artists if not exists
$createTable = "CREATE TABLE IF NOT EXISTS artists (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    genre VARCHAR(30) NOT NULL,
    decade VARCHAR(10) NOT NULL,
    info TEXT,
    reg_date TIMESTAMP
)";

if ($conn->query($createTable) === FALSE) {
  echo "Error creating table: " . $conn->error;
}

$search = $_GET['search'] ?? '';

?>

<!DOCTYPE html>
<html>
<head>
    <title>Music and Artist Search</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: auto; padding: 20px; }
        .result { margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Music and Artist Search</h2>
        <form method="GET">
            <input type="text" name="search" placeholder="Type 'Jazz artists from the 1960s'" value="<?= htmlspecialchars($search) ?>">
            <button type="submit">Search</button>
        </form>
        <div class="result">
            <?php
            if (!empty($search)) {
                // Assuming input is in the format: "<genre> artists from the <decade>s"
                // Very basic and for example purposes.
                // Extract "genre" and "decade" from search
                list($genre, $tmp) = explode(' artists from the ', $search);
                $decade = trim(explode('s', $tmp)[0]);

                // Perform search in database
                $sql = $conn->prepare("SELECT name, info FROM artists WHERE genre=? AND decade=?");
                $sql->bind_param("ss", $genre, $decade);
                $sql->execute();
                $result = $sql->get_result();

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<p><strong>" . $row["name"]. ":</strong> " . $row["info"]. "</p>";
                    }
                } else {
                    echo "0 results found";
                }
                $sql->close();
            }
            ?>
        </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>
