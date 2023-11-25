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