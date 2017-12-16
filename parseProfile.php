<?php
include_once 'database.php';
include_once 'validation.php';

 if(isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];


    $sqlQuery = "SELECT * FROM accounts WHERE user_id = :user_id";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array(':user_id' => $user_id));

    while($rs = $statement->fetch()){
        $email = $rs['email'];
        $username = $rs['username'];
        $fname = $rs['fname'];
        $lname = $rs['lname'];
        $password = $rs['password'];
    }

    $encode_user_id = base64_encode("encodeuserid{$user_id}");

}
