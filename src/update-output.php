<?php session_start(); ?>
<?php require './db-connect.php'; ?>
<?php require './header.php'; ?>
<?php require './menu.php'; ?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Shoes Information</title>
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

        .update-form {
            background-color: #fff;
            padding: 20px;
            margin: 20px auto;
            max-width: 600px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .submit-btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: #0056b3;
        }

        .message-container {
            margin-top: 20px;
            padding: 15px;
            border-radius: 5px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
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

if (empty($_REQUEST['shoes_id']) || empty($_REQUEST['shoes_name']) || empty($_REQUEST['brand'])) {
    echo '<div class="message-container failure-message">Please fill in all fields.</div>';
} else {
    $shoes_id = htmlspecialchars($_REQUEST['shoes_id']);
    $shoes_name = $_REQUEST['shoes_name'];
    $brand = $_REQUEST['brand'];

    $checkSql = $pdo->prepare('SELECT COUNT(*) FROM shoes WHERE shoes_id = ?');
    $checkSql->bindParam(1, $shoes_id);
    $checkSql->execute();
    $count = $checkSql->fetchColumn();

    if ($count > 0) {
        $sql = $pdo->prepare('UPDATE shoes SET shoes_name=?, brand=? WHERE shoes_id=?');
        $sql->bindParam(1, $shoes_name);
        $sql->bindParam(2, $brand);
        $sql->bindParam(3, $shoes_id);

        if ($sql->execute()) {
            echo '<div class="message-container success-message">Update Successful!</div>';
        } else {
            echo '<div class="message-container failure-message">Update Failed...</div>';
        }
    } else {
        echo '<div class="message-container failure-message">The specified shoes_id does not exist.</div>';
    }
}
?>

<?php require './footer.php'; ?>

</body>
</html>