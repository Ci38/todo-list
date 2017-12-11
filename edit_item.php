<?php
session_start();
?>
<html>
<head>
    <title>Edit todo</title>
<body>
<?php
echo "<h1> Edit Todo List</h1><br/>";
$user=$_SESSION["user"];
?>
<?php $name=filter_input(INPUT_POST,'task_name');
$tid=filter_input(INPUT_POST,'task_id');
$date=filter_input(INPUT_POST,'ddate');
?>
<h4>Edit Details for todo <br><br> <?php echo $name; ?> </h4>
<form name="add" method="post" action="list.php">
    <input type="hidden" name="action" value="edit_item">
    <input type="hidden" name="todoid" value="<?php echo $tid ;?>">
    <input type="hidden" name="pdate" value="<?php echo $date ;?>">
    <input type="hidden" name="old_name" value="<?php echo $name ;?>">

    <table>
        <tr><td>Edit Todo Title</td> <td><input type="text" value="" name="email"></td></tr>
        <tr><td>Edit Todo</td> <td><input type="text" value="" name="username"></td></tr>
        <tr><td></td><td><input style="float: right;" type="submit" name="submit" value="Save Todo"></td></tr>
    </table>
    <p><a href="list.php">Back</a></p>
</form>