// PARAMETERS: Function: Body Mass Index (BMI) Calculator: "Determine BMI by entering height and weight, and provide health recommendations. Example: User enters their height and weight to calculate BMI and receive health advice Product: Children's Clothing Style: Romeo and Juliet
<?php
// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to database
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "my_database";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $height = $_POST['height'] / 100; // Convert to meters
    $weight = $_POST['weight'];
    $bmi = $weight / ($height * $height);

    // Health recommendation
    $health = "";
    if ($bmi <= 18.5) {
        $health = "Underweight - Eat more nutritious food.";
    } elseif ($bmi <= 24.9) {
        $health = "Normal weight - Keep it up!";
    } elseif ($bmi <= 29.9) {
        $health = "Overweight - Exercise more frequently.";
    } else {
        $health = "Obesity - Seek a doctor's advice.";
    }

    // Insert into database
    $sql = "INSERT INTO BMIRecords (height, weight, bmi, health) VALUES ('$height', '$weight', '$bmi', '$health')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>BMI Calculator - Romeo and Juliet Style</title>
    <style>
        body {
            font-family: 'Times New Roman', serif;
            background-color: #f5f5dc;
        }
        .container {
            width: 300px;
            padding: 10px;
            background-color: white;
            border-radius: 8px;
            margin: auto;
            margin-top: 50px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input[type="text"], button {
            width: 100%;
            padding: 10px;
            margin: 5px 0px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            background-color: #556b2f;
            color: white;
            font-size: 18px;
        }
        .result {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>BMI Calculator</h2>
        <form action="" method="post">
            <input type="text" name="height" placeholder="Height in cm" required>
            <input type="text" name="weight" placeholder="Weight in kg" required>
            <button type="submit">Calculate BMI</button>
        </form>
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
            <div class="result">
                <h3>Your BMI is: <?php echo round($bmi, 2); ?></h3>
                <p><?php echo $health; ?></p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
