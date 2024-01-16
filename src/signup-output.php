<?php session_start(); ?>
<?php require './db-connect.php'; ?>
<?php require './header.php'; ?>
<?php require './menu.php'; ?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品登録</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #495057;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header, footer {
            background-color: #343a40;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        nav {
            background-color: #adb5bd;
            padding: 10px;
        }

        .result-container {
            padding: 20px;
            margin: 20px auto;
            max-width: 400px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .success-message {
            background-color: #28a745;
            color: #fff;
        }

        .failure-message {
            background-color: #dc3545;
            color: #fff;
        }
    </style>
</head>
<body>

<?php
$pdo = new PDO($connect, USER, PASS);
$sql = $pdo->prepare('insert into shoes values(?, ?, ?)');
if ($sql->execute([$_REQUEST['shoes_id'], $_REQUEST['shoes_name'], $_REQUEST['brand']])) {
    echo '<div class="result-container success-message">登録完了!!</div>';
} else {
    echo '<div class="result-container failure-message">登録できませんでした...</div>';
}
?>

<?php require './footer.php'; ?>

</body>
</html>