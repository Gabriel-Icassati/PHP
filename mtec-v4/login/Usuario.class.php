<?php
class Usuario {
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $pdo;

    
    function conectar() {
        try {
            $dns = "mysql:dbname=usuarioMtec;host=localhost";
            $dbUser = "root";
            $dbPass = "";
            $this->pdo = new PDO($dns, $dbUser, $dbPass);
            return true;
        } catch (\Throwable $th) {
            echo "Problema $th";
            return false;
        }
    }

    public function inserirUsuario($email, $nome, $senha) {
        # passo 1 - criar uma variável com a consulta
        $sql = "INSERT INTO usuarios SET nome = :n, email = :e, senha = :s";

        #passo 2 - passar para o método prepare essa consulta
        $stmt = $this->pdo->prepare($sql);

        # passo 3 - para cada pelido, usar o método bindValue
        $stmt->bindValue(":n", $nome);
        $stmt->bindValue(":e", $email);
        $stmt->bindValue(":s", $senha);

        # passo 4 - executar o comando
        return $stmt->execute();
    }

    public function checkUser($email) {
        $sql = "SELECT * FROM usuario WHERE email = :e";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":e", $email);
        return $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    public function checkpass($email, $senha) {
        $sql = "SELECT * FROM usuario WHERE email = e: AND senha = :s";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue("e", $email);
        $stmt->bindValue("s", md5($senha));
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    public function listarUsuarios() {
        $sql = "SELECT * FROM usuario";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll();
        } else {
            return array();
        }
    }

    public function listarUsuario($id) {
        $sql = "SELECT * FROM usuario WHERE id = :i";
        $stmt = $this->$pdo->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll();
        } else {
            return array();
        }
    }

    public function apagarUsuario($id) {
        $sql = "DELETE FROM usuario WHERE id = :i";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":i", $id);
        $stmt->execute();
    }

    public function alterarUsuario($id) {
        $sql = "UPDATE usuario SET nome = :n, email = :e, senha = :s WHERE id = :i";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":i", $id);
    }
}