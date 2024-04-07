<?php
// Define database connection variables
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Define variables and initialize with empty values
$clientName = $contactName = $contactEmail = $contactPhone = "";
$clientName_err = $contactName_err = $contactEmail_err = $contactPhone_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate client name
    if(empty(trim($_POST["clientName"]))){
        $clientName_err = "Please enter a client name.";
    } else{
        $clientName = trim($_POST["clientName"]);
    }

    // Validate contact name
    if(empty(trim($_POST["contactName"]))){
        $contactName_err = "Please enter a contact name.";
    } else{
        $contactName = trim($_POST["contactName"]);
    }

    // Validate contact email
    if(empty(trim($_POST["contactEmail"]))){
        $contactEmail_err = "Please enter an email.";
    } elseif(!filter_var($_POST["contactEmail"], FILTER_VALIDATE_EMAIL)) {
        $contactEmail_err = "Invalid email format.";
    } else {
        $contactEmail = trim($_POST["contactEmail"]);
    }

    // Validate phone
    if(empty(trim($_POST["contactPhone"]))){
        $contactPhone_err = "Please enter the phone number.";
    } else {
        $contactPhone = trim($_POST["contactPhone"]);
    }

    // Check input errors before inserting in database
    if(empty($clientName_err) && empty($contactName_err) && empty($contactEmail_err) && empty($contactPhone_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO clients (clientName, contactName, contactEmail, contactPhone) VALUES (:clientName, :contactName, :contactEmail, :contactPhone)";
         
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":clientName", $param_clientName, PDO::PARAM_STR);
            $stmt->bindParam(":contactName", $param_contactName, PDO::PARAM_STR);
            $stmt->bindParam(":contactEmail", $param_contactEmail, PDO::PARAM_STR);
            $stmt->bindParam(":contactPhone", $param_contactPhone, PDO::PARAM_STR);
            
            // Set parameters
            $param_clientName = $clientName;
            $param_contactName = $contactName;
            $param_contactEmail = $contactEmail;
            $param_contactPhone = $contactPhone;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    }
    
    // Close connection
    unset($pdo);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Client</title>
    <style>
        .wrapper{
            width: 500px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Add a new Client</h2>
        <p>Please fill this form to add a new client to the CRM.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Client Name</label>
                <input type="text" name="clientName" class="form-control <?php echo (!empty($clientName_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $clientName; ?>">
                <span class="invalid-feedback"><?php echo $clientName_err;?></span>
            </div>    
            <div class="form-group">
                <label>Contact Name</label>
                <input type="text" name="contactName" class="form-control <?php echo (!empty($contactName_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $contactName; ?>">
                <span class="invalid-feedback"><?php echo $contactName_err;?></span>
            </div>
            <div class="form-group">
                <label>Contact Email</label>
                <input type="email" name="contactEmail" class="form-control <?php echo (!empty($contactEmail_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $contactEmail; ?>">
                <span class="invalid-feedback"><?php echo $contactEmail_err;?></span>
            </div>
            <div class="form-group">
                <label>Contact Phone</label>
                <input type="text" name="contactPhone" class="form-control <?php echo (!empty($contactPhone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $contactPhone; ?>">
                <span class="invalid-feedback"><?php echo $contactPhone_err;?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>
    </div>    
</body>
</html>
