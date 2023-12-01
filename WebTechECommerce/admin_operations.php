<?php
session_start();

// Include database connection
include 'db_connection.php';

if (isset($_POST['action'])) {
    if ($_POST['action'] == 'Add Product' && isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']) {
        // Add product to the database
        $name = $_POST['productName'];
        $description = $_POST['productDescription'];
        $price = $_POST['productPrice'];

        // Prepare and bind
        $stmt = $db->prepare("INSERT INTO products (name, description, price) VALUES (?, ?, ?)");
        $stmt->bind_param("ssd", $name, $description, $price);
        $stmt->execute();
        $stmt->close();

        header('Location: admin.php');
    } elseif ($_POST['action'] == 'Delete Product' && isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']) {
        // Delete product from the database
        $id = $_POST['productId'];

        $stmt = $db->prepare("DELETE FROM products WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();

        header('Location: admin.php');
    }
}
?>