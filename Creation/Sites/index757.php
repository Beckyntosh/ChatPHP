<?php
// Connect to the database
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

// Create orders table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    user_id INT,
    quantity INT,
    total_price DECIMAL(10, 2),
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Simple bootstrap for style
echo '<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">';

// Mountain Majesty theme
echo '<style>
    body { background-color: #eae7dc; font-family: Arial, sans-serif; }
    .mountain-majesty { color: #333; background-color: #8d99ae; padding: 20px; margin-bottom: 20px; border-radius: 8px; }
    </style>';

echo '<div class="mountain-majesty">
        <h2>Desktop Computers Online Quiz and Test Site - Payment</h2>
      </div>';

echo '<div>';
// Fetching products from database
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<div class="card" style="width: 18rem; display: inline-block; margin: 10px;">
                <div class="card-body">
                    <h5 class="card-title">'. $row["name"].'</h5>
                    <p class="card-text">'. $row["description"].'</p>
                    <p class="card-text">Price: $'. $row["price"].'</p>
                    <a href="#" class="btn btn-primary">Purchase</a>
                </div>
              </div>';
    }
} else {
    echo "0 results";
}
echo '</div>';

$conn->close();
?>