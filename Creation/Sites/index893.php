
<!DOCTYPE html>
<html>
<head>
    <title>Create Profile - Christmas Makeup Shop</title>
    <style type="text/css">
        body {
            background: #f2f2f2;
            font-family: Arial;
            color: #333;
        }
        .container {
            width: 80%;
            margin: auto;
            background: #fff;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
        h1 {
            font-size: 24px;
            font-weight: 300;
            color: #f44336;
        }
        body { background-color: #FFC0CB; font-family: Arial, sans-serif; }
        .product { float: left; width: 30%; margin: 5px; padding: 10px; border: 1px solid #000; border-radius: 10px; background-color: #FFF;}
        .product img { width: 100%; }
        body {
            font-family: Arial, sans-serif;
            background-color: #f0e6f6;
            color: #333;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        header {
            background: #8a76ab;
            color: #ffffff;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #0779e4 3px solid;
        }
        header h1 {
            text-align: center;
            margin: 0;
            font-size: 24px;
        }
        nav {
            text-align: center;
            padding: 10px 0;
            margin-top: 40px;
        }
        nav a {
            margin: 0 15px;
            text-transform: uppercase;
            font-size: 18px;
            color: #3a3a3a;
            text-decoration: none;
        }
        .search-form {
            margin-top: 20px;
            text-align: center;
        }
        .product-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .product {
            border: 1px solid #ccc;
            margin: 10px;
            padding: 10px;
            width: 30%;
        }
        .product h3 {
            color: #8a76ab;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Create Profile</h1>

        <?php
            $servername = "db";
            $username = "root";
            $password = "root";
            $dbname = "my_database";
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = htmlspecialchars($_POST["name"]);
                $email = htmlspecialchars($_POST["email"]);
                $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

                $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('sss', $name, $email, $password);
                $stmt->execute();

                echo "Profile Created Successfully";
            }
        ?>

        <form method="POST" action="">
            <label for="name">Name:</label><br/>
            <input type="text" id="name" name="name" required><br/>

            <label for="email">Email:</label><br/>
            <input type="email" id="email" name="email" required><br/>

            <label for="password">Password:</label><br/>
            <input type="password" id="password" name="password" required><br/>

            <input type="submit" value="Submit">
        </form>
    </div>

<header>
    <h1>Enchanted Elegance Bath Products</h1>
</header>

<nav>
    <a href="#">Home</a> |
    <a href="#">About Us</a> |
    <a href="#">Contact</a>
</nav>

<div class="container">
    <form class="search-form" action="" method="post">
        <input type="text" name="search_term" placeholder="Search for products..." required>
        <select name="search_category">
            <option value="">Select Category</option>
            <option value="Category1">Category1</option>
            <option value="Category2">Category2</option>
            <option value="Category3">Category3</option>
        </select>
        <button type="submit" name="search">Search</button>
    </form>

    <div class="product-list">
        <?php
        if(isset($_POST['search'])) {
            $search_term = $conn->real_escape_string($_POST['search_term']);
            $search_category = $conn->real_escape_string($_POST['search_category']);
            $sql = "SELECT * FROM products WHERE name LIKE '%$search_term%' AND category='$search_category'";
        } else {
            $sql = "SELECT * FROM products";
        }

        $result = $conn->query($sql);

        if($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <div class="product">
                    <h3><?= htmlspecialchars($row["name"]); ?></h3>
                    <p><?= htmlspecialchars($row["description"]); ?></p>
                    <p><b>Category:</b> <?= htmlspecialchars($row["category"]); ?></p>
                    <p><b>Price:</b> $<?= htmlspecialchars(number_format($row["price"], 2)); ?></p>
                    <p><b>In Stock:</b> <?= htmlspecialchars($row["stock_quantity"]); ?> units</p>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No products found!</p>
        <?php endif; ?>
    </div>
</div>
</body>
</html>
