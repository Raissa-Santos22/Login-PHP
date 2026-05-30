<?php
require "Usuario.class.php";

$usuario = new Usuario();

$conn = $usuario->conecta();

if( $conn ){
    $user = $usuario->listarUsuarios();
    if( empty($user)){
        echo "Não há usuários para listar!";
    }else{
        ?>
        <table border = "1" width = 600px>
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Email</th>
                <th colspan = "2 ">Ações</th>
            </tr>
        <?php
        foreach ($user as $item) {
            $id = $item['id'];
            $nome = $item['nome'];
            $email = $item['email'];
            ?>
            
            <tr> 
                <td><?php echo $item['id']; ?> </td>
                <td><?php echo $item['nome']; ?></td>
                <td><?php echo $item['email']; ?></td>
                <td><a href="editar.php?id=<?php echo $item['id']; ?> " >Editar</a></td>
                <td><a href="excluir.php?id=<?php echo $item['id']; ?> " >Excluir</a></td>
        
            </tr>
            <?php
        }
        ?>
        </table>
        <?php
    }
}else{
    echo "Banco indisponível. Tente novamente mais tarde!";
}
