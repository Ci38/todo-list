<?php

include_once 'parseProfile.php';
include_once'session.php';
include_once'database.php';
include_once 'csspage.php';

?>
<html>
<body>
<?php if (!isset($_SESSION['name'], $_SESSION['user_id'], $_SESSION['isLogged'])): ?>

    <P>You are not authorized to view this page <a href="login.php">Login</a>
        Not Registered? <a href="signup.php">Signup</a> </P>
<?php else: ?>
    <h2><p><center><?php if (isset($_SESSION['name'], $_SESSION['user_id'], $_SESSION['isLogged'])) echo $_SESSION['name'];?>'s Profile</center></p></h2>
    <table>

        <tr><th>Email:</th><td><?php if (isset($_SESSION['name'], $_SESSION['user_id'], $_SESSION['isLogged'])) echo $_SESSION['name'];?></td></tr>
        <tr><th style="width: 20%;">Username:</th><td><?php if(isset($_SESSION['username'])) echo $_SESSION['username']; ?></td></tr>
        <tr><th style="width: 20%;">first name:</th><td><?php if(isset($fname)) echo $fname; ?></td></tr>
        <tr><th style="width: 20%;">last name:</th><td><?php if(isset($lname)) echo $lname; ?></td></tr>
        <tr><th style="width: 20%;">password:</th><td><?php if(isset($password)) echo $password; ?></td></tr>
        <tr><th></th><td><br>
                <a href="edit-profile.php?user_identity=<?php if(isset($encode_id)) echo $encode_id; ?>"> edit  Profile</a> &nbsp; &nbsp;
            </td></tr>
    </table>
    <br>
    <p><center><a href="index.php">Back</a></center> </p>
<?php endif ?>
</body>
</html>