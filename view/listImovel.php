    <link rel="stylesheet" href="wwwroot/css/listImovel.css"> 
    
    <div class="titulo">
        <h1>Imóveis</h1>
        <hr>
    </div>
    <div class="cadastro">
        <table style="top:40px;">
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Foto</th>
                    <th>Valor</th>
                    <th>Tipo</th>
                    <th><a href="index.php">Novo Cadastro</a></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $imoveis = call_user_func(array('ImovelController', 'listar'));
                    //Verifica se houve algum retorno
                    if(isset($imoveis) && !empty($imoveis)){
                        foreach($imoveis as $imovel){
                            ?> 
                            <tr>
                                <!-- Como o retorno é um objeto, devemos chamar os gets para mostrar o resultado -->
                                <td><?php echo $imovel->getDescricao();?></td>
                                <td><img class="img-thumbnail" style="width: 25%;"
                        src="data:<?php echo $imovel->getFotoTipo();?>;base64,<?php echo base64_encode($imovel->getFoto());?>"></td>
                                <td><?php echo $imovel->getValor();?></td>
                                <td><?php echo $imovel->getTipo();?></td>
                                <td>
                                    <button><a href="index.php?page=imovel&action=editar&id=<?php echo $imovel->getId(); ?>">Editar</a></button>
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
            </tbody>
        </table>
    </div>
</body>
</html>