<?php 

require "Usuario.class.php";

$usuario = new Usuario();

if(isset($_GET['id'])){
    $conn = $usuario->conecta();
    $id = $_GET['id'];
    $localizar = $usuario->localizarUsuario($id);
}else{
    echo "ID não informado. Impossivel editar o usuario";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Alteração de Registro</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h2>Alteração de Registro</h2>
        <form action="editar_submit.php" method="POST">
        <input type="hidden" name="id" value="<?= $localizar['id']; ?>">
        <input type="text" name="nome" value="<?= $localizar['nome']; ?>"> <br><br>
        <input type="text" name="email" value="<?= $localizar['email']; ?>"> <br><br>
    <button type="submit">Salvar Alterações</button>
</form>
</body>
</html>

