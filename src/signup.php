<?php session_start(); ?>
<?php require './db-connect.php'; ?>
<?php require './header.php'; ?>
<?php require './menu.php'; ?>

<p>insert shoes infomation</p>
<form action="signup-output.php" method="post">
    Shoes_id<input type="text" name="shoes_id">
    Shoes_name<input type="text" name="shoes_name">
    Brand<input type="text" name="brand">
    <input type="submit" value="Insert">
</form>
<?php require './footer.php'; ?>