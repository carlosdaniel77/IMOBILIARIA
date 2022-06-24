<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="wwwroot/css/cadUsuario.css"> 
</head>
<body>
    <div class="cadastro">
        <form name="cadUsuario" id="cadUsuario" action="" method="post">
            
            <label>Login:</label> 
            <input type="text" name="login" id="login"
            value="<?php echo isset($usuario)?$usuario->getLogin():''; ?>" /><br>
            <input type="hidden" name="id" id="id" 
            value="<?php echo isset($usuario)?$usuario->getId():''; ?>" />
            
            <label>Senha:</label>  
            <input type="password" name="senha1" id="senha1"
            value="<?php echo isset($usuario)?$usuario->getSenha():''; ?>" /><br>
            
            <label>Confirmação da Senha:</label>  
            <input type="password" name="senha2" id="senha2"
            value="" /><br>
            
            <label>Permissão:</label>
            <select name="permissao" id="permissao">
                <option value="0">**SELECIONE**</option>
                <option value="A" <?php echo isset($usuario) && $usuario->getPermissao() == 'Administrador'?'selected':''; ?>>Administrador</option>
                <option value="C" <?php echo isset($usuario) && $usuario->getPermissao() == 'Comum'?'selected':''; ?>>Comum</option>
            </select><br><br>
            <button name="btnReset" id="btnReset" value="Reset">Reset</button>  
            <button name="btnSalvar" id="btnSalvar" value="Enviar">Enviar</button> 
        </form>
    </div>
</body>

<?php

//Verifica se o botão submit foi acionado
if(isset($_POST['btnSalvar'])){

    //Chama uma função PHP que permite informar a classe e o Método que será acionado
    call_user_func(array('UsuarioController','salvar'));
    header('Location: index.php?action=listar');
}

?>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>