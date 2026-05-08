<?php
require "Usuario.class.php";
$usuario = new Usuario;

$conn = $usuario->conectar();

if( $conn ) {
    $user = $usuario->inserirUsuario("Gabriel Henrique", "gabriel@gmail.com", "321");
    
    if ($user) {
        echo "Usuario inserido com sucesso";
    } else {
        echo "Erro ao inserir o usuario";
    }
} else {
    echo "<h1>Conexão indisponivel";
    exit();
}