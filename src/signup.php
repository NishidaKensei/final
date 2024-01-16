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

        form {
            background-color: #343a40;
            color: #fff;
            padding: 20px;
            margin: 20px auto;
            max-width: 400px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
        }

        form p {
            font-size: 1.2em;
            margin-bottom: 15px;
        }

        label {
            margin-bottom: 5px;
        }

        input[type="text"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #ff66b2; 
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #d9366f;
        }
    </style>
</head>
<body>

<form action="signup-output.php" method="post">
    <p>Insert Shoes Information</p>
    <label for="shoes_id">商品ID</label>
    <input type="text" id="shoes_id" name="shoes_id">

    <label for="shoes_name">商品名</label>
    <input type="text" id="shoes_name" name="shoes_name">

    <label for="brand">ブランド</label>
    <input type="text" id="brand" name="brand">

    <input type="submit" value="登録">
</form>

<?php require './footer.php'; ?>

</body>
</html>