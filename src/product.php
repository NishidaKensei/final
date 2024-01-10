<?php session_start(); ?>
<?php require './db-connect.php'; ?>
<?php require './header.php'; ?>
<?php require './menu.php'; ?>
<form action="product.php" method="post">
    商品検索
<input type="text" name="keyword">
<input type="submit" value="検索">
</form>
<hr>
<?php
echo '<table>';
echo '<tr><th>Shoes_ID</th><th>Shoes_name</th><th>Brand</th></tr>';
$pdo=new PDO($connect, USER, PASS);
if (isset($_POST['keyword'])) {
    $sql=$pdo->prepare('select * from shoes where shoes_name like ? ');
    $sql->execute(['%'.$_POST['keyword'].'%']);
} else {
    $sql=$pdo->query('select * from shoes');
}
foreach ($sql as $row) {
    $id=$row['id'];
    echo '<tr>';
    echo '<td>', $shoes_id, '</td>';
    echo '<td>';
    echo '<a href="detail.php?shoes_id=', $shoes_id, '">', $row['shoes_name'], '</a>';
    echo '</td>';
    echo '<td>', $row['brand'], '</td>';
    echo '</tr>'; 
}
echo '</table>';
?>
<?php require './footer.php'; ?>