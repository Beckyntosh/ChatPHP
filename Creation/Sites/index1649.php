<?php
// Define database connection parameters
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt database connection
try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Check if form was submitted and process data
if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["exercise_name"]) && !empty($_POST["instructions"])) {
    $exerciseName = trim($_POST["exercise_name"]);
    $instructions = trim($_POST["instructions"]);
    $videoUrl = !empty($_POST["video_url"]) ? trim($_POST["video_url"]) : null;

    // Prepare SQL and bind parameters
    $stmt = $pdo->prepare("INSERT INTO exercises (exercise_name, instructions, video_url) VALUES (:exercise_name, :instructions, :video_url)");
    $stmt->bindParam(':exercise_name', $exerciseName);
    $stmt->bindParam(':instructions', $instructions);
    $stmt->bindParam(':video_url', $videoUrl);

    if($stmt->execute()){
        echo "<script>alert('Exercise added successfully!');</script>";
    } else {
        echo "<script>alert('Error. Please try again.');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Custom Exercise</title>
<style>
    body {font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0 auto; padding: 20px; max-width: 600px;}
    .container {background-color: #fff; padding: 20px; border-radius: 5px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);}
    h2 {color: #333;}
    form {display: flex; flex-direction: column;}
    label {margin-top: 10px;}
    input[type=text], textarea {padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 5px;}
    input[type=submit] {margin-top: 20px; padding: 10px 20px; background-color: #0056b3; color: white; border: none; border-radius: 5px; cursor: pointer;}
    input[type=submit]:hover {background-color: #004494;}
</style>
</head>
<body>

<div class="container">
    <h2>Add Custom Exercise</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="exercise_name">Exercise Name:</label>
        <input type="text" name="exercise_name" required>

        <label for="instructions">Instructions:</label>
        <textarea name="instructions" rows="4" required></textarea>

        <label for="video_url">Video URL (optional):</label>
        <input type="text" name="video_url">
        
        <input type="submit" value="Add Exercise">
    </form>
</div>

</body>
</html>

I must emphasize that real-world applications should separate concerns, following best practices such as using PHP for backend logic, HTML/CSS/JS for the frontend presentation, and employing a secure method for any database interaction, including using placeholders or similar mechanisms to prevent SQL injection risks and ensuring all user input is validated and sanitized.