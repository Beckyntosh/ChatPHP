<!DOCTYPE html>
<html>
<head>
    <title>GPA Calculator for Maternity Wear Website</title>
    <style>
        body {font-family: Arial, sans-serif; padding: 20px;}
        .container {max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px;}
        h2 {text-align: center;}
        form div {padding-bottom: 10px;}
        label {display: block; margin-bottom: 5px;}
        input[type="text"], input[type="number"] {width: 100%; padding: 8px; margin: 6px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;}
        .button-container{text-align: center;}
        button {background-color: #f14e95; color: white; padding: 14px 20px; margin: 8px 0; border: none; cursor: pointer; border-radius: 4px;}
        button:hover {background-color: #c53d80;}
    </style>
</head>
<body>

<div class="container">
    <h2>GPA Calculator</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div>
            <label for="course1">Course 1 grade:</label>
            <input type="text" id="course1" name="grades[]" required>

            <label for="credits1">Course 1 credits:</label>
            <input type="number" id="credits1" name="credits[]" required>
        </div>
        <div>
            <label for="course2">Course 2 grade:</label>
            <input type="text" id="course2" name="grades[]" required>

            <label for="credits2">Course 2 credits:</label>
            <input type="number" id="credits2" name="credits[]" required>
        </div>
Add more courses as needed
        <div class="button-container">
            <button type="submit" name="calculate">Calculate GPA</button>
        </div>
    </form>
    
    <?php
        if (isset($_POST['calculate'])) {
            $grades = $_POST['grades'];
            $credits = $_POST['credits'];

            $totalGradePoints = 0;
            $totalCredits = 0;

            for ($i = 0; $i < count($grades); $i++) {
                $grade = strtoupper($grades[$i]);
                $credit = intval($credits[$i]);

                $point = 0;
                if ($grade == 'A') $point = 4;
                elseif ($grade == 'B') $point = 3;
                elseif ($grade == 'C') $point = 2;
                elseif ($grade == 'D') $point = 1;
                
                $totalGradePoints += $point * $credit;
                $totalCredits += $credit;
            }

            $gpa = 0;
            if ($totalCredits > 0) {
                $gpa = $totalGradePoints / $totalCredits;
            }

            echo "<p>Your GPA is: " . round($gpa, 2) . "</p>";
        }
    ?>
</div>

</body>
</html>