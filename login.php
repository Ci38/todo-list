<?php
include_once 'session.php';
include_once 'database.php';
include_once 'validation.php';

if(isset($_POST['LoginBtn'])){

    $form_errors = array();

//validate
    $required_fields = array('username', 'password');
    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

    if(empty($form_errors)){

        //collect form data
        $user = $_POST['username'];
        $password = $_POST['password'];

        //check if user exist in the database
        $query = "SELECT * FROM accounts WHERE username = :username";
        $statement = $db->prepare($query);
        $statement->execute(array(':username' => $user));

        while($row = $statement->fetch()){
            $id = $row['id'];
            $hashed_password = $row['password'];
            $username = $row['username'];

            if(password_verify($password, $hashed_password)){
                $_SESSION['id'] = $id;
                $_SESSION['username'] = $username;
                redirectto('index');
            }else{
                $result = flashMessage("Invalid username or password");
            }
        }

    }else{
        if(count($form_errors) == 1){
            $result = flashMessage("There was an error in the form");
        }else{
            $result = flashMessage("There were " .count($form_errors). " errors in the form");
        }
    }
}
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
        background-color: #4CAF50;
        color: white;
        padding: 10px 10px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

    div {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 10px;
    }

    p.serif {
        font-family: "Comic Sans MS";
    }

</style>
<body>

<h2><center><p class="serif">Todo List Application</p></center></h2>

<h3><center>Login Form</center></h3>

<?php if(isset($result)) echo $result; ?>
<?php if(!empty($form_errors)) echo show_errors($form_errors); ?>
<div>

    <form method="post" action="">

        <label for="username">UserName</label>
        <input type="text" value="" name="username" placeholder="Your UserName..">

        <label for="password">Password</label>
        <input type="password" value="" name="password" placeholder="Your Password..">


        <input type="submit" name="LoginBtn" value="Sign-In">
    </form>
</div>
<p><a href="index.php">Back</a> </p>
</body>
</html>