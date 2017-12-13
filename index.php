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

include_once 'csspage.php';
include_once'session.php';
include_once 'footer.php';

?>

<!DOCTYPE HTML>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Homepage</title>
</head>
<body>

<?php
if(!isset($_SESSION['username'])):;

?>
    <div class="topnav">
        <a href="login.php">Login</a>
        <a href="signup.php">Sign Up</a>

    </div>
<h3><center>This is a simple to do list application based on PHP.</center></h3><br><br><br>
    <h4><p><center>Please <a href="login.php">Login </a>to begin. Not registered? <a href="signup.php">Signup</a></center></p></h4>



<?php else: ?>

<div class="topnav">
    <a href="list.php">Access your todo list </a>
    <a href="logout.php">Logout</a>

</div>

<h2><p><center>Welcome, <?php if(isset($_SESSION['username'])) echo $_SESSION['username'];?>! You are now logged in.</center></p></h2>

<?php endif ?>

</body>
</html>

