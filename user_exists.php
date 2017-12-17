<?php

if (!isset($_SESSION['name'], $_SESSION['user_id'], $_SESSION['isLogged'])) {
    ?>
    <h2>This email already exists. Please choose another email</h2>
    <form action="signup.php" method="post" class="center">
        <button type="submit">Back</button>
    </form>
    <?php
} else {
    header('Location: index.php');
}
?>