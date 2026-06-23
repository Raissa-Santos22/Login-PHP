<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Usuario</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .fundo{
            background: #f0f0f0;
        }
    </style>
</head>
<body class="container fundo">

<?php

require '../php/Usuario.class.php';

$usuario = new Usuario();
$con = $usuario->conecta();

if(!$con){

    echo "Banco indisponível. Tenta mais tarde!";
    exit();

}else{

    echo "<a href='../html/cadastroUsuario.html' class='btn btn-success my-5'>Novo Usuario</a>";

    $usuario = $usuario->listarUsuarios();

    // montagem html da tabela

    $table  = '<table class="table table-striped">';
    $table .= '<thead>';
    $table .= '<tr>';
    $table .= '<th>Selecionar Usuario</th>';
    $table .= '<th>Codigo</th>';
    $table .= '<th>Nome</th>';
    $table .= '<th>Email</th>';
    $table .= '<th colspan="2">Ações</th>';
    $table .= '</tr>';
    $table .= '</thead>';
    $table .= '<tbody>';

    // laço de repetição para inclusão dos dados na tabela

    foreach($usuario as $item){

        $id = $item["id"];
        $nome = $item["nome"];
        $email = $item["email"];

        $table .= "<tr>";
        $table .= "<td><input type='checkbox' value='$id'></td>";
        $table .= "<td>$id</td>";
        $table .= "<td>$nome</td>";
        $table .= "<td>$email</td>";
        $table .= "<td><a class='btn btn-info' href='editar.php?id=$id'>Editar</a></td>";
        $table .= "<td><a class='btn btn-danger' href='deletar.php?id=$id'>Excluir</a></td>";
        $table .= "</tr>";
    }

    $table .= '</tbody>';
    $table .= '</table>';

    echo $table;
}

?>

</body>
</html>