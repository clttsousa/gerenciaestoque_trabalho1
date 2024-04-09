<?php
session_start();

require_once('../config/db.php');
require_once('../models/User.php');

class LoginController {
    private $user;

    public function __construct($conn) {
        $this->user = new User($conn);
    }

    public function login($email, $senha) {
        if ($this->user->login($email, $senha)) {
            $_SESSION['loggedin'] = true;
            header('Location: ../views/products.php');
            exit;
        } else {
            $_SESSION['error'] = "Login inválido. Por favor, tente novamente.";
            header('Location: ../views/login.php');
            exit;
        }
    }
}

if (!isset($conn)) {
    echo "Erro: Conexão não definida.";
    exit;
}

$loginController = new LoginController($conn);

if (isset($_POST['login'])) {
    $loginController->login($_POST['email'], $_POST['senha']);
}
?>
