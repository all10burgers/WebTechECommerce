<?php

if(isset($_POST["add_cart"])) {
    $product = $_POST["product"];
    $quantity = $_POST["quantity"];

    if(!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = [];
        header("location:cart.php");
    }

    $_SESSION["cart"][$product] = $quantity;
    header("location:cart.php");
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Phone Accessory E-Commerce</title>
        <link rel="stylesheet"
            href="store.css">
        
    </head>
    <body>
        <header>Welcome <?php
        $user = $_SESSION["user"];
        echo $user["name"];
        ?> to the Phone Accessory E-Commerce Website!
        </header>
        <nav>
        <a href=
            "store.php">
                Shop</a> |
        <a href=
            "cart.html">
                Cart</a> |
        <a href=
            "contact.html">
                Contact</a> |
        <a href=
            "logout.php">
                Logout</a> |
        </nav>