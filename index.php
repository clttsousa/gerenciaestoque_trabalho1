<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: views/login.php');
    exit;
} else {
    header('Location: views/products.php');
}
?>