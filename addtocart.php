<?php
session_start();
if (isset($_GET) & !empty($_GET)) {
    $id = $_GET['id'];
    if (isset($_GET['quant']) & !empty($_GET['quant'])) {
        $quant = $_GET['quant'];
    } else {
        $quant = 1;
    }
    $_SESSION['cart'][$id] = array("quantity" => $quant);
    header('location: cart.php');
} else {
    header('location: cart.php');
}
echo "<pre>";
print_r($_SESSION['cart']);
echo "</pre>";
