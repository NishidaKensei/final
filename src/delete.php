<?php session_start(); ?>
<?php require './db-connect.php'; ?>
<?php require './header.php'; ?>
<?php require './menu.php'; ?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品削除</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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

<!-- Main Content -->
<table class="table">
    <thead>
        <tr>
            <th scope="col">商品ID</th>
            <th scope="col">商品名</th>
            <th scope="col">ブランド</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $pdo = new PDO($connect, USER, PASS);

        foreach ($pdo->query('SELECT * FROM shoes') as $row) {
            echo '<tr>';
            echo '<td>', $row['shoes_id'], '</td>';
            echo '<td>', $row['shoes_name'], '</td>';
            echo '<td>', $row['brand'], '</td>';
            echo '<td><a href="delete-output.php?shoes_id=', $row['shoes_id'], '">Delete</a></td>';
            echo '</tr>';
            echo "\n";
        }
        ?>
    </tbody>
</table>

<?php require './footer.php'; ?>

</body>
</html>
