<?php

require "Usuario.class.php";

$usuario = new Usuario();
$usuario->conecta();

if (isset($_POST['id'])) {

    $id = $_POST['id'];
    $nome = ($_POST['nome']);
    $email = ($_POST['email']);

    $usuario->alterarUsuario($id, $nome, $email);

    header("Location: tabela.php");
    exit;

} else {
    echo "Não foi possível alterar ou usuario.";
}
?>