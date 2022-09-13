<?php

require_once 'Banco.php';
require_once 'Conexao.php';

class Galeria extends Banco{
    private $id;
    private $foto;

    //métods de acesso

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getFoto(){
        return $this->foto;
    }

    public function setFoto($foto){
        $this->foto = $foto;
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
                            path = :path WHERE id = :id";
                //Prepara a query para execução
                $stmt = $conn->prepare($query);
                //executa a query
                if ($stmt->execute(
                    array(':descricao' => $this->descricao, ':foto' => $this->foto, ':valor' => $this->valor,':tipo' => $this->tipo, ':id'=> $this->id, 
                    ':fotoTipo' => $this->fotoTipo, ':path' => $this ->path))){
                    $result = $stmt->rowCount();
                }
            }else{
                //cria query de inserção passando os atributos que serão armazenados
                $query = "insert into imovel (id, descricao, foto, valor, tipo, fotoTipo, path) 
                values (null,:descricao,:foto,:valor,:tipo,:fotoTipo,:path)";
                //Prepara a query para execução
                $stmt = $conn->prepare($query);
                //executa a query
                if ($stmt->execute(array(':descricao' => $this->descricao, ':foto' => $this->foto, ':valor' => $this->valor,
                ':tipo' => $this->tipo, ':fotoTipo'=>$this->fotoTipo, ':path' => $this->path))) {
                    $result = $stmt->rowCount();
                }
            }
        }
        return $result;
    }
    
    