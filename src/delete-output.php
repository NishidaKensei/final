<?php session_start(); ?>
<?php require './db-connect.php'; ?>
<?php require './header.php'; ?>
<?php require './menu.php'; ?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Result</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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

        .message-container {
            margin: 20px auto;
            padding: 20px;
            max-width: 400px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .success-message {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }

        .failure-message {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
        }
    </style>
</head>
<body>

<?php
$pdo = new PDO($connect, USER, PASS);
$sql = $pdo->prepare('DELETE FROM shoes WHERE shoes_id=?');

if ($sql->execute([$_REQUEST['shoes_id']])) {
    echo '<div class="message-container success-message">SUCCESS!</div>';
} else {
    echo '<div class="message-container failure-message">FAILURE...</div>';
}
?>

<?php require './footer.php'; ?>

</body>
</html>