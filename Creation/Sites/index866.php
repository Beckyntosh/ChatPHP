<!DOCTYPE html>
<html>
    <head>
        <title>Maternity Wear News</title>
        <style>
            body {
                background-color: #f4a460;
                font-family: Arial, Helvetica, sans-serif;
            }
        </style>
    </head>
    <body>
        <h1>Maternity Wear News</h1>
        <form action="" method="get">
            <input type="text" name="search" placeholder="Search items...">
            <button type="submit">Search</button>
        </form>

        <?php
            $servername = "db";
            $username = "root";
            $password = "root";
            $dbname = "my_database";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            if(isset($_GET['search'])) {
                $search = $_GET['search'];
                $sql = "SELECT * FROM products WHERE name LIKE '%$search%' OR description LIKE '%$search%'";
            } else {
                $sql = "SELECT * FROM products";
            }

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc())
                    echo "<div><h2>".$row["name"]."</h2><p>".$row["description"]
                    ."</p><p>Category: ".$row["category"]."</p><p>Price: $"
                    .$row["price"]."</p><p>Stock quantity: ".$row["stock_quantity"]
                    ."</p></div><hr>";
            } else {
                echo "No products found";
            }

            $conn->close();
        ?>
    </body>
</html>
