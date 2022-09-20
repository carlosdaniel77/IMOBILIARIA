<?php
require_once 'model/Galeria.php';

class GaleriaController{
    /**
     * Salvar o galeria submetido pelo formulário
     */
    public static function salvar($fotoAtual='',$fotoTipo=''){
        //cria um objeto do tipo Imóvel
        $galeria = new Galeria;
        
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
        //quer dizer que o usuário alterou a imagem ou está cadastrando uma galeria nova
        if(!empty($imagem)){
            $galeria->setFoto($imagem['data']);
            $galeria->setFotoTipo($imagem['tipo']);
            $galeria->setPath($imagem['path']);
            //Verifica se existe um path da imagem e se sim removo a mesma do servidor
            if(!empty($_POST['path'])){
                unlink($_POST['path']);
            }    
        }else{

            $galeria->setPath($imagem['path']);
            $galeria->setFoto($fotoAtual);
            $galeria->setFotoTipo($fotoTipo);

        }

        //armazena as informações do $_POST via set
        $galeria->setIdImovel($_POST['idImovel']);
        //chama o método save para gravar as informações no banco de dados
        $galeria->save();
    }
    /** 
     * Lista da galeria
    */
    public static function listar(){
        $idImovel = $_GET['id'];
        //cria um objeto do tipo Galeria      
        $galerias = new Galeria;      
        //chama o método listAll()
        return $galerias->listAllImagem($idImovel);
    }

    public static function excluir($id){
        $galeria = new Galeria();
        $galeria = $galeria->remove($id);
    }
}


?>