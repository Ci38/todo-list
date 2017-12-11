<?php
session_start();
?>
<html>
<head>
    <title>Add Todo</title>
<body>
<?php
echo "<h1> Todo List </h1><br/>";
$user=$_SESSION["user"];
?>

<h4> Enter New Todo Details </h4>
<form name="add" method="post" action="list.php">
    <input type="hidden" name="action" value="add_item">
<table>
    <tr><td>Todo Title</td> <td><input type="text" value="" name="todo title"></td></tr>
    <tr><td>Todo Complete</td> <td><input type="text" value="" name="todo complete"></td></tr>
    <tr><td>Todo Date Created</td> <td><input type="text" value="" name="todo created"></td></tr>
    <tr><td>Todo Date Updated</td> <td><input type="text" value="" name="todo updated"></td></tr>
    <tr><td></td><td><input style="float: right;" type="submit" name="submit" value="Add Todo"></td></tr>
</table>
</form>

</body>
<p><a href="list.php">Back</a> </p>
</html>
</head>
</html>