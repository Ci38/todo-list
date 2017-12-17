<?php
include_once 'csspage.php';
include_once 'footer.php';
include_once 'session.php';

if (!isset($_SESSION['name'], $_SESSION['user_id'], $_SESSION['isLogged'])) {
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Login Page</title>
</head>
<body>

<style>

    .center {
        text-align: center;
    }

    input[type=email], select {
        width: 40%;
        padding: 8px 20px;
        margin: 8px 0;
        display: table;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=password], select {
        width: 40%;
        padding: 8px 20px;
        margin: 8px 0;
        display: table;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }


    input[type=submit] {
        width: 40%;
        background-color: #5160d1;
        color: white;
        padding: 10px 10px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #0000FF;
    }

    p.serif {
        font-family: "Comic Sans MS";
    }

</style>


<h3><center>Login Form </center></h3>

<form method="POST" id="login_center_form" action="index.php">

    <label for="email">Email</label>
    <input class="validate" type="email" name="email" placeholder="Your Email" required>

    <br>

    <label for="password">Password</label>
    <input class="validate" type="password"  name="password" placeholder="Your password" required>

    <input type="hidden" name="action" value="checking_user">
    <br>
    <button class="button" type="submit">Login</button><br>
    <br><br>
    &nbsp;&nbsp;Not Registered? <a href="signup.php">Sign Up</a>
</form>
<div id="validate_login_check"></div>

<?php
} else {
    echo 'You are logged in <a href="index.php">Back?</a>';
}

?>
</body>
</html>