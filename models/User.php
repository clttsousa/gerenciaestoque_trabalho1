<?php

class User {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function login($email, $senha) {
        $query = "SELECT * FROM usuarios WHERE email = ? AND senha = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $email, $senha);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            return true;
        } else {
            return false;
        }
    }

    public function addUser($nome, $email, $senha) {
        $query = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sss", $nome, $email, $senha);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

?>
