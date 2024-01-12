<?php session_start(); ?>
<?php require './db-connect.php'; ?>
<?php require './header.php'; ?>
<?php require './menu.php'; ?>

<?php
$pdo=new PDO($connect, USER, PASS);
foreach ($pdo->query('select * from shoes') as $row) {
    echo '<form action="update-output.php" method="post">';
    echo '<div class="td1">';
    echo '<input type="text" name="shoes_id" value="', $row['shoes_id'], '">';
    echo '</div>';
    echo '<div class="td1">';
    echo '<input type="text" name="shoes_name" value="', $row['shoes_name'], '">';
    echo '</div>';
    echo '<div class="td1">';
    echo '<input type="text" name="brand" value="', $row['brand'], '">';
    echo '</div>';
    echo '<div class="td2"><input type="submit" value="更新"></div>';
    echo '</form>';
    echo "\n";
}
?>
<?php require './footer.php'; ?>