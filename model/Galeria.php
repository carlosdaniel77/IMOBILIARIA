<?php

require_once 'Banco.php';
require_once 'Conexao.php';

class Galeria extends Banco
{
    private $id;
    private $idImovel;
    private $foto;
    private $fotoTipo;
    private $path;

    //métodos de acesso

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getIdImovel(){
        return $this->idImovel;
    }

    public function setIdImovel($idImovel){
        $this->idImovel = $idImovel;
    }

    public function getFoto(){
        return $this->foto;
    }

    public function setFoto($foto){
        $this->foto = $foto;
    }

    public function getFotoTipo(){
        return $this->foto;
    }

    public function setFotoTipo($fotoTipo){
        $this->fotoTipo = $fotoTipo;
    }

    public function getPath(){
        return $this->path;
    }

    public function setPath($path){
        $this->path = $path;
    }

    public function save() {
        $result = false;
        //cria um objeto do tipo conexao
        $conexao = new Conexao();
        //cria a conexao com o banco de dados
        if($conn = $conexao->getConection()){
            if($this->id > 0){
                //cria query de update passando os atributos que serão atualizados
                $query = "UPDATE galeria SET idImovel = :idImovel, foto = :foto, fotoTipo = :fotoTipo,
                            path = :path WHERE id = :id";
                //Prepara a query para execução
                $stmt = $conn->prepare($query);
                //executa a query
                if ($stmt->execute(
                    array(':idImovel' => $this->idImovel, ':foto' => $this->foto,':id'=> $this->id, 
                    ':fotoTipo' => $this->fotoTipo, ':path' => $this ->path))){
                    $result = $stmt->rowCount();
                }
            }else{
                //cria query de inserção passando os atributos que serão armazenados
                $query = "insert into imovel (id, idImovel, foto, fotoTipo, path) 
                values (null,:idImovel,:foto,:fotoTipo,:path)";
                //Prepara a query para execução
                $stmt = $conn->prepare($query);
                //executa a query
                if ($stmt->execute(array(':idImovel' => $this->idImovel, ':foto' => $this->foto,':id'=> $this->id, 
                ':fotoTipo' => $this->fotoTipo, ':path' => $this ->path))){
                    $result = $stmt->rowCount();
                }
            }
        }
        return $result;
    }

    public function remove($id){
        $result = false;

        $conexao = new Conexao();

        $conn = $conexao->getConection();

        $query = "DELETE FROM GALERIA WHERE id = :id";

        $stmt = $conn->prepare($query);

        if($stmt->execute(array(':id'=>$id))){
            $result = true;
        }

        return $result;
    }

    public function find($id){

    }

    public function listAllImagem($idImovel){
        //cria um objeto do tipo conexao
        $conexao = new Conexao();
        
        //cria a conexao com o banco de dados
        $conn = $conexao->getConection();

        //cria query da seleção
        $query = "SELECT * FROM GALERIA WHERE idImovel = :idImovel";
        
        //prepara a query para execução
        $stmt = $conn->prepare($query);

        //Cria um array para receber o resultado da seleção
        $result = array();

        //executa a query
        if($stmt->execute(array(':id_imovel' => $idImovel)))
        {
            //o resultado da busca será retornado como um objeto da classe 
           while ($rs = $stmt->fetchObject(Galeria::class))
            {
                //print_r($rs);
                //armazena esse objeto em uma posição do vetor
                $result[] = $rs;
            }
        }
        else
        {
            $result = false;
        }

        return $result;
    }
    
    public function listAll(){

    }


    public function listLastImoveis(){

    }

    public function count(){

    }    
}    
    
    