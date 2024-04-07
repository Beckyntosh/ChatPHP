<?php

$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $recipe_name = $_POST["recipeName"]; 
    $ingredients = $_POST["ingredients"]; 
    $method = $_POST["method"]; 

    $sql = "INSERT INTO recipes (recipe_name, ingredients, method) VALUES ('$recipe_name', '$ingredients', '$method')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "" . $conn->error;
    }
}

$conn->close();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Mediterranean Marvel - Recipe Submission</title>
    <style>
    body {font-family: Arial, Helvetica, sans-serif;}
    </style>
</head>
<body>

<h2>Recipe Submission</h2>

<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
  Recipe Name: <input type="text" name="recipeName">
  <br><br>
  Ingredients: <textarea name="ingredients" rows="5" cols="40"></textarea>
  <br><br>
  Method: <textarea name="method" rows="5" cols="40"></textarea>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

</body>
</html>