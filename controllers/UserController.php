<?php
require_once('../models/User.php');
require_once('../config/db.php'); // Inclua o arquivo que contém a definição de $conn

class UserController {
    private $userModel;

    public function __construct($conn) {
        $this->userModel = new User($conn);
    }

    public function addUser($name, $email, $password) {
        $result = $this->userModel->addUser($name, $email, $password);
        if ($result) {
            header('Location: ../views/users.php');
            exit;
        } else {
            $_SESSION['error'] = "Erro ao adicionar usuário. Por favor, tente novamente.";
            header('Location: ../views/add_user.php');
            exit;
        }
    }
}

// Verifique se o formulário para adicionar usuário foi submetido
if (isset($_POST['add_user'])) {
    // Crie uma instância do UserController passando $conn como argumento
    $userController = new UserController($conn);
    // Chame o método addUser com os dados do formulário
    $userController->addUser($_POST['name'], $_POST['email'], $_POST['password']);
}
?>
