<?php

$username = 'ci38';
$dsn = 'mysql:host=sql2.njit.edu; dbname=ci38';
$password = 'chhavi12345';

try {

    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected";
}
catch(PDOException $e){
    echo "Connection Error".$e->getMessage();
}