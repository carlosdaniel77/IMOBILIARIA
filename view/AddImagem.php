<?php 
    require_once 'controller/GaleriaController.php';
    require_once 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Galeria</title>
</head>
<body>
<div class="cadastro">
        <form name="cadImovel" id="cadImovel" action="" method="post" enctype="multipart/form-data">
            <div class="">
                <label for="foto">Foto da Galeria: </label>  
                <input type="file" name="fotoG" id="fotoG">
                <input type="submit" value="Salvar" style="width: 80px;">                
            </div>                                
        </form>
    </div>
    
</body>
</html>