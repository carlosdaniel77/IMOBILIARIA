<?php
require_once 'model/Imovel.php';

class ImovelController{
    /**
     * Salvar o imóvel submetido pelo formulário
     */
    public static function salvar(){
        //cria um objeto do tipo Imóvel
        $imovel = new Imovel;

        //armazena as informações do $_POST via set
        $imovel->setId($_POST['id']);
        $imovel->setDescricao($_POST['descricao']);
        $imovel->setFoto($_POST['foto']);
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