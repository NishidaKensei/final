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

        form {
            background-color: #343a40; /* Dark background color */
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
            background-color: #ff66b2;
        }
    </style>
</head>
<body>

<?php
$pdo = new PDO($connect, USER, PASS);
foreach ($pdo->query('select * from shoes') as $row) {
    echo '<form class="update-form" action="update-output.php" method="post">';
    echo '<div class="form-group">';
    echo '<label for="shoes_id">Shoes ID</label>';
    echo '<input type="text" class="form-control" name="shoes_id" value="', $row['shoes_id'], '">';
    echo '</div>';
    echo '<div class="form-group">';
    echo '<label for="shoes_name">Shoes Name</label>';
    echo '<input type="text" class="form-control" name="shoes_name" value="', $row['shoes_name'], '">';
    echo '</div>';
    echo '<div class="form-group">';
    echo '<label for="brand">Brand</label>';
    echo '<input type="text" class="form-control" name="brand" value="', $row['brand'], '">';
    echo '</div>';
    echo '<button type="submit" class="btn btn-primary submit-btn">更新</button>';
    echo '</form>';
    echo "\n";
}
?>

<?php require './footer.php'; ?>

</body>
</html>