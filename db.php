<?php
include_once 'session.php';

function checkUserValid($email,$password){
    global $db;
    $query = 'SELECT * FROM accounts WHERE email = :email and password = :pass';
    $statement = $db->prepare($query);
    $statement->bindValue(':email',$email);
    $statement->bindValue(':pass',$password);
    $statement->execute();
    $result= $statement->fetchAll();
    $statement->closeCursor();
    $count = $statement->rowCount();

    $sql = 'SELECT * FROM accounts WHERE email = :email';
    $statement2 = $db->prepare($sql);
    $statement2->bindValue(':email',$email);
    $statement2->execute();
    $statement2->closeCursor();
    $count2 = $statement2->rowCount();
    if($count == 1){
        $_SESSION['name'] = $result[0]['fname'].' '.$result[0]['lname'];
        $_SESSION['user_id'] = $result[0]['id'];
        $_SESSION['isLogged'] = true;
        return true;
    } else if($count!=1 && $count2 == 1){
        session_destroy();
        return 'This email exists';
    } else if($count!=1 && $count2 == 0) {
        session_destroy();
        return 'Invalid';
    }
    return false;
}
function createUser($email, $username, $fname, $lname, $password) {
    global $db;
    $query = "SELECT * FROM accounts WHERE email = :email";
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $statement->closeCursor();
    $count = $statement->rowCount();
    if($count > 0) {
        return true;
    } else {
        $insert_query = "INSERT INTO accounts (email, username, fname, lname, password) VALUES (:email, :username, :fname, :lname, :pass)";
        $statement = $db->prepare($insert_query);
        $statement->bindValue(':email',$email);
        $statement->bindValue(':username',$username);
        $statement->bindValue(':fname',$fname);
        $statement->bindValue(':lname',$lname);
        $statement->bindValue(':pass',$password);
        $statement->execute();
        $statement->closeCursor();
        return false;
    }
}
function getTodoItems($user_id) {
    global $db;
    $query = "SELECT * FROM todos WHERE user_id = :userid";
    $statement = $db->prepare($query);
    $statement->bindValue(':userid', $user_id);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();
    return $result;
}
function getTodoItem($user_id, $todo_id) {
    global $db;
    $query = "SELECT * FROM todos WHERE user_id = :user_id AND id = :todo_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':todo_id', $todo_id);
    $statement->execute();
    $result = $statement->fetch();
    $statement->closeCursor();
    return $result;
}
function addTodoItem($user_id, $todo_title, $due_date, $due_time) {
    global $db;
    $query = "INSERT INTO todos(user_id, todo_title, due_date, due_time) values (:user_id, :todo_title, :due_date, :due_time)";
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':todo_title', $todo_title);
    $statement->bindValue(':due_date', $due_date);
    $statement->bindValue(':due_time', $due_time);
    $statement->execute();
    $statement->closeCursor();
    return true;
}
function deleteTodoItem($user_id, $todo_id) {
    global $db;
    $query = 'DELETE FROM todos WHERE id = :todo_id and user_id = :user_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':todo_id', $todo_id);
    $statement->execute();
    $statement->closeCursor();
}
function updateTodo($user_id, $todo_id, $todo_title, $due_date, $due_time) {
    global $db;
    $query = "UPDATE todos SET todo_title=:todo_title, due_date = :due_date, due_time=:due_time WHERE user_id=:user_id AND id=:todo_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':todo_id', $todo_id);
    $statement->bindValue(':todo_title', $todo_title);
    $statement->bindValue(':due_date', $due_date);
    $statement->bindValue(':due_time', $due_time);
    $statement->execute();
    $statement->closeCursor();
    return true;
}
?>