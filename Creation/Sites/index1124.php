<!DOCTYPE html>
<html>
<head>
    <title>Music and Artist Search</title>
    <style>
        body { font-family: Arial, sans-serif; }
        #search-result { margin-top: 20px; }
    </style>
</head>
<body>

<h2>Music and Artist Search</h2>

<form method="POST">
    <input type="text" name="search" placeholder="Search for artists, genres..." required>
    <button type="submit">Search</button>
</form>

<div id="search-result">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["search"])) {
        $searchTerm = htmlspecialchars($_POST["search"]);

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

        // Creating table if it does not exist
        $sql = "CREATE TABLE IF NOT EXISTS Artists (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(30) NOT NULL,
            genre VARCHAR(30) NOT NULL,
            decade VARCHAR(30) NOT NULL,
            reg_date TIMESTAMP
        )";

        if ($conn->query($sql) === TRUE) {
            // Table created successfully or already exists
        } else {
            echo "Error creating table: " . $conn->error;
        }

        // Simulating sample data insertion - In practice, replace this with actual data
        $sql = "INSERT INTO Artists (name, genre, decade) VALUES ('Miles Davis', 'Jazz', '1960s');";
        $conn->query($sql);

        $sql = "SELECT name, genre, decade FROM Artists WHERE genre LIKE ? AND decade LIKE ?";

        $stmt = $conn->prepare($sql);
        $searchTermWildcard = "%$searchTerm%";
        $stmt->bind_param("ss", $searchTermWildcard, $searchTermWildcard);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<ul>";
            while($row = $result->fetch_assoc()) {
                echo "<li>".$row["name"]." - ".$row["genre"].", ".$row["decade"]."</li>";
            }
            echo "</ul>";
        } else {
            echo "0 results found.";
        }
        $stmt->close();
        $conn->close();
    }
    ?>
</div>

</body>
</html>
