<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head elements -->
</head>
<body>
    <!-- Check if the user is authenticated -->
    <?php if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']) : ?>

    <!-- Form for Adding a Product -->
    <form action="admin_operations.php" method="post">
        <input type="text" name="productName" placeholder="Product Name" required>
        <textarea name="productDescription" placeholder="Product Description"></textarea>
        <input type="number" step="0.01" name="productPrice" placeholder="Price" required>
        <input type="submit" name="action" value="Add Product">
    </form>

    <!-- Form for Deleting a Product -->
    <form action="admin_operations.php" method="post">
        <input type="number" name="productId" placeholder="Product ID" required>
        <input type="submit" name="action" value="Delete Product">
    </form>

    <?php else: ?>
        <p>You are not authorized to view this page.</p>
    <?php endif; ?>
</body>
</html>