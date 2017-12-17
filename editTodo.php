<?php

include_once 'session.php';
include_once 'csspage.php';
include_once 'db.php';
include_once 'database.php';

if (isset($_SESSION['name'], $_SESSION['user_id'], $_SESSION['isLogged'])) {
    $todo_id = filter_input(INPUT_POST,'todo_id');
    $user_id = $_SESSION['user_id'];
    $result = getTodoItem($_SESSION['user_id'], $todo_id);
    ?>
    <div>
        <h2>Edit Todo Item</h2>
        <form action="index.php" method="post" style="display: inline">
            <input type="hidden" name="todo_id" value="<?php echo $todo_id; ?>">
            <input type="hidden" name="action" value="update_todo_item">
            <div class="input-field">
                <br>
                <label for="todo_title">Title</label>
                <input type="text" name="edit_todo_title" id="todo_title" value="<?php echo $result['todo_title'] ?>" required>
            </div>
            <br>
            <div class="input-field">
                <label for="todo_title">Due Date</label>
                <input type='date' name="edit_due_date" placeholder="Due Date" id="edit_due_date" value="<?php echo $result['due_date'] ?>" >
            </div>
            <br>
            <div class="input-field">
                <label for="todo_title">Due Time</label>
                <input type='time' placeholder="Due Time" name="edit_due_time" id="edit_due_time" value="<?php echo $result['due_time'] ?>">
            </div>
            <br>
            <button class="button" type="submit" style="display: inline">Save Todo</button>
        </form>
        <a style="display: inline" href="index.php"><button class="button">Cancel</button></a>
    </div>

    <?php
} else {
    header("Location: index.php");
}
?>