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
                <input type="hidden" name="idImovel" id="idImovel" value="<?php echo $_GET['id'];?>">
                <button name="btnSalvar" id="btnSalvar" value="salvar">Salvar</button>                            
        </form>   
        
    </div>          
    <div class="fotoAdd">
        <div class="fw-bold" style="white-space: nowrap; margin: 0 10px; font-size: 25px;">
            <label for="imagens">Imagens Adicionadas</label> 
        </div>
    </div>  


<?php

//Verifica se o botão submit foi acionado
if(isset($_POST['btnSalvar'])){

    //Chama uma função PHP que permite informar a classe e o Método que será acionado
    if(isset($galeria)){
        call_user_func(array('GaleriaController','salvar'),$galeria->getFoto(),$galeria->getFotoTipo());
    }else{
        call_user_func(array('GaleriaController','salvar'));
    }
    
}

?>
    <div class="imagens">
      <?php  
        
        $galeria = call_user_func(array('GaleriaController','listar'));

        $cont=0;

    
        if (isset($galeria) && !empty($galeria)) {

            foreach ($galeria as $foto) {             
              if($cont==0){ 
                echo '<tr>';
              } 
               echo '<div class= "img">';
               echo '<p align="center"><img class="img-thumbnail" style="width: 300px; height: 200px;" src="'.$foto->getPath().'"></p><br>';
               echo '<a href="?page=imovel&action=excluirFoto&id=<?php echo $galeria->getId();?>&id=<?php echo $galeria->getIdImovel();?>" name="btnExcluir" id="btnExcluir" class="btnExcluir my-3" style="width: 50px; height: 30px;">Excluir</a>';
               echo '</div>';
               $cont++;
               if($cont==4)
                $cont=0;
               }
          }else{
  
              ?>
  
                  <tr>
  
                      <td colspan="3">Nenhum registro encontrado</td>
  
                  </tr>
  
                  <?php
  
          }
          ?>  
    </div>
    