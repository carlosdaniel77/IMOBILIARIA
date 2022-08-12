<?php

require_once 'Banco.php';
require_once 'Conexao.php';

    

class Imovel extends Banco{

    private $id;
    private $descricao;
    private $foto;
    private $valor;
    private $tipo;

    public function remove($id){
        $result = false;
        $conexao = new Conexao();
        $conn = $conexao->getConection();
        $query = "delete from imovel where id = :id";
        $stmt = $conn->prepare($query);
        if($stmt->execute(array(':id' => $id))){
            $result = true;
        }

        return $result;
    }

    public function find($id){
        $result = false;
        $conexao = new Conexao();
        $conn = $conexao->getConection();

        $query = "select * from imovel where id = :id";
        $stmt = $conn->prepare($query);
        if($stmt->execute(array(':id' => $id))){
            if($stmt->rowCount() > 0){
                $result = $stmt->fetchObject(Imovel::class);
            }
        }
        return $result;
    }

    public function count(){

    }
    
    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function getFoto(){
        return $this->foto;
    }

    public function setFoto($foto){
        $this->foto = $foto;
    }

    public function getValor(){
        return $this->valor;
    }

    public function setValor($valor){
        $this->valor = $valor;
    }

    public function getTipo(){
        if($this->tipo == '1'){
            $res = "Apartamento";
        }else{
            $res = "Casa";
        }
        return $res;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
    }

    public function save(){

        $result = false;

        //cria um objeto do tipo conexao
        $conexao = new Conexao();
        //cria a conexao com o banco de dados
        if($conn = $conexao->getConection()){
            if($this->id > 0){
                //alteração
                $query = "update usuario set descricao = :descricao, tipo = :tipo, valor = :valor, foto = :foto, fotoTipo = :fotoTipo where id = :id";
                $stmt = $conn->prepare($query);
                if($stmt->execute(array(':descricao'=>$this->descricao, ':tipo' => $this->tipo, ':valor' => $this->valor, ':foto' => $this->foto, ':id' => $this->id))){
                    $result = $stmt->rowCount();
                }

            }else{
                //cadastro
                $query = "insert into imovel (descricao, tipo, valor, foto) values (:descricao, :tipo, :valor, :foto)";
                $stmt = $conn->prepare($query);
                if($stmt->execute(
                    array(':descricao'=>$this->descricao, ':tipo' => $this->tipo, ':valor' => $this->valor, ':foto' => $this->foto))){
                    ':fotoTipo' => $this->fotoTipo, ':id'=> $this->id))){
                    $result = $stmt->rowCount();
                }
            }
        }
        return $result;
    }

    public function listAll(){
        $result = false;
        //cria um objeto do tipo conexao
        $conexao = new Conexao();
        //cria a conexao com o banco de dados
        $conn = $conexao->getConection();
        //cria query de seleção
        $query = "SELECT * FROM imovel";
        //Prepara a query para execução
        $stmt = $conn->prepare($query);
        //Cria um array para receber o resultado da seleção
        $result = array();
        //executa a query
        if($stmt->execute()){
            //o resultado da busca será retornado como um objeto da classe 
            while ($rs = $stmt->fetchObject(Imovel::class)) {
                //armazena esse objeto em uma posição do vetor
                $result[] = $rs;
            }
        } 

        return $result;
    }
}
?>