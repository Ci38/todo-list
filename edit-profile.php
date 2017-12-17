<?php
$page_title = " Edit Profile";
include_once 'session.php';
include_once 'parseProfile.php';
//include_once 'Profile.php';
include_once 'validation.php';
include_once 'database.php';
include_once 'csspage.php';

?>
<html>

<body>
<h2><center>Edit Profile </center></h2>
<br><br>

<?php if(isset($result)) echo $result; ?>
<?php if(!empty($form_errors)) echo show_errors($form_errors); ?>


<?php if (!isset($_SESSION['name'], $_SESSION['user_id'], $_SESSION['isLogged'])): ?>
    <P>You are not authorized to view this page <a href="login.php">Login</a>
        Not yet a member? <a href="signup.php">Signup</a> </P>
<?php else: ?>
    <form method="post" action="profile.php" enctype="multipart/form-data">

        <label for="email">Email</label>
        <input type="text" name="email"  id="email" value="<?php if(isset($email)) echo $email; ?>" >

        <label for="username">Username</label>
        <input type="text" name="username" value="<?php if(isset($username)) echo $username; ?>"  id="username">

        <label for="fname">first name</label>
        <input type="text" name="fname" value="<?php if(isset($fname)) echo $fname; ?>" id="fname">


        <label for="lname">last name</label>
        <input type="text" name="lname" value="<?php if(isset($lname)) echo $lname; ?>"  id="lname">


        <input type="hidden" name="hidden_user_id" value="<?php if(isset($id)) echo $id; ?>">
        <input type="hidden" name="token" value="<?php if(function_exists('_token')) echo _token(); ?>">
        <input type="submit" name="updateProfileBtn" value="update profile">

    </form>

<?php endif ?>

<br><br><br><br>
<p><center><a href="profile.php">Back</a></center> </p>


</body>
</html>