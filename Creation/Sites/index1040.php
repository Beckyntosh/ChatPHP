<!DOCTYPE html>
<html>
<head>
    <title>Restaurant Reviews</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 80%; margin: auto; }
        .review-form { margin-top: 20px; }
        .reviews { margin-top: 20px; }
        .review { margin-bottom: 20px; padding-bottom: 20px; border-bottom: 1px solid #ccc; }
        .error { color: red; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Restaurant Reviews</h1>
        <div class="review-form">
            <h2>Submit a Review</h2>
            <form action="" method="post">
                <p><input type="text" name="name" placeholder="Your Name" required></p>
                <p><input type="text" name="restaurant" placeholder="Restaurant Name" required></p>
                <p><textarea name="review" rows="5" placeholder="Your Review" required></textarea></p>
                <p><label>Rating: </label>
                   <select name="rating">
                       <option value="1">1</option>
                       <option value="2">2</option>
                       <option value="3">3</option>
                       <option value="4">4</option>
                       <option value="5" selected>5</option>
                   </select>
                </p>
                <p><input type="submit" name="submitReview" value="Submit Review"></p>
            </form>
        </div>
        <div class="reviews">
            <h2>Recent Reviews</h2>
            <?php echo fetchReviews(); ?>
        </div>
    </div>

    <?php
        function dbConnect() {
            $servername = "db";
            $username = "root";
            $password = "root";
            $dbname = "my_database";

            try {
                $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                return $pdo;
            } catch(PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }

        function createTable() {
            try {
                $pdo = dbConnect();
                $sql = "CREATE TABLE IF NOT EXISTS reviews (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    name VARCHAR(30) NOT NULL,
                    restaurant VARCHAR(50) NOT NULL,
                    review TEXT NOT NULL,
                    rating INT(1) NOT NULL,
                    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )";

                $pdo->exec($sql);
            } catch(PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
            }
        }

        createTable();

        if (isset($_POST['submitReview'])) {
            $name = $_POST['name'];
            $restaurant = $_POST['restaurant'];
            $review = $_POST['review'];
            $rating = $_POST['rating'];

            $pdo = dbConnect();

            $sql = "INSERT INTO reviews (name, restaurant, review, rating) VALUES (?, ?, ?, ?)";
            $stmt= $pdo->prepare($sql);
            $stmt->execute([$name, $restaurant, $review, $rating]);
        }

        function fetchReviews() {
            $pdo = dbConnect();
            $stmt = $pdo->query("SELECT name, restaurant, review, rating FROM reviews ORDER BY id DESC");
            
            $reviewsHtml = '';
            while ($row = $stmt->fetch()) {
                $reviewsHtml .= "<div class='review'><strong>" . htmlspecialchars($row['name']) . "</strong> on <em>" . htmlspecialchars($row['restaurant']) . "</em>: ";
                $reviewsHtml .= "<p>" . nl2br(htmlspecialchars($row['review'])) . "</p>";
                $reviewsHtml .= "<p>Rating: " . htmlspecialchars($row['rating']) . "/5</p></div>";
            }

            return $reviewsHtml;
        }
    ?>
</body>
</html>
