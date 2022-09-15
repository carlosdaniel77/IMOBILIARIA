<?php 
    require_once 'controller/GaleriaController.php';
    require_once 'header.php';
?>

<link rel="stylesheet" href="wwwroot/css/addImagem.css"> 

    <div class="cadastro">
        <form name="addImagem" id="addImagem" action="" method="post" enctype="multipart/form-data">
            <div class="">
                <label for="foto">Galeria: </label>  
                <input type="file" name="foto" id="foto"
                value="<?php echo isset($galeria)?$galeria->getFoto():''; ?>"/><br>
                <?php
                    if(isset($galeria) && !empty($galeria->getFoto())){
                ?>
                <div class="forn-group form-row">
                    <div class="text-center">
                        <img class="img-thumbnail" style="width: 25%;"
                        src="<?php echo $galeria->getFotoTipo();?>;base64,<?php echo base64_encode($galeria->getFoto());?><?php echo $galeria->getPath();?>">
                    </div>
                </div>
                <?php
                    }
                ?>
                <input type="hidden" name="id" id="id" value="<?php echo isset($galeria)?$galeria->getId():''; ?>" />
                <input type="hidden" name="path" id="path" value="<?php echo isset($galeria)?$galeria->getPath():''; ?>" />
                <button name="btnSalvar" id="btnSalvar" value="salvar">Salvar</button>                            
        </form>        
                <?php
                    $galerias = call_user_func(array('GaleriaController', 'listar'));
                    //Verifica se houve algum retorno
                    if(isset($galerias) && !empty($galerias)){
                        foreach($galerias as $galerias){
                ?> 
                <tr>                    
                    <!-- Como o retorno é um objeto, devemos chamar os gets para mostrar o resultado -->
                    <td><?php echo $galeria->getIdImovel();?></td>
                    <td><img class="img-thumbnail" style="width: 25%;"
                    src="data:<?php echo $galeria->getFotoTipo();?>;base64,<?php echo base64_encode($galeria->getFoto());?>"></td>
                    <td>
                        <button><a href="index.php?page=imovel&action=excluir&id=<?php echo $imovel->getId(); ?>">Excluir</a></button>                      
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
            </div>                                
    </div>

    <?php

//Verifica se o botão submit foi acionado
if(isset($_POST['btnSalvar'])){

    //Chama uma função PHP que permite informar a classe e o Método que será acionado
    if(isset($imovel)){
        call_user_func(array('GaleriaController','salvar'),$galeria->getFoto(),$galeria->getFotoTipo());
    }else{
        call_user_func(array('GaleriaController','salvar'));
    }
    
    header('Location: index.php?action=listar');
}

?>
    