<?php

include_once 'database.php';
include_once 'validation.php';


session_start();
?>

<html>
<title> Todo List </title>
<body>
<br>
<p><a href="index.php">Back</a><br><br><a href="logout.php">Logout</a></p>
<p>You are logged-in as <?php if(isset($_SESSION['username'])) echo $_SESSION['username'];?><br></p><hr>
<div class="container">
    <div class="jumbotron">
        <?php
        echo "<h1> Your Todo List </h1><br/>";
        $user=$_SESSION["user"];
        echo "Welcome, " . $_SESSION["username"] . '<br/>';
        echo "Your todo items are displayed below ";
        echo "<br> <br>";
        ?>
    </div>
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Todo</th>

                </tr>
                </thead>
                <tbody>
                <?php  foreach ($result as $res): ?>
                    <tr>

                        <td> <?php echo $res['todo_item']; ?>  </td>
                        <td> <?php echo $res['Due_Date'];?> </td>
                        <td> <form method = 'post' action='edit_item.php'>

                                <input type="hidden" value="<?php echo $res['id'];?> " name="task_id"/>
                                <input type="hidden" value="<?php echo $res['todo_item'];?> " name="task_name"/>
                                <input type="hidden" value="<?php echo $res['Due_Date'];?> " name="ddate"/>
                                <input type="submit" class="btn btn-info" value="Edit"/> </form> </td>


                        <td> <form method = 'post' action='index.php'>
                                <input type="hidden" name="action" value="complete">
                                <input type="hidden" value="<?php echo $res['id']; ?> " name="task_id" />
                                <input type="submit" class="btn btn-success" value="Complete"/> </form> </td>

                        <td> <form method = 'post' action='index.php'>
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" value="<?php echo $res['id']; ?> "  name="task_id"/>
                                <input type="submit" class="btn btn-danger" value="Delete"/> </form> </td>

                    </tr>
                    <?php
                endforeach;
                ?>
                <td> <form method = 'post' action='add_todoitem.php'>   <input class="btn btn-primary" type="submit" value="Add Todo"/> </form></td>
                <td> <form method = 'post' action='edit_item.php'>   <input type="hidden" name="action" value="compitems"> <input class="btn btn-success" type="submit" value="Edit Todo"/> </form></td>

                <td> <form method = 'post' action='index.php'>   <input type="hidden" name="action" value="pend"> <input class="btn btn-warning" type="submit" value="Delete Todo"/> </form></td>
                </tbody>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
</body>
</html>
