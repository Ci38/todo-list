<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);

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
<p>You are logged in as <?php if(isset($_SESSION['username'])) echo $_SESSION['username'];?> <a href="logout.php">Logout</a></p>

<?php endif  ?>

</body>
</html>

