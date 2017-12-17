<?php
include_once 'database.php';

if (isset($_SESSION['name'], $_SESSION['user_id'], $_SESSION['isLogged'])) {
    $id = $_SESSION['id'];

    $sqlQuery = "SELECT * FROM accounts WHERE id = :id";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array(':id' => $id));

    while($rs = $statement->fetch()){
        $email = $rs['email'];
        $username = $rs['username'];
        $fname = $rs['fname'];
        $lname = $rs['lname'];
        $password = $rs['password'];
    }

    $encode_id = base64_encode("encodeuserid{$id}");

}
