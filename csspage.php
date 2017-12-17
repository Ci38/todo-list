<?php
include_once 'session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
        }

        .header {
            background-color: #d4d8f7;
            padding: 2px;
            text-align: center;
        }

        .topnav {
            overflow: hidden;
            background-color: #5160d1;
        }

        .topnav a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }


        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        p.serif {
            font-family: "Comic Sans MS";
        }
        .button {
            background-color: #008CBA;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }

    </style>


</head>
<body>


<header>
    <head lang="en">
        <meta charset="UTF-8">
    </head>
    <div class="header">
        <h1><p class="serif"><font color="#1b2cad">Todo List Application </font></p></h2></h1>
        <p></p>
    </div>

    <?php
    if (isset($_SESSION['name'], $_SESSION['user_id'], $_SESSION['isLogged'])):;
        ?>

        <div class="topnav">
            <a href="profile.php">My Profile </a>
            <a href="logout.php">Logout</a>

        </div>

        <h2><p><center>Hello, <?php echo $_SESSION["name"];?>!</center></p></h2>

    <?php else: ?>

    </div>
    <h3><center>This is a simple to do list application based on PHP.</center></h3><br><br><br>
    <h3><center> Please <a href="login.php"> Login</a> or <a href="signup.php"> Sign Up</a> to get started.</center></h3>
</header>
<?php endif ?>
</body>
</html>