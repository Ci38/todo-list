<?php
include_once 'session.php';
include_once 'database.php';
include_once 'validation.php';
include_once 'parseLogin.php';

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
<h2>Todo List Application</h2><hr>

<h3>Login Form</h3>

<?php if(isset($result)) echo $result; ?>
<?php if(!empty($form_errors)) echo show_errors($form_errors); ?>
<form method="post" action="">
    <table>
        <tr><td>Username:</td> <td><input type="text" value="" name="username"></td></tr>
        <tr><td>Password:</td> <td><input type="password" value="" name="password"></td></tr>
        <tr><td></td><td><input style="float: right;" type="submit" name="LoginBtn" value="Sign-in"></td></tr>
    </table>
</form>
<p><a href="index.php">Back</a> </p>
</body>
</html>