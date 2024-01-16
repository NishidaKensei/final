<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>メニュー</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #000;
            color: #fff;
        }

        nav {
            background-color: #222;
            text-align: center;
            padding: 20px;
        }

        nav a {
            text-decoration: none;
            color: #fff;
            padding: 10px 20px;
            margin: 0 10px;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
            background-color: #ff66b2;
            border: 1px solid #ff66b2;
            display: inline-block;
        }

        nav a:hover {
            background-color: #fff;
            color: #000;
        }

        hr {
            margin-top: 20px;
            margin-bottom: 20px;
            border: 0;
            border-top: 1px solid #ddd;
        }
    </style>
</head>
<body>

<nav>
    <a href="product.php">商品一覧</a>
    <a href="signup.php">商品登録</a>
    <a href="update.php">更新</a>
    <a href="delete.php">削除</a>
</nav>

<hr>

</body>
</html>