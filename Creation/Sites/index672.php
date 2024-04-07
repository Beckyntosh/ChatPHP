<?php
    $host = 'db';
    $user = 'root';
    $pass = 'root';
    $db   = 'my_database';

    // Create connection
    $conn = new mysqli($host, $user, $pass, $db);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch data from the users table
    $users_result = $conn->query("SELECT * FROM users");

    // Check if there are any users and if so, display them
    if ($users_result->num_rows > 0) {
        echo "<h2>Users:</h2>";
        while($user_row = $users_result->fetch_assoc()) {
           echo "User ID: " . $user_row["id"]. " - Name: " . $user_row["name"]. " - Email: " . $user_row["email"]. "<br>";
        }
    } else {
        echo "No users found";
    }

    // Fetch data from the products table
    $products_result = $conn->query("SELECT * FROM products");

    // Check if there are any products and if so, display them
    if ($products_result->num_rows > 0) {
        echo "<h2>Products:</h2>";
        while($product_row = $products_result->fetch_assoc()) {
           echo "Product ID: " . $product_row["id"]. " - Name: " . $product_row["name"]. " - Price: $" . $product_row["price"]. " - Description: " . $product_row["description"]. "<br>";
        }
    } else {
        echo "No products found";
    }

    // Close connection
    $conn->close();
?>