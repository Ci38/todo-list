<?php

include_once 'index.php';
include_once 'db.php';

$hashed_password = password_hash($password, PASSWORD_BCRYPT);

if(password_verify($password, $hashed_password)){
    $result = getTodoItems($_SESSION['user_id'], 'pending');
    include 'list.php';
}else{
    echo 'Invalid';
}