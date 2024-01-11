<?php session_start(); ?>
<?php require './db-connect.php'; ?>
<?php require './header.php'; ?>
<?php require './menu.php'; ?>
<?php
$pdo=new PDO($connect, USER, PASS);
$sql=$pdo->prepare('select * from shoes where shoes_id=?' );
$sql->execute([$_GET['shoes_id']]);
foreach ($sql as $row) {
    echo '<form action="cart-insert.php" method="post">';
    echo '<p>shoes_id:', $row['shoes_id'], '</p>';
    echo '<p>shoes_name:', $row['shoes_name'], '</p>';
    echo '<p>brand:', $row['brand'], '</p>';
    echo '</select></p>';
    echo '<input type="hidden" name="shoes_id" value="', $row['shoes_id'], '">';
    echo '<input type="hidden" name="shoes_name" value="', $row['shoes_name'], '">';
    echo '<input type="hidden" name="brand" value="', $row['brand'], '">';
    echo '</form>';
}
?>
<?php require './footer.php'; ?>