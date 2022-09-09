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
