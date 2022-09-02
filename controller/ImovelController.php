<?php
require_once 'model/Imovel.php';

class ImovelController{
    /**
     * Salvar o imóvel submetido pelo formulário
     */
    public static function salvar($fotoAtual='',$fotoTipo=''){
        //cria um objeto do tipo Imóvel
        $imovel = new Imovel;
        
        //trata a foto para ser armazenada no banco de dados
        $imagem = array();
        if(is_uploaded_file($_FILES['foto']['tmp_name'])){
            $imagem['data'] = file_get_contents($_FILES['foto']['tmp_name']);
            $imagem['tipo'] = $_FILES['foto']['type'];
            $imagem['path'] = 'imagens/'.$_FILES['foto']['name'];
            //upload do arquivo para o servidor 
            move_uploaded_file($_FILES['foto']['tmp_name'],$imagem['path']);
        }
        //verifica se o array imagem não está vazio, se tiver alguma imagem no mesmo
        //quer dizer que o usuário alterou a imagem ou está cadastrando um imovel novo
        if(!empty($imagem)){
            $imovel->setFoto($imagem['data']);
            $imovel->setFotoTipo($imagem['tipo']);
            $imovel->setPath($imagem['path']);
            //Verifica se existe um path da imagem e se sim removo a mesma do servidor
            if(!empty($_POST['path'])){
                unlink($_POST['path']);
            }    
        }else{
            $imovel->setFoto($fotoAtual);
            $imovel->setFotoTipo($fotoTipo);
            $imovel->setPath($_POST['path']);
        }

        //armazena as informações do $_POST via set
        $imovel->setId($_POST['id']);
        $imovel->setDescricao($_POST['descricao']);
        $imovel->setValor($_POST['valor']);
        $imovel->setTipo($_POST['tipo']);

        //chama o método save para gravar as informações no banco de dados
        $imovel->save();
    }
    /** 
     * Lista os móveis
    */
    public static function listar(){
        //cria um objeto do tipo Imóvel
        $imoveis = new Imovel;
        //chama o método listAll()
        return $imoveis->listAll();
    }

    public static function editar($id){
        $imovel = new Imovel();
        $imovel = $imovel->find($id);
        return $imovel;
    }

    public static function excluir($id){
        $imovel = new Imovel();
        $imovel = $imovel->remove($id);
    }
}


?>