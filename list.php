<?php
include_once 'session.php';
include_once 'csspage.php';

if (isset($_SESSION['name'], $_SESSION['user_id'], $_SESSION['isLogged'])) {
?>
<?php
global $result;
?>

<div>
    <h3 class="center"> Todo List </h3>

    <?php
    if (!empty($result)){

        foreach ($result as $res1):
            ?>
            <?php echo $res1['todo_title'] ?>
            <br>

            <form action="editTodo.php" method="post" class="edit_todo_form">
                <input type="hidden" name="todo_id" value="<?php echo $res1['id'] ?>">
                <button type="submit"><b>View / Edit Todo</b></button>
            </form>
            <br>
            <form action="index.php" method="post" class="delete_todo_form">
                <input type="hidden" name="todo_id" value="<?php echo $res1['id'] ?>">
                <input type="hidden" value="delete" name="action">
                <button type="submit"><b>Delete Todo</b></button>
            </form>

            <?php
        endforeach;
    } else {
        echo '<h3 class="center grey-text">Add todos to get started</h3>';
    } ?>
    <br>
    <a href="addTodo.php"><button class="button" style="margin-bottom: 15px;"><b><h4>Add Todo</h4></b></button></a>

    <?php
    } else {
        header("Location: index.php");
    }
    ?>

