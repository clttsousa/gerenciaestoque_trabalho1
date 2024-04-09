<?php
require_once('../models/Product.php');

class ProductController {
    private $productModel;

    public function __construct($conn) {
        $this->productModel = new Product($conn);
    }

    public function getAllProducts() {
        return $this->productModel->getAllProducts();
    }

    public function addProduct($name, $description, $quantity, $price, $category) {
        $result = $this->productModel->addProduct($name, $description, $quantity, $price, $category);
        if ($result) {
            header('Location: ../views/products.php');
            exit;
        } else {
            $_SESSION['error'] = "Erro ao adicionar produto. Por favor, tente novamente.";
            header('Location: ../views/add_product.php');
            exit;
        }
    }
}


if (isset($_POST['add_product'])) {

    $productController = new ProductController($conn);
    $productController->addProduct($_POST['name'], $_POST['description'], $_POST['quantity'], $_POST['price'], $_POST['category']);
}
?>