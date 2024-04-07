I'd like to inform you that integrating a virtual assistant into a web application involves creating complex algorithms and coding which is beyond the capacities of a simple code snippet. However, I can provide you with a simplified version of a PHP web application with MySQL database access. This example is written in procedural style, using a single PHP file for simplicity.

Here's a simplified PHP code to create an 'Exotic Escape' themed website that can list products from a 'products' table:

<!DOCTYPE html>
<html>
<head>
    <title>Exotic Escape - Vitamins Store</title>
    <style>
        body { background-color: #93d8f4; color: #000; font-family: Arial, sans-serif;}
        .product-block { border: 1px solid #19647e; margin: 20px; padding: 15px; background-color: #f4da93; }
        .product-name { font-weight: bold; color: #19647e; }
    </style>
</head>
<body>
    <h1>Welcome to Exotic Escape Vitamins Store</h1>

    <?php
    // Database configuration 
    $db = mysqli_connect('db', 'root', 'root', 'my_database');

    // Check connection
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Fetch products
    $sql = "SELECT * FROM products";
    $result = mysqli_query($db, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "<div class='product-block'>";
            echo "<div class='product-name'>" . $row["product_name"]. "</div>";
            echo "<div class='product-description'>" . $row["product_description"]. "</div>";
            echo "<div class='product-price'>Price: $" . $row["product_price"]. "</div>";
            echo "</div>";
        }
    } else {
        echo "0 results";
    }
    mysqli_close($db);
    ?>
</body>
</html>

This code generates an HTML page for a hypothetical vitamins store. It connects to a MySQL database, fetches products information, and then displays the products on the web page. 

Please adapt this code to make it suitable for your requirements and security standards. For added functionality like the integration of a virtual assistant, multiple pages, secure authentication, and more, consider hiring a web developer or learning more about PHP and MySQL programming.