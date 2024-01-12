<?php session_start(); ?>
<?php require './db-connect.php'; ?>
<?php require './header.php'; ?>
<?php require './menu.php'; ?>

<?php
$pdo=new PDO($connect, USER, PASS);
if (empty($_REQUEST['shoes_id'])) {
    echo 'Enter shoes_id...';
} elseif (empty($_REQUEST['shoes_name'])) {
    echo 'Enter shoes_name...';
} elseif (empty($_REQUEST['brand'])) {
    echo 'Enter brand...';
} else {
    $shoes_id = htmlspecialchars($_REQUEST['shoes_id']);
    $shoes_name = $_REQUEST['shoes_name'];
    $brand = $_REQUEST['brand'];

    // Check if the specified shoes_id already exists
    $checkSql = $pdo->prepare('SELECT COUNT(*) FROM shoes WHERE shoes_id = ?');
    $checkSql->bindParam(1, $shoes_id);
    $checkSql->execute();
    $count = $checkSql->fetchColumn();

    if ($count > 0) {
        // Update statement with a WHERE clause to specify the record to update
        $sql = $pdo->prepare('UPDATE shoes SET shoes_name=?, brand=? WHERE shoes_id=?');

        // Bind parameters to the prepared statement
        $sql->bindParam(1, $shoes_name);
        $sql->bindParam(2, $brand);
        $sql->bindParam(3, $shoes_id);

        // Execute the update
        if ($sql->execute()) {
            echo 'SUCCESS!';
        } else {
            echo 'FAILURE...';
        }
    } else {
        echo 'The specified shoes_id does not exist.';
    }
}
?>
<?php require './footer.php'; ?>