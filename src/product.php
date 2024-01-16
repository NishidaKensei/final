<?php session_start(); ?>
<?php require './db-connect.php'; ?>
<?php require './header.php'; ?>
<?php require './menu.php'; ?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品検索</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #495057;
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

        form {
            background-color: #fff;
            padding: 20px;
            margin: 20px auto;
            max-width: 400px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
        }

        input[type="text"] {
            width: 70%;
            padding: 10px;
            margin-right: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #ff66b2;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        hr {
            margin-top: 20px;
            margin-bottom: 20px;
            border: 0;
            border-top: 1px solid #ddd;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #343a40;
            color: #fff;
        }

        a {
            text-decoration: none;
            color: #ff66b2;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<form action="product.php" method="post">
    <label for="keyword">　</label>
    <input type="text" id="keyword" name="keyword">
    <input type="submit" value="検索">
</form>

<hr>

<?php
echo '<table>';
echo '<tr><th>商品ID</th><th>商品名</th><th>ブランド</th></tr>';
$pdo = new PDO($connect, USER, PASS);
if (isset($_POST['keyword'])) {
    $sql = $pdo->prepare('SELECT * FROM shoes WHERE shoes_name LIKE ?');
    $sql->execute(['%' . $_POST['keyword'] . '%']);
} else {
    $sql = $pdo->query('SELECT * FROM shoes');
}
foreach ($sql as $row) {
    $shoes_id = $row['shoes_id'];
    echo '<tr>';
    echo '<td>', $shoes_id, '</td>';
    echo '<td><a href="detail.php?shoes_id=', $shoes_id, '">', $row['shoes_name'], '</a></td>';
    echo '<td>', $row['brand'], '</td>';
    echo '</tr>'; 
}
echo '</table>';
?>

<?php require './footer.php'; ?>

</body>
</html>