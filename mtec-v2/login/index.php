<?php
require "Usuario.class.php";
$usuario = new Usuario;

$conn = $usuario->conectar();

if( $conn ) {
    $user = $usuario->inserirUsuario("gabriel@gmail.com", "Gabriel Henrique", "321");
    
    if ($user) {
        echo "Usuario inserido com sucesso";
    } else {
        echo "Erro ao inserir o usuario";
    }
} else {
    echo "<h1>Conexão indisponivel";
}