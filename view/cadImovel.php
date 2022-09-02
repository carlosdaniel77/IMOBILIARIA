    <link rel="stylesheet" href="wwwroot/css/cadImovel.css"> 

    <div class="cadastro">
        <form name="cadImovel" id="cadImovel" action="" method="post" enctype="multipart/form-data">
                <label>Descrição:</label> 
                <input type="text" name="descricao" id="descricao"
                value="<?php echo isset($imovel)?$imovel->getDescricao():''; ?>"/><br>
                
                <label>Foto:</label>  
                <input type="file" name="foto" id="foto"
                value="<?php echo isset($imovel)?$imovel->getFoto():''; ?>"/><br>
                <?php
                    if(isset($imovel) && !empty($imovel ->getFoto())){
                ?>
                <div class="forn-group form-row">
                    <div class="text-center">
                        <img class="img-thumbnail" style="width: 25%;"
                        src="<?php echo $imovel->getFotoTipo();?>;base64,<?php echo base64_encode($imovel->getFoto());?><?php echo $imovel->getPath();?>">
                    </div>
                </div>
                <?php
                    }
                ?>
                <label>Valor:</label>  
                <input type="text" name="valor" id="valor"
                value="<?php echo isset($imovel)?$imovel->getValor():''; ?>"/><br>
                
                <label>Tipo:</label>
                <select name="tipo" id="tipo">
                <option value="0">**SELECIONE**</option>
                        <option value="1" <?php echo isset($imovel) && $imovel->getTipo() == 'Apartamento'?'selected':''; ?>>Apartamento</option>
                        <option value="2" <?php echo isset($imovel) && $imovel->getTipo() == 'Casa'?'selected':''; ?>>Casa</option>
                </select><br><br>
                <input type="hidden" name="id" id="id" value="<?php echo isset($imovel)?$imovel->getId():''; ?>" />
                <input type="hidden" name="path" id="path" value="<?php echo isset($imovel)?$imovel->getPath():''; ?>" />
                <button name="btnReset" id="btnReset" value="Reset">Reset</button>  
                <button name="btnSalvar" id="btnSalvar" value="Enviar">Enviar</button>    
            </form>
    </div>
    
</body>

<?php

//Verifica se o botão submit foi acionado
if(isset($_POST['btnSalvar'])){

    //Chama uma função PHP que permite informar a classe e o Método que será acionado
    if(isset($imovel)){
        call_user_func(array('ImovelController','salvar'),$imovel->getFoto(),$imovel->getFotoTipo());
    }else{
        call_user_func(array('ImovelController','salvar'));
    }
    
    header('Location: index.php?action=listar');
}

?>
