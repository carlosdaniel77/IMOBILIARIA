<?php 
    require_once 'controller/GaleriaController.php';
    require_once 'header.php';
?>

<link rel="stylesheet" href="wwwroot/css/addImagem.css"> 

    <div class="cadastro">
        <form name="addImagem" id="addImagem" action="" method="post" enctype="multipart/form-data">
            <div class="">
                <label for="foto">Galeria: </label>  
                <input type="file" name="foto" id="foto">    
            </div>            
                <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']?>">
                <button name="btnSalvar" id="btnSalvar" value="salvar">Salvar</button>                            
        </form>   
        
    </div>          
    <div class="fotoAdd">
        <div class="fw-bold" style="white-space: nowrap; margin: 0 10px; font-size: 25px;">
            <label for="imagens">Imagens Adicionadas</label> 
        </div>
    </div>  

    <?php 
        $galeria = call_user_func(array('GaleriaController','listar'));
        foreach($galerias as $galeria)
        {
        ?>

        <div class="d-flex flex-column">
            <div class="" style="width: 500px; height: 330px; margin-bottom: 5px; margin-right: 20px;">
                <img class="w-100 h-100 img-thumbnail" src="<?php echo $picture->getPath();?>" alt="Imagem do Imóvel">
            
            </div>
            <a href="?page=imovel&action=excluir&id=<?php echo $galeria->getId();?>&id=<?php echo $galeria->getIdImovel();?>" name="btnExcluir" id="btnExcluir" class="btnExcluir my-3" style="width: 65px;">Excluir</a>
        </div>
        <?php
        }
    ?>
    <?php

//Verifica se o botão submit foi acionado
if(isset($_POST['btnSalvar'])){

    //Chama uma função PHP que permite informar a classe e o Método que será acionado
    if(isset($galeria)){
        call_user_func(array('GaleriaController','salvar'));
    }else{
        call_user_func(array('GaleriaController','salvar'));
    }
    
    header('Location: index.php?page=imovel$action=listar');
}

?>
    