<!DOCTYPE html>
<html>
<head>
    <title>Makeup Webshop</title>
    <style>
        body { background-color: #ADD8E6; }
        h2 { color: #0000FF;}
    </style>
</head>
<body>
    <h2>Search product</h2>
    <form method="post">
        <input type="text" name="search">
        <input type="submit" name="submit" value="Search">
    </form>
    <div id="result"></div>

    <?php
        if (isset($_POST["submit"])) {
            $search = $_POST["search"];
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

            $sql = "SELECT * FROM products WHERE product_name LIKE '%$search%'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "id: " . $row["id"]. " - Name: " . $row["product_name"]. " - Price: " . $row["product_price"]. "<br>";
                }
            } else {
                echo "0 results";
            }
            $conn->close();
        }
    ?>
</body>
</html>