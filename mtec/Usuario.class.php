<?php
    class Usuario {
        private $id;
        private $nome;
        private $email;
        private $senha;
        private $pdo;

        public function conecta() {
            $dns = "mysql:dbname=usuariomtec;host=localhost";
            $user = "root";
            $pass = "";
            
            try {
                $this->pdo = new PDO($dns, $user, $pass);
                return true;
            } catch (\Throwable $th) {
                return false;
            }
        }
    }