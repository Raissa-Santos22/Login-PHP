<?php
session_start();

Require 'Usuario.class.php';
$usuario = new Usuario();

if(isset($_POST['nome'])){  
    $nome = addslashes($_POST['nome']);
    $email= addslashes($_POST['email']);
    $senha = md5 (addslashes ($_POST['senha']));
    $conn = $usuario-> conecta();

    if( $conn ){
        $user = $usuario->checkUser($email);
        if(!$user){
            $user = $usuario->inserirUsuario($nome, $email, $senha);
           if($user){
            $_SESSION['nome'] = $nome;
            header("Location:home.php");
           } else{
                echo "<h1>Erro ao cadastrar o Usuario</h1>";
           }
        }else{
            echo "<h1>Usuario JA CADASTRADO. Vá para o login</h1>";
            exit();
        }
    }else{
        echo "Banco indisponível, tente mais tarde";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuario</title>
     <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h2>Cadastro de Usuarios </h2>
    <form action="cadastrar.php" method = "post">
        <input type="text" name="nome" placeholder ="Informe o nome" id=""><p>
        <input type="text" name="email" placeholder="Informe o email" id=""><p>
        <input type="text" name="senha" placeholder="Informe a senha" id=""><p>
       <button type="submit">Cadastrar</button>
    </form>
</body>
</html>
