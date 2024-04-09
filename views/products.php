<?php

require_once('../config/db.php');


require_once('../controllers/ProductController.php');


$productController = new ProductController($conn);


if (isset($_POST['add_product'])) {

    $productController->addProduct($_POST['nome'], $_POST['descricao'], $_POST['quantidade'], $_POST['preco'], $_POST['categoria']);
}


$products = $productController->getAllProducts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3 class="text-center mb-4">Produtos</h3>


                <a href="add_product.php" class="btn btn-add-product mb-3">Adicionar Produto</a>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Quantidade</th>
                            <th>Preço</th>
                            <th>Categoria</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($products as $product) {
                            echo "<tr>";
                            echo "<td>".$product['id']."</td>";
                            echo "<td>".$product['nome']."</td>";
                            echo "<td>".$product['descricao']."</td>";
                            echo "<td>".$product['quantidade']."</td>";
                            echo "<td>".$product['preco']."</td>";
                            echo "<td>".$product['categoria']."</td>";
                            echo "<td class='table-actions'>";
                            echo "<a href='edit_product.php?id=".$product['id']."' class='btn btn-edit'>Editar</a>";
                            echo "<a href='delete_product.php?id=".$product['id']."' class='btn btn-delete ml-1'>Excluir</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
