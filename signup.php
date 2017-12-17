<?php
include 'csspage.php';

if (!isset($_SESSION['name'], $_SESSION['user_id'], $_SESSION['isLogged'])) {
    ?>

    <!DOCTYPE html>
    <html>
    <head lang="en">
        <meta charset="UTF-8">
        <title>Register Page</title>
    </head>
    <body>

    <style>

        .center {
            text-align: center;
        }

        input[type=text], select {
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
    <body>
    <h3><center>Sign Up Form</center></h3>

    <div>
        <form method="POST" action="index.php">

            <label for="email">Email</label>
            <input class="validate" type="text" value="" name="email" placeholder="Your Email" required>

            <label for="username">UserName</label>
            <input class="validate" type="text" value="" name="username" placeholder="Your UserName (1+ characters)" required>

            <label for="fname">First Name</label>
            <input class="validate" type="text" value="" name="fname" placeholder="Your First Name" required>

            <label for="lname">Last Name</label>
            <input class="validate" type="text" value="" name="lname" placeholder="Your Last Name" required>

            <label for="password">Password</label>
            <input pattern=".{6,}"  required title="6 characters minimum" class="validate" type="password" value="" name="password"  placeholder="Your Password (6+ characters)"required>


            <input type="hidden" name="action" value="new_user">

            <button class="button" type="submit">Create Account</button> &nbsp;
            <br><br>
            &nbsp; <p style="color: black">Already have an Account? <a href="login.php"> Login</a></p>

        </form>
    </div>

    <?php
} else {
    header("Location: index.php");
}
include 'footer.php';
?>