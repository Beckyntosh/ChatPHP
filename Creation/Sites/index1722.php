<?php
// Define MySQL connection parameters
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Define variables and initialize with empty values
$name = $healthInfo = "";
$name_err = $healthInfo_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    $input_name = trim($_POST["name"]);
    if (empty($input_name)) {
        $name_err = "Please enter a name.";
    } elseif (!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))) {
        $name_err = "Please enter a valid name.";
    } else {
        $name = $input_name;
    }
    
    // Validate health info
    $input_healthInfo = trim($_POST["healthInfo"]);
    if (empty($input_healthInfo)) {
        $healthInfo_err = "Please enter the health information.";     
    } else {
        $healthInfo = $input_healthInfo;
    }
    
    // Check input errors before inserting in database
    if (empty($name_err) && empty($healthInfo_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO pets (name, health_info) VALUES (:name, :healthInfo)";
 
        if ($stmt = $pdo->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":name", $param_name);
            $stmt->bindParam(":healthInfo", $param_healthInfo);
            
            // Set parameters
            $param_name = $name;
            $param_healthInfo = $healthInfo;
            
            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        unset($stmt);
    }
    
    // Close connection
    unset($pdo);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Pet Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0c040;
            color: #333;
        }
        .wrapper {
            width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
        }
        .form-group {
            margin-bottom: 10px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input[type="text"],
        .form-group textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .form-group button {
            padding: 10px 20px;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: #fff;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Create Pet Profile</h2>
        <p>Please fill this form to create a pet profile.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                <span class="help-block"><?php echo $name_err;?></span>
            </div>
            <div class="form-group <?php echo (!empty($healthInfo_err)) ? 'has-error' : ''; ?>">
                <label>Health Info</label>
                <textarea name="healthInfo" class="form-control"><?php echo $healthInfo; ?></textarea>
                <span class="help-block"><?php echo $healthInfo_err;?></span>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" value="Submit">Submit</button>
            </div>
        </form>
    </div>    
</body>
</html>
<?php
// Check if the pets table exists, create if not
$checkTable = $pdo->query("SHOW TABLES LIKE 'pets'");
if ($checkTable->rowCount() == 0) {
    // sql to create table
    $sql = "CREATE TABLE pets (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    health_info TEXT,
    reg_date TIMESTAMP
    )";
    
    // Execute query
    $pdo->exec($sql);
}
?>
