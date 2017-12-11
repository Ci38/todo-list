<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);

//Class to load classes it finds the file when the program starts to fail for calling a missing class
class Manage {
    public static function autoload($class) {
        include $class . '.php';
    }
}
spl_autoload_register(array('Manage', 'autoload'));


include_once'session.php';

?>

<!DOCTYPE HTML>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Homepage</title>
</head>
<body>
<h2>Todo List Application </h2><hr>

<?php
if(!isset($_SESSION['username'])):;

?>
<p>You are not signed in <a href="login.php">Login</a> Not registered? <a href="signup.php">Signup</a></p>
<?php else: ?>
<p>You are logged in as <?php if(isset($_SESSION['username'])) echo $_SESSION['username'];?><br><br> <a href="list.php">Access your todo list </a><br><br><a href="logout.php">Logout</a></p>

<?php endif  ?>

</body>
</html>

