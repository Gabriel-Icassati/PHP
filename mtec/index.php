<?php
require "Usuario.class.php";

$usuario = new Usuario();

$conn = $usuario->conecta();
    
if( $conn ) {
        echo "<h1>Conectado ao banco de dados!";
}else {
        echo "<h1>Banco indisponível. Tente mais tarde";
}