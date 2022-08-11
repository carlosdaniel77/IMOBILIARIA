    <link rel="stylesheet" href="wwwroot/css/cadUsuario.css"> 

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

