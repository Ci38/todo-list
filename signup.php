<?php

include_once 'database.php';
include_once 'validation.php';

//process the form
if(isset($_POST['signupBtn'])) {

    $form_errors = array();

    //Form validation
    $required_fields = array('email', 'username', 'fname', 'lname', 'password');

    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

    $fields_to_check_length = array('fname' => 1, 'password' => 6);

    $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));

    $form_errors = array_merge($form_errors, check_email($_POST));

    //collect form data and store in variables
    if (empty($form_errors)) {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $password = $_POST['password'];

    //hashing the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    try {

        $sql = "INSERT INTO accounts (email, username, fname, lname, password) VALUES (:email, :username, :fname, :lname, :password)";
        $statement = $db->prepare($sql);
        $statement->execute(array(':email' => $email, ':username' => $username, ':fname' => $fname, ':lname' => $lname, ':password' => $hashed_password));

        //check if one new row was created
        if ($statement->rowCount() == 1) {
            $result = flashMessage("Registration Successful", "Pass");
        }
    } catch (PDOException $e) {
        $result = flashMessgae("An error occurred: " . $e->getMessage());
    }
}else {
        if (count($form_errors) == 1) {
            $result = flashMessgae("There was 1 error in the form<br>");
        } else {
            $result = flashMessage("There were " . count($form_errors) . " errors in the form <br>");
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

<h3><center>Sign Up Form</center></h3>

<?php if(isset($result)) echo $result; ?>
<?php if(!empty($form_errors)) echo show_errors($form_errors); ?>
<div>

    <form method="post" action="">

        <label for="email">Email</label>
        <input type="text" value="" name="email" placeholder="Your Email..">

        <label for="username">UserName</label>
        <input type="text" value="" name="username" placeholder="Your UserName..">

        <label for="fname">First Name</label>
        <input type="text" value="" name="fname" placeholder="Your First Name..">

        <label for="lname">Last Name</label>
        <input type="text" value="" name="lname" placeholder="Your Last Name..">

        <label for="password">Password</label>
        <input type="password" value="" name="password" placeholder="Your Password..">


        <input type="submit" name="signupBtn" value="Sign Up">
    </form>
</div>


<br>
<h3><center><p>After Sign-up, Please <a href="login.php">Login here</a> to begin. </p></center></h3>
<p><a href="index.php">Back</a> </p>
</body>
</html>