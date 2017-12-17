<?php

include_once 'session.php';
include_once 'csspage.php';

if (isset($_SESSION['name'], $_SESSION['user_id'], $_SESSION['isLogged'])) {
    ?>
    <div id="add_todo">
        <h2>Add Todo</h2>
        <form method="post" action="index.php" style="display: inline">
            <input type="hidden" name="action" value="add">
            <div class="input-field">
                <label for="add_todo_title">Title</label>
                <input type="text" name="add_todo_title" id="add_todo_title" required>
            </div>
            <br>
            <div class="input-field">
                <label for="add_due_date">Due Date</label>
                <input class="" type="text" id="add_due_date" name="add_due_date">
            </div>
            <br>
            <label for="add_due_date">Due Time</label>
            <input type='text' class="" id="add_due_time" placeholder="Due Time" name="add_due_time">
            <br><br><br>
            <button class="button" type="submit">Add Todo</button>
        </form>
        <a style="display: inline" href="index.php"><button class="button">Cancel</button></a>
    </div>

    <?php
} else {
    header("Location: index.php");
}
?>