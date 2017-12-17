<?php
include_once 'session.php';
include_once 'database.php';
include_once 'db.php';

$action = filter_input(INPUT_POST, "action");
if (isset($_SESSION['name'], $_SESSION['user_id'], $_SESSION['isLogged'])) {
    if ($action == '') {
        $result = getTodoItems($_SESSION['user_id'], 'pending');
        include 'list.php';
    }
    else if ($action == 'add') {
        $add_todo_title = filter_input(INPUT_POST, 'add_todo_title');
        $add_due_date = filter_input(INPUT_POST, 'add_due_date');
        $add_due_time = filter_input(INPUT_POST, 'add_due_time');
        addTodoItem($_SESSION['user_id'], $add_todo_title, $add_due_date, $add_due_time);
        $result = getTodoItems($_SESSION['user_id'], 'pending');
        include 'list.php';
    }
    else if ($action == 'update_todo_item') {
        $todo_id = filter_input(INPUT_POST, "todo_id");
        $todo_title = filter_input(INPUT_POST, "edit_todo_title");
        $due_date = filter_input(INPUT_POST, "edit_due_date");
        $due_time = filter_input(INPUT_POST, "edit_due_time");
        $user_id = $_SESSION['user_id'];
        $res = updateTodo($user_id, $todo_id, $todo_title, $due_date, $due_time);
        if ($res) {
            $result = getTodoItems($_SESSION['user_id'], 'pending');
            include 'list.php';
        } else {
            header("Location: index.php");
        }
    }
    else if ($action == 'delete') {
        $action = '';
        $selected = filter_input(INPUT_POST, "todo_id");
        deleteTodoItem($_SESSION['user_id'], $selected);
        $result = getTodoItems($_SESSION['user_id'], 'pending');
        include 'list.php';
    }
}
else {
    if ($action == 'checking_user') {
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        $valid_user = checkUserValid($email, $password);
        if ($valid_user === true) {
            $result = getTodoItems($_SESSION['user_id'], 'pending');
            include 'list.php';
        } elseif ($valid_user === 'This email exists') {
            echo '<h2>Invalid username or password</h2>';
        } elseif ($valid_user === 'Invalid') {
            echo '<h2>Invalid username or password</h2>';
        }
    }
    else if ($action == 'new_user') {
        $email = filter_input(INPUT_POST, 'email');
        $username = filter_input(INPUT_POST, 'username');
        $fname = filter_input(INPUT_POST, 'fname');
        $lname = filter_input(INPUT_POST, 'lname');
        $password = filter_input(INPUT_POST, 'password');
        $user_exists = createUser($email, $username, $fname, $lname, $password);
        if ($user_exists == true) {
            include('user_exists.php');
        } else {
            $valid_user = checkUserValid($email, $password);
            if ($valid_user === true) {
                $result = getTodoItems($_SESSION['user_id'], 'pending');
                include 'list.php';
            }
        }
    }
    elseif ($action == "") {
        include('login.php');
    }
}
?>