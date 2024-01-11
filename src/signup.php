<?php session_start(); ?>
<?php require './db-connect.php'; ?>
<?php require './header.php'; ?>
<?php require './menu.php'; ?>
<form action="product.php" method="post">

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $shoes_id = $_POST['shoes_id'];
    $shoes_name = $_POST['shoes_name'];
    $brand = $_POST['brand'];

    // Prepare the SQL statement
    $query = "INSERT INTO shoes (shoes_id, shoes_name, brand) VALUES (:shoes_id, :shoes_name, :brand)";
    
    // Create a PDO statement
    $statement = $pdo->prepare($query);

    // Check if the statement was created successfully
    if ($statement) {
        // Bind parameters
        $statement->bindParam(':shoes_id', $shoes_id);
        $statement->bindParam(':shoes_name', $shoes_name);
        $statement->bindParam(':brand', $brand);

        // Execute the statement
        if ($statement->execute()) {
            echo "Shoes registered successfully!";
        } else {
            echo "Shoes registration failed.";
        }
    } else {
        echo "Error in preparing SQL statement.";
    }
}
?>

<form action="product.php" method="post">
    <label for="shoes_id">Shoes ID:</label>
    <input type="text" name="shoes_id" required>

    <label for="shoes_name">Shoes Name:</label>
    <input type="text" name="shoes_name" required>

    <label for="brand">Brand:</label>
    <input type="text" name="brand" required>

    <button type="submit">Register Shoes</button>
</form>

<?php require './footer.php'; ?>