<?php
session_start();
Require 'Usuario.class.php';
$usuario = new Usuario();

$connection = $usuario->conecta();

if($connection){
    if(isset($_POST['email'])){
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $user = $usuario->checkUser( $email);

        if($user){
            $user = $usuario->checkPass($email, $senha);

            $_SESSION['nome'] = $nome;
            header("Location:home.php");
        }else{
            echo "Usuário não cadastrado!";
            header("Location:cadastrar.php");

        }
    }
}else{
    echo "<h1>Banco indisponível. Tente novamente mais tarde!</h1>";
    exit();
}