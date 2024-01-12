<?php session_start(); ?>
<?php require './db-connect.php'; ?>
<?php require './header.php'; ?>
<?php require './menu.php'; ?>

<?php
$pdo=new PDO($connect, USER, PASS);
$sql=$pdo->prepare('insert into shoes values( ?, ?, ?)');
if ($sql->execute([$_REQUEST['shoes_id'], $_REQUEST['shoes_name'], $_REQUEST['brand']])) {
    echo 'SUCCESS!!';
} else {
    echo 'FAILURE...';
}
?>
<?php require './footer.php'; ?>