    <link rel="stylesheet" href="wwwroot/css/cadImovel.css"> 

    <div class="cadastro">
        <form name="cadImovel" id="cadImovel" action="" method="post">
                <label>Descrição:</label> 
                <input type="text" name="descricao" id="descricao"
                value="<?php echo isset($imovel)?$imovel->getDescricao():''; ?>"/><br>
                
                <label>Foto:</label>  
                <input type="text" name="foto" id="foto"
                value="<?php echo isset($imovel)?$imovel->getFoto():''; ?>"/><br>
                
                <label>Valor:</label>  
                <input type="text" name="valor" id="valor"
                value="<?php echo isset($imovel)?$imovel->getValor():''; ?>"/><br>
                
                <label>Tipo:</label>
                <select name="tipo" id="tipo">
                <option value="0">**SELECIONE**</option>
                        <option value="1" <?php echo isset($imovel) && $imovel->getTipo() == 'Apartamento'?'selected':''; ?>>Apartamento</option>
                        <option value="2" <?php echo isset($imovel) && $imovel->getTipo() == 'Casa'?'selected':''; ?>>Casa</option>
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
    call_user_func(array('ImovelController','salvar'));
    header('Location: index.php?action=listar');
}

?>

</html>