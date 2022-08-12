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

    public function save() {
        $result = false;
        //cria um objeto do tipo conexao
        $conexao = new Conexao();
        //cria a conexao com o banco de dados
        if($conn = $conexao->getConection()){
            if($this->id > 0){
                //cria query de update passando os atributos que serão atualizados
                $query = "UPDATE imovel SET descricao = :descricao, foto = :foto, valor = :valor, tipo = :tipo, fotoTipo = :fotoTipo
                WHERE id = :id";
                //Prepara a query para execução
                $stmt = $conn->prepare($query);
                //executa a query
                if ($stmt->execute(
                    array(':descricao' => $this->descricao, ':foto' => $this->foto, ':valor' => $this->valor,':tipo' => $this->tipo, 
                    ':fotoTipo'=> $this->fotoTipo,':id'=> $this->id))){                    
                    $result = $stmt->rowCount();
                }
            }else{
                //cria query de inserção passando os atributos que serão armazenados
                $query = "insert into imovel (id, descricao, foto, valor, tipo, fotoTipo) 
                values (null,:descricao,:foto,:valor,:tipo,:fotoTipo)";
                //Prepara a query para execução
                $stmt = $conn->prepare($query);
                //executa a query
                if ($stmt->execute(array(':descricao' => $this->descricao, ':foto' => $this->foto, ':valor' => $this->valor,
                ':tipo' => $this->tipo, ':fotoTipo'=> $this->fotoTipo))) {
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