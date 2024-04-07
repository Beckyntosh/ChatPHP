<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Basic Travel Itinerary</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 80%; margin: auto; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
<div class="container">
    <h2>Board Game Travel Planner</h2>
    <form action="" method="post">
        <label>Destination: <input type="text" name="destination" required></label><br><br>
        <label>Accommodation: <input type="text" name="accommodation" required></label><br><br>
        <label>Activities: <textarea name="activities" required></textarea></label><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    $servername = "db";
    $username = "root";
    $password = "root";
    $dbname = "my_database";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $destination = $_POST['destination'];
            $accommodation = $_POST['accommodation'];
            $activities = $_POST['activities'];

            $stmt = $conn->prepare("INSERT INTO travel_itinerary (destination, accommodation, activities) VALUES (:destination, :accommodation, :activities)");
            $stmt->bindParam(':destination', $destination);
            $stmt->bindParam(':accommodation', $accommodation);
            $stmt->bindParam(':activities', $activities);
            $stmt->execute();

            echo "<p>Itinerary added successfully!</p>";
        }

        $stmt = $conn->prepare("SELECT destination, accommodation, activities FROM travel_itinerary");
        $stmt->execute();
        $results = $stmt->fetchAll();

        if ($stmt->rowCount() > 0) {
            echo "<table><tr><th>Destination</th><th>Accommodation</th><th>Activities</th></tr>";
            foreach ($results as $row) {
                echo "<tr><td>" . htmlspecialchars($row['destination']) . "</td><td>" . htmlspecialchars($row['accommodation']) . "</td><td>" . htmlspecialchars($row['activities']) . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "No travel plans found.";
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
    ?>

</div>
</body>
</html>