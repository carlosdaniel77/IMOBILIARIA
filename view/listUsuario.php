    <link rel="stylesheet" href="wwwroot/css/listUsuario.css"> 

    <div class="titulo">
        <h1>Usuários</h1>
        <hr>
    </div>
    <div class="cadastro">
        <table style="top:40px;">
            <thead>
                <tr>
                    <th>Login</th>
                    <th>Permissão</th>
                    <th><a href="index.php">Novo Cadastro</a></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $usuarios = call_user_func(array('UsuarioController', 'listar'));
                    //Verifica se houve algum retorno
                    if(isset($usuarios) && !empty($usuarios)){
                        foreach($usuarios as $usuario){
                ?> 
                            <tr>
                                <!-- Como o retorno é um objeto, devemos chamar os gets para mostrar o resultado -->
                                <td><?php echo $usuario->getLogin();?></td>
                                <td><?php echo $usuario->getPermissao();?></td>
                                <td>
                                    <button><a href="index.php?page=usuario&action=editar&id=<?php echo $usuario->getId(); ?>">Editar</a></button>
                                    <button><a href="index.php?page=usuario&action=excluir&id=<?php echo $usuario->getId(); ?>">Excluir</a></button>
                                </td>
                            </tr>
                            <?php                
                        }
                    }else{
                        ?>
                        <tr>
                            <td colspan="3">Nenhum registro cadastrado</td>
                        </tr>
                        <?php
                    }
                    ?>
            </tbody>
        </table>
    </div>
</body>
</html>