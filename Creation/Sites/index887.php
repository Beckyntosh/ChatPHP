<?php
    $servername = "db";
    $username = "root";
    $password = "root";
    $dbname = "my_database";

    // Create connection for various operations
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Perform operations based on form actions
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Check if it's add rating operation
        if (isset($_POST['productId'])) {
            $userId = $_POST['userId'];
            $productId = $_POST['productId'];
            $rating = $_POST['rating'];

            $sql = "INSERT INTO ratings (user_id, product_id, rating) VALUES ('$userId', '$productId', '$rating')";
            $conn->query($sql);
        }
        // Check if it's a file upload operation
        else if (isset($_POST['upload'])) {
            $file = $_FILES['file'];
            $fileName = $_FILES['file']['name'];
            $fileTmpName  = $_FILES['file']['tmp_name'];
            $fileSize = $_FILES['file']['size'];
            $fileError = $_FILES['file']['error'];

            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $allowed = array('jpg', 'jpeg', 'png', 'pdf');

            if (in_array($fileActualExt, $allowed)) {
                if ($fileError === 0) {
                    if ($fileSize < 1000000) {
                        $fileNameNew = uniqid('', true).".".$fileActualExt;
                        $fileDestination = 'uploads/'.$fileNameNew;
                        move_uploaded_file($fileTmpName, $fileDestination);
                        $sql = "INSERT INTO products (file_name) VALUES ('$fileNameNew');";
                        if ($conn->query($sql)) {
                            $message = "File Uploaded Successfully.";
                        } else {
                            $message = "Failed to upload file.".$conn->error;
                        }
                    } else {
                        $message = "Your file is too big!";
                    }
                } else {
                    $message = "There was an error uploading your file!";
                }
            } else {
                $message = "You cannot upload files of this type!";
            }
        }
    }

    // Perform search operation
    $search = $_POST['search'] ?? '';
    if(!empty($search)){
        $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE ?");
        $likeSearch = "%$search%";
        $stmt->bind_param("s", $likeSearch);
        $stmt->execute();
        $results = $stmt->get_result();
    }

?>

<!DOCTYPE html>
<html>

<head>
    <title>Complete Website</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .product,
        .user,
        table {
            border: 1px solid #000;
            margin: 10px;
            padding: 10px;
        }

        table {
            width: 80%;
            margin-left: auto;
            margin-right: auto;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        form {
            margin: 20px auto;
            width: 200px;
        }
    </style>
</head>

<body>
Search Section
    <h1>Makeup Webshop - Search Products</h1>
    <form action="" method="post">
        <input type="text" name="search" placeholder="Search..." value="<?= htmlspecialchars($search, ENT_QUOTES) ?>">
        <input type="submit" value="Search">
    </form>
    <?php if ($search !== '' && isset($results) && $results->num_rows == 0): ?>
    <p>No results found for "<?= htmlspecialchars($search) ?>"</p>
    <?php elseif(isset($results)): ?>
    <ul>
        <?php while($prod = $results->fetch_assoc()): ?>
        <li><?= htmlspecialchars($prod['name']) ?>: $<?= $prod['price'] ?></li>
        <?php endwhile; ?>
    </ul>
    <?php endif; ?>

Add/Form Section
    <h1>Rate a Product</h1>
    <?php
        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()):
    ?>
    <div class="product">
        <h2><?= $row['name']; ?></h2>
        <form method="POST">
            <input type="hidden" name="userId" value="1">
            <input type="hidden" name="productId" value="<?= $row['id']; ?>">
            <label for="rating<?= $row['id']; ?>">Rating:</label>
            <input type="number" id="rating<?= $row['id']; ?>" name="rating" min="1" max="5">
            <input type="submit" value="Submit">
        </form>
    </div>
    <?php endwhile; ?>

File Upload Section
    <h2 style='text-align: center;'>Makeup Social Networking Site - File Upload</h2>
    <form action='' method='post' enctype='multipart/form-data'>
        <input type='file' name='file'>
        <button type='submit' name='upload'>UPLOAD</button>
    </form>
    <?php if(isset($message)) echo "<p style='text-align: center;'>$message</p>"; ?>

Users Section
    <?php
        // Fetch data from the users table
        $users_result = $conn->query("SELECT * FROM users");
        if ($users_result->num_rows > 0) {
            echo "<h2>Users:</h2>";
            while($user_row = $users_result->fetch_assoc()) {
                echo "User ID: " . $user_row["id"]. " - Name: " . $user_row["name"]. " - Email: " . $user_row["email"]. "<br>";
            }
        } else {
            echo "No users found";
        }
    ?>

Products and Points Section
    <?php
        $sql = "SELECT users.username, users.loyalty_points, products.name FROM users JOIN products on users.product_id = products.id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<table><tr><th>User</th><th>Loyalty Points</th><th>Selected Product</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                <td>".$row["username"]."</td>
                <td>".$row["loyalty_points"]."</td>
                <td>".$row["name"]."</td>
            </tr>";
            }
            echo "</table>";
        } else {
            echo "No results found";
        }
        $conn->close();
    ?>
</body>

</html>
