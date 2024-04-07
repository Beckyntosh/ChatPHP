<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Order</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-label {
            display: block;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .form-button {
            background-color: #0056b3;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add an Order</h2>
        <form action="" method="post">
            <div class="form-group">
                <label class="form-label" for="product_name">Product Name:</label>
                <input type="text" id="product_name" name="product_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label class="form-label" for="custom_size">Custom Size:</label>
                <input type="text" id="custom_size" name="custom_size" class="form-control">
            </div>
            <div class="form-group">
                <label class="form-label" for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" class="form-control" required>
            </div>
            <button type="submit" name="submit" class="form-button">Add Order</button>
        </form>
    </div>

    <?php
    if(isset($_POST['submit'])) {
        $servername = "db";
        $username = "root";
        $password = "root";
        $dbname = "my_database";

        $product_name = $_POST['product_name'];
        $custom_size = $_POST['custom_size'];
        $quantity = $_POST['quantity'];

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO orders (product_name, custom_size, quantity) VALUES (?, ?, ?)";
            $stmt= $conn->prepare($sql);
            $stmt->execute([$product_name, $custom_size, $quantity]);

            echo "<script>alert('Order added successfully!');</script>";
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        $conn = null;
    }
    ?>
    
</body>
</html>
