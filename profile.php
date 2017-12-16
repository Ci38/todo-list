<?php

include_once 'parseProfile.php';
include_once'session.php';
include_once'database.php';
include_once 'csspage.php';
include_once 'validation.php';

?>
<html>
<body>

        <?php if(!isset($_SESSION['username'])): ?>
            <P>You are not authorized to view this page <a href="login.php">Login</a>
                Not Registered? <a href="signup.php">Signup</a> </P>
        <?php else: ?>
            <h2><p><center><?php if(isset($_SESSION['username'])) echo $_SESSION['username'];?>'s Profile</center></p></h2>
                <table>

                    <tr><th>Email:</th><td><?php if(isset($email)) echo $email; ?></td></tr>
                    <tr><th style="width: 20%;">Username:</th><td><?php if(isset($username)) echo $username; ?></td></tr>
                    <tr><th style="width: 20%;">first name:</th><td><?php if(isset($fname)) echo $fname; ?></td></tr>
                    <tr><th style="width: 20%;">last name:</th><td><?php if(isset($lname)) echo $lname; ?></td></tr>
                    <tr><th style="width: 20%;">password:</th><td><?php if(isset($password)) echo $password; ?></td></tr>
                    <tr><th></th><td><br>
                            <a href="edit-profile.php?user_identity=<?php if(isset($encode_user_id)) echo $encode_user_id; ?>"> edit  Profile</a> &nbsp; &nbsp;
                        </td></tr>
                </table>
            <br>
            <p><center><a href="index1.php">Back</a></center> </p>
        <?php endif ?>
</body>
</html>