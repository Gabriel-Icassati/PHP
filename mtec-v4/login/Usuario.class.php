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

    function inserirUsuario($email, $nome, $senha) {
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

}