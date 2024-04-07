<!DOCTYPE html>
<html>
<head>
    <title>Music and Artist Search</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .search-wrapper { margin: 20px; }
        .results { margin-top: 20px; }
        .artist-card { 
            margin-bottom: 10px; 
            padding: 10px; 
            border: 1px solid #ccc; 
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="search-wrapper">
        <h1>Music and Artist Search</h1>
        <form action="" method="GET">
            <input type="text" name="search" placeholder="e.g., Jazz artists from the 1960s">
            <input type="submit" value="Search">
        </form>
    </div>
    <div class="results">
        <?php
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $searchTerm = $_GET['search'];
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

            $sql = "SELECT artists.name, artists.genre, artists.decade 
                    FROM artists
                    WHERE (artists.genre LIKE ? OR artists.name LIKE ?) AND artists.decade='1960s'";
            $stmt = $conn->prepare($sql);
            $searchTermWildCard = "%" . $searchTerm . "%";
            $stmt->bind_param("ss", $searchTermWildCard, $searchTermWildCard);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='artist-card'><strong>Name:</strong> ". $row["name"]. "<br><strong>Genre:</strong> " . $row["genre"]. "<br><strong>Decade:</strong> " . $row["decade"]. "</div>";
                }
            } else {
                echo "0 results found";
            }
            $conn->close();
        }
        ?>
    </div>
</body>
</html>

