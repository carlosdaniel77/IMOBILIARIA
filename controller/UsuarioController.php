<?php
require_once 'model/Usuario.php';

class UsuarioController{
    /**
     * Salvar o usuario submetido pelo formulário
     */
    public static function salvar(){
        //cria um objeto do tipo Usuario
        $usuario = new Usuario;

        //armazena as informações do $_POST via set
        $usuario->setId($_POST['id']);
        $usuario->setLogin($_POST['login']);
        $usuario->setSenha($_POST['senha1']);
        $usuario->setPermissao($_POST['permissao']);

        //chama o método save para gravar as informações no banco de dados
        $usuario->save();
    }
    /** 
     * Lista os usuários
    */
    public static function listar(){
        //cria um objeto do tipo Usuário
        $usuarios = new Usuario;
        //chama o método listAll()
        return $usuarios->listAll();
    }

    public static function editar($id){
        $usuario = new Usuario();
        $usuario = $usuario->find($id);
        return $usuario;
    }

    public static function excluir($id){
        $usuario = new Usuario();
        $usuario = $usuario->remove($id);
    }

    /**
     * Logar com um usuário no sistema
     */
    public static function logar(){
        $usuario = new Usuario();
        $usuario->setLogin($_POST['login']);
        $usuario->setSenha($_POST['senha']);
    
        return $usuario->logar();
    }
}

?>