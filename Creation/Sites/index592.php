<!DOCTYPE html>
<html>
<head>
    <title>Makeup Webshop - Summer Edition</title>
    <style>
        body {
            background-color: #FDB813;
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            margin: auto;
        }
        .search-box {
            margin: 2em 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Makeup Webshop - Summer Edition</h1>
        <div class="search-box">
            <form action="" method="POST">
                <input type="text" name="search" placeholder="Find your favorite products...">
                <input type="submit" name="submit" value="Search">
            </form>
        </div>

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

            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $search = mysqli_real_escape_string($conn, $_POST['search']);
                $sql = "SELECT * FROM products WHERE name LIKE '%$search%'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<div class='product-list'>";
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='product-item'>";
                        echo "<h2>" . $row['name'] . "</h2>";
                        echo "<p>" . $row['description'] . "</p>";
                        echo "<p>" . $row['price'] . "</p>";
                        echo "</div>";
                    }
                    echo "</div>";
                } else {
                    echo "No results found";
                }
            } 

            $conn->close();
        ?>
    </div>
</body>
</html>