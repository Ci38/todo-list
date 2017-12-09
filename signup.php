<?php

include_once 'database.php';
include_once 'validation.php';

//process the form
if(isset($_POST['signupBtn'])){

    $form_errors = array();

    //Form validation
    $required_fields = array('email', 'username','fname', 'lname', 'password');

    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

    $fields_to_check_length = array('fname' => 1, 'password' => 6);

    $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));

    $form_errors = array_merge($form_errors, check_email($_POST));

    if(empty($form_errors)){
        //collect form data and store in variables
        $email = $_POST['email'];
        $username = $_POST['username'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $password = $_POST['password'];

        //hashing the password
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        try{

            $sql = "INSERT INTO accounts (email, username, fname, lname, password) VALUES (:email, :username, :fname, :lname, :password)";
            $statement = $db->prepare($sql);
            $statement->execute(array(':email' => $email,':username' => $username, ':fname' => $fname, ':lname' => $lname,':password' => $hashed_password));

            //check if one new row was created
            if($statement->rowCount() == 1){
                $result = "<p style='padding:20px; border: 1px solid gray; color: green;'> Registration Successful</p>";
            }
        }catch (PDOException $ex){
            $result = "<p style='padding:20px; border: 1px solid gray; color: red;'> An error occurred: ".$ex->getMessage()."</p>";
        }
    }
    else{
        if(count($form_errors) == 1){
            $result = "<p style='color: red;'> There was 1 error in the form<br>";
        }else{
            $result = "<p style='color: red;'> There were " .count($form_errors). " errors in the form <br>";
        }
    }

}

?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Register Page</title>
</head>
<body>
<h2>Todo List Application</h2><hr>

<h3>Registration Form</h3>

<?php if(isset($result)) echo $result; ?>
<?php if(!empty($form_errors)) echo show_errors($form_errors); ?>
<form method="post" action="">
    <table>
        <tr><td>Email:</td> <td><input type="text" value="" name="email"></td></tr>
        <tr><td>Username:</td> <td><input type="text" value="" name="username"></td></tr>
        <tr><td>First name:</td> <td><input type="text" value="" name="fname"></td></tr>
        <tr><td>Last name:</td> <td><input type="text" value="" name="lname"></td></tr>
        <tr><td>Password:</td> <td><input type="password" value="" name="password"></td></tr>
        <tr><td></td><td><input style="float: right;" type="submit" name="signupBtn" value="Signup"></td></tr>
    </table>
</form>
<p><a href="index.php">Back</a> </p>
</body>
</html>