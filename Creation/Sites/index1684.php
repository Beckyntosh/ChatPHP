<?php
//Error reporting enabled for debugging - turn off in production
error_reporting(E_ALL); ini_set('display_errors', '1');

//Connection settings
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_HOST', 'db');
define('MYSQL_DATABASE', 'my_database');

$dsn = 'mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DATABASE; 
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
); 

try{
    $pdo = new PDO($dsn, MYSQL_USER, MYSQL_PASSWORD, $options);
} catch(PDOException $e){
    echo $e->getMessage();
    die();
}

session_start();

function verifyStep($pdo, $email, $step, $code){
    $stmt = $pdo->prepare("SELECT * FROM account_recovery_steps WHERE email = ? AND step = ? AND code = ?");
    $stmt->execute([$email, $step, $code]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])){
    if($_POST['action'] == 'startRecovery'){
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['step'] = 1; // Start the recovery process at step 1
        // Would in a full program be creating and emailing a code here.
    } elseif ($_POST['action'] == 'verifyCode' && isset($_POST['verificationCode']) && isset($_SESSION['step']) && isset($_SESSION['email'])){
        $verificationResult = verifyStep($pdo, $_SESSION['email'], $_SESSION['step'], $_POST['verificationCode']);
        if($verificationResult){
            $_SESSION['step']++;
            if($_SESSION['step'] > 2){
                echo 'Account recovered. <a href="/">Go to Home</a>';
                session_destroy();
                exit;
            }
        } else {
            echo 'Verification failed. Please try again.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Account Recovery</title>
</head>
<body style="background-color: #f0f0f0; font-family: Arial, sans-serif;">
    <div style="margin: auto; width: 50%; padding: 10px;">
        <?php if(!isset($_SESSION['step'])): ?>
            <form method="POST">
                <label for="email">Enter your email:</label>
                <input type="email" id="email" name="email" required>
                <input type="hidden" name="action" value="startRecovery">
                <button type="submit">Start Recovery</button>
            </form>
        <?php else: ?>
            <p>Step <?php echo $_SESSION['step']; ?>: Please enter the code sent to your email.</p>
            <form method="POST">
                <input type="text" name="verificationCode" required>
                <input type="hidden" name="action" value="verifyCode">
                <button type="submit">Verify</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
